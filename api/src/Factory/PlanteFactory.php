<?php

namespace App\Factory;

use App\Entity\Plante;
use App\Repository\PlanteRepository;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;
use Zenstruck\Foundry\RepositoryProxy;

/**
 * @extends ModelFactory<Plante>
 *
 * @method        Plante|Proxy create(array|callable $attributes = [])
 * @method static Plante|Proxy createOne(array $attributes = [])
 * @method static Plante|Proxy find(object|array|mixed $criteria)
 * @method static Plante|Proxy findOrCreate(array $attributes)
 * @method static Plante|Proxy first(string $sortedField = 'id')
 * @method static Plante|Proxy last(string $sortedField = 'id')
 * @method static Plante|Proxy random(array $attributes = [])
 * @method static Plante|Proxy randomOrCreate(array $attributes = [])
 * @method static PlanteRepository|RepositoryProxy repository()
 * @method static Plante[]|Proxy[] all()
 * @method static Plante[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Plante[]|Proxy[] createSequence(iterable|callable $sequence)
 * @method static Plante[]|Proxy[] findBy(array $attributes)
 * @method static Plante[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Plante[]|Proxy[] randomSet(int $number, array $attributes = [])
 */
final class PlanteFactory extends ModelFactory
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
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): self
    {
        return $this
            // ->afterInstantiate(function(Plante $plante): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Plante::class;
    }
}
