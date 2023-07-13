<?php
// api/tests/BooksTest.php
namespace App\Tests;
use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Plante;
use App\Factory\AnnonceFactory;
use App\Factory\PlanteFactory;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;
class PlanteTest extends ApiTestCase
{
    // This trait provided by Foundry will take care of refreshing the database content to a known state before each test
    use ResetDatabase, Factories;
    public function testGetCollection(): void
    {
        # Rewrite the test but for the entity Plante

        // Create 100 books using our factory
        PlanteFactory::createMany(100);
    
        // The client implements Symfony HttpClient's `HttpClientInterface`, and the response `ResponseInterface`
        $response = static::createClient()->request('GET', '/plantes');
        $this->assertResponseIsSuccessful();
        // Asserts that the returned content type is JSON-LD (the default)
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
        // Asserts that the returned JSON is a superset of this one
        $this->assertJsonContains([
            '@context' => '/contexts/Plante',
            '@id' => '/plantes',
            '@type' => 'hydra:Collection',
            'hydra:totalItems' => 100,
            'hydra:view' => [
                '@id' => '/plantes?page=1',
                '@type' => 'hydra:PartialCollectionView',
                'hydra:first' => '/plantes?page=1',
                'hydra:last' => '/plantes?page=4',
                'hydra:next' => '/plantes?page=2',
            ],
        ]);
        // Because test fixtures are automatically loaded between each test, you can assert on them
        $this->assertCount(30, $response->toArray()['hydra:member']);
        // Asserts that the returned JSON is validated by the JSON Schema generated for this resource by API Platform
        // This generated JSON Schema is also used in the OpenAPI spec!
        $this->assertMatchesResourceCollectionJsonSchema(Plante::class);
    }

    #Create a test testCreateAnnonce of the creation of an annonce


    public function testCreateAnnonce():void
    {
        #use the schema of an annonce 
        $response = static::createClient()->request('POST', '/plantes', ['json' => [
                        'nom' => 'test',
                        'type' => 'test',
                        'dimension' => 'test',
                        'exposition' => 'test',
                        'arrosage' => 'test',
                        'famille' => 'test',
                        'description' => 'test'
                    ]]);
        $this->assertResponseStatusCodeSame(201);
        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');
        #use the schema of an annonce
        $this->assertJsonContains([
            '@context' => '/contexts/Plante',
            '@type' => 'Plante',
            'nom' => 'test',
            'type' => 'test',
            'dimension' => 'test',
            'exposition' => 'test',
            'arrosage' => 'test',
            'famille' => 'test',
            'description' => 'test'
        ]);
        $this->assertMatchesRegularExpression('~^/plantes/\d+$~', $response->toArray()['@id']);
        $this->assertMatchesResourceItemJsonSchema(Plante::class);

    }
}