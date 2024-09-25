<?php

namespace App\Blocks;

use Log1x\AcfComposer\Block;
use Log1x\AcfComposer\Builder;

class HomeProcess extends Block
{
    /**
     * The block name.
     *
     * @var string
     */
    public $name = 'Home Process';

    /**
     * The block description.
     *
     * @var string
     */
    public $description = 'A simple Home Process block.';

    /**
     * The block category.
     *
     * @var string
     */
    public $category = 'formatting';

    /**
     * The block icon.
     *
     * @var string|array
     */
    public $icon = 'editor-ul';

    /**
     * The block keywords.
     *
     * @var array
     */
    public $keywords = [];

    /**
     * The block post type allow list.
     *
     * @var array
     */
    public $post_types = [];

    /**
     * The parent block type allow list.
     *
     * @var array
     */
    public $parent = [];

    /**
     * The ancestor block type allow list.
     *
     * @var array
     */
    public $ancestor = [];

    /**
     * The default block mode.
     *
     * @var string
     */
    public $mode = 'preview';

    /**
     * The default block alignment.
     *
     * @var string
     */
    public $align = '';

    /**
     * The default block text alignment.
     *
     * @var string
     */
    public $align_text = '';

    /**
     * The default block content alignment.
     *
     * @var string
     */
    public $align_content = '';

    /**
     * The supported block features.
     *
     * @var array
     */
    public $supports = [
        'align' => true,
        'align_text' => false,
        'align_content' => false,
        'full_height' => false,
        'anchor' => false,
        'mode' => true,
        'multiple' => true,
        'jsx' => true,
        'color' => [
            'background' => true,
            'text' => true,
            'gradient' => true,
        ],
    ];

    /**
     * The block styles.
     *
     * @var array
     */
    public $styles = ['light', 'dark'];

    /**
     * The block preview example data.
     *
     * @var array
     */
    public $example = [
        'items' => [
            ['item' => 'Item one'],
            ['item' => 'Item two'],
            ['item' => 'Item three'],
        ],
    ];

    /**
     * The block template.
     *
     * @var array
     */
    public $template = [
        'core/heading' => ['placeholder' => 'Hello World'],
        'core/paragraph' => ['placeholder' => 'Welcome to the Home Process block.'],
    ];

    /**
     * Data to be passed to the block before rendering.
     */
    public function with(): array
    {
        return [
            'items' => $this->items(),
            'process_description' => get_field('process_description'),
        ];
    }

    /**
     * The block field group.
     */
    public function fields(): array
    {
        $homeProcess = Builder::make('home_process');

        $homeProcess
            ->addWysiwyg('process_description')
            ->addRepeater('categories', [
                'label' => 'Categories',
                'instructions' => 'Add your category information here.',
                'layout' => 'block',
                'button_label' => 'Add Category',
            ])
            ->addText('category-name')
            ->addRepeater('items', [
                'label' => 'Items',
                'instructions' => 'Add category items here.',
                'layout' => 'block',
                'button_label' => 'Add Item',
            ])
            ->addImage('icon')
            ->addText('heading')
            ->addWysiwyg('description')
            ->endRepeater()
            ->endRepeater();

        return $homeProcess->build();
    }

    /**
     * Retrieve the items.
     *
     * @return array
     */
    public function items()
    {
        return get_field('categories') ?: $this->example['items'];
    }

    /**
     * Assets enqueued when rendering the block.
     */
    public function assets(array $block): void
    {
        //
    }
}
