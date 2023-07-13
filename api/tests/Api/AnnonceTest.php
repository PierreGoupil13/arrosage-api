<?php
// api/tests/BooksTest.php
namespace App\Tests;
use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Annonce;
use App\Entity\Book;
use App\Entity\Commentaire;
use App\Factory\AnnonceFactory;
use App\Factory\BookFactory;
use App\Factory\CommentaireFactory;
use App\Factory\PlanteFactory;
use App\Factory\UtilisateurFactory;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;
class AnnonceTest extends ApiTestCase
{
    // This trait provided by Foundry will take care of refreshing the database content to a known state before each test
    use ResetDatabase, Factories;
    public function testGetCollection(): void
    {
        // Create 100 books using our factory
        AnnonceFactory::createMany(100);
    
        // The client implements Symfony HttpClient's `HttpClientInterface`, and the response `ResponseInterface`
        $response = static::createClient()->request('GET', '/annonces');
        $this->assertResponseIsSuccessful();
        // Asserts that the returned content type is JSON-LD (the default)
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
        // Asserts that the returned JSON is a superset of this one
        $this->assertJsonContains([
            '@context' => '/contexts/Annonce',
            '@id' => '/annonces',
            '@type' => 'hydra:Collection',
            'hydra:totalItems' => 100,
            'hydra:view' => [
                '@id' => '/annonces?page=1',
                '@type' => 'hydra:PartialCollectionView',
                'hydra:first' => '/annonces?page=1',
                'hydra:last' => '/annonces?page=4',
                'hydra:next' => '/annonces?page=2',
            ],
        ]);
        // Because test fixtures are automatically loaded between each test, you can assert on them
        $this->assertCount(30, $response->toArray()['hydra:member']);
        // Asserts that the returned JSON is validated by the JSON Schema generated for this resource by API Platform
        // This generated JSON Schema is also used in the OpenAPI spec!
        $this->assertMatchesResourceCollectionJsonSchema(Annonce::class);
    }

    #Create a test testCreateAnnonce of the creation of an annonce


    public function testCreateAnnonce():void
    {
        PlanteFactory::createMany(2);
        UtilisateurFactory::createMany(3);
        CommentaireFactory::createMany(2);
        #use the schema of an annonce 
        $response = static::createClient()->request('POST', '/annonces', ['json' => [
                        'etat' => 'active',
                        'titre' => 'test',
                        'description' => 'test',
                        'numero' => 1,
                        'ville' => 'Nantes',
                        'rue' => 'rue de la paix',
                        'codePostal' => '44000',
                        'plantes' => [
                            '/plantes/1',
                            '/plantes/2',
                        ],
                        'utilisateurProp' => '/utilisateurs/1',
                        'utilisateursPart' => [
                            '/utilisateurs/1',
                            '/utilisateurs/2',
                        ],
                        'commentaires' => [
                            '/commentaires/1',
                            '/commentaires/2',
                        ],
                    ]]);
        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
        #use the schema of an annonce
        $this->assertJsonContains([
            '@context' => '/contexts/Annonce',
            '@type' => 'Annonce',
            'etat' => 'active',
            'titre' => 'test',
            'description' => 'test',
            'numero' => 1,
            'ville' => 'Nantes',
            'rue' => 'rue de la paix',
            'codePostal' => '44000',
            'plantes' => [
                '/plantes/1',
                '/plantes/2',
            ],
            'utilisateurProp' => '/utilisateurs/1',
            'utilisateursPart' => [
                '/utilisateurs/1',
                '/utilisateurs/2',
            ],
            'commentaires' => [
                '/commentaires/1',
                '/commentaires/2',
            ],
        ]);
        $this->assertMatchesRegularExpression('~^/annonces/\d+$~', $response->toArray()['@id']);
        $this->assertMatchesResourceItemJsonSchema(Annonce::class);

    }
}