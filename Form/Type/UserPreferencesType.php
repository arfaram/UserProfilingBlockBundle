<?php
/**
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */
namespace Ez\UserProfilingBlockBundle\Form\Type;

use Ez\UserProfilingBlockBundle\User\UserInterests;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserPreferencesType extends AbstractType
{
    /** @var \Ez\UserProfilingBlockBundle\User\UserInterests */
    private $userInterests;

    /**
     * @param \Ez\UserProfilingBlockBundle\User\UserInterests $userInterests
     */
    public function __construct(UserInterests $userInterests)
    {
        $this->userInterests = $userInterests;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices = $this->userInterests->getAvailableChoices();

        $builder
            ->setMethod('post')
            ->add('interests', ChoiceType::class, [
                'choices' => $choices,
                'multiple' => true,
                'expanded' => true,
                'constraints' => [
                    new Choice([
                        'min' => 1,
                        'choices' => array_keys($choices),
                        'multiple' => true,
                    ]),
                ],
            ])
            ->add('save', SubmitType::class);
    }

    public function getName()
    {
        return 'ezuserprofilingblock_user_preferences';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'Ez\UserProfilingBlockBundle\Entity\UserPreferences']);
    }
}
