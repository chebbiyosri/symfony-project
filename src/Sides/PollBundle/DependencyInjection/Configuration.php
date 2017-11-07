<?php

namespace Sides\PollBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('sides_poll');

$rootNode
            ->children()
                ->arrayNode('entity')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('poll')->defaultValue('Sides\PollBundle\Entity\Poll')->end()
                        ->scalarNode('opinion')->defaultValue('Sides\PollBundle\Entity\Opinion')->end()
                    ->end()
                ->end()

                ->arrayNode('form')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('poll')->defaultValue('Sides\PollBundle\Form\PollType')->end()
                        ->scalarNode('opinion')->defaultValue('Sides\PollBundle\Form\OpinionType')->end()
                        ->scalarNode('vote')->defaultValue('Sides\PollBundle\Form\VoteType')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
