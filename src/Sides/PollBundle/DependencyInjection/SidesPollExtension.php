<?php

namespace Sides\PollBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class SidesPollExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        
        $container->setParameter('sides_poll.poll_entity', $config['entity']['poll']);
        $container->setParameter('sides_poll.opinion_entity', $config['entity']['opinion']);

        $container->setParameter('sides_poll.poll_form', $config['form']['poll']);
        $container->setParameter('sides_poll.opinion_form', $config['form']['opinion']);
        $container->setParameter('sides_poll.vote_form', $config['form']['vote']);

        $associations = array(
            'Sides\PollBundle\Entity\BaseOpinion' => array(
                'manyToOne' => array(
                    'fieldName' => 'poll',
                    'targetEntity' => $config['entity']['poll'],
                    "inversedBy" => "opinions",
                    'joinColumns' => array(
                        array(
                            'name' => 'pollId',
                            'referencedColumnName' => 'id',
                            'onDelete' => 'cascade'
                        )
                    )
                )
            ),

            $config['entity']['poll'] => array( // OneToMany association cannot be set on a mapped superclass
                'oneToMany' => array(
                    'fieldName' => 'opinions',
                    'targetEntity' => $config['entity']['opinion'],
                    'mappedBy' => 'poll',
                    'cascade' => array(
                        1 => 'persist'
                    ),
                    'orphanRemoval' => true,
                    'orderBy' => array(
                        'ordering' => 'ASC'
                    )
                )
            )
        );

        $container->setParameter('sides_poll.association_mapping', $associations);
    }
}
