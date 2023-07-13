<?php

namespace App\Factory;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Annonce>
 *
 * @method        Annonce|Proxy create(array|callable $attributes = [])
 * @method static Annonce|Proxy createOne(array $attributes = [])
 * @method static Annonce|Proxy find(object|array|mixed $criteria)
 * @method static Annonce|Proxy findOrCreate(array $attributes)
 * @method static Annonce|Proxy first(string $sortedField = 'id')
 * @method static Annonce|Proxy last(string $sortedField = 'id')
 * @method static Annonce|Proxy random(array $attributes = [])
 * @method static Annonce|Proxy randomOrCreate(array $attributes = [])
 * @method static AnnonceRepository|RepositoryProxy repository()
 * @method static Annonce[]|Proxy[] all()
 * @method static Annonce[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Annonce[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Annonce[]|Proxy[] findBy(array $attributes)
 * @method static Annonce[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Annonce[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class AnnonceFactory extends ModelFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function getDefaults(): array
    {
        return [
            'description' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Annonce $annonce): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Annonce::class;
    }
}
