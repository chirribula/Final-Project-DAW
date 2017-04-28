<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Lote;
use AppBundle\Entity\Producto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Repository\LoteRepository;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder
                ->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) use ($options) {
                $form = $event->getForm();
                $data = $event->getData();
                $form
                    ->add('lotes', EntityType::class, [
                        'class' => Lote::class,
                        'query_builder' => function(LoteRepository $loteRepository) use ($options) {
                            return $loteRepository->getLotesTemporadaNoNulosQuery($options['temporada']);
                        },
                        'label' => $data,
                        'translation_domain' => false,
                        'placeholder' => '[Ninguno]'
                    ])
                    ->add('stock');
                });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Producto::class,
            'temporada' => null
        ])
        ->setRequired('temporada');

    }
}
