<?php

return [
    'post' => [
        'team-member' => [
            'enter_title_here' => 'Enter team member name',
            'menu_icon' => 'dashicons-groups',
            'supports' => ['title', 'editor', 'thumbnail', 'revisions'],
            'show_in_rest' => true,
            'labels' => [
                'name' => 'Team Members',
                'singular_name' => 'Team Member',
                'add_new' => 'Add New Member',
                'add_new_item' => 'Add New Team Member',
                'edit_item' => 'Edit Team Member',
                'new_item' => 'New Team Member',
                'view_item' => 'View Team Member',
                'view_items' => 'View Team Members',
                'search_items' => 'Search Team Members',
                'not_found' => 'No team members found',
                'not_found_in_trash' => 'No team members found in Trash',
                'all_items' => 'All Team Members',
                'archives' => 'Team Member Archives',
                'attributes' => 'Team Member Attributes',
                'insert_into_item' => 'Insert into team member',
                'uploaded_to_this_item' => 'Uploaded to this team member',
                'filter_items_list' => 'Filter team members list',
                'items_list_navigation' => 'Team Members list navigation',
                'items_list' => 'Team Members list',
                'item_published' => 'Team Member published',
                'item_published_privately' => 'Team Member published privately',
                'item_reverted_to_draft' => 'Team Member reverted to draft',
                'item_scheduled' => 'Team Member scheduled',
                'item_updated' => 'Team Member updated',
            ],
        ],
        'etf' => [ // Custom post type 'ETF'
            'enter_title_here' => 'Enter ETF name',
            'menu_icon' => 'dashicons-chart-line',
            'supports' => ['title', 'editor', 'thumbnail', 'revisions'],
            'show_in_rest' => true,
            'rewrite' => ['slug' => 'etf', 'with_front' => false],
            'labels' => [
                'name' => 'ETFs',
                'singular_name' => 'ETF',
                'add_new' => 'Add New ETF',
                'add_new_item' => 'Add New ETF',
                'edit_item' => 'Edit ETF',
                'new_item' => 'New ETF',
                'view_item' => 'View ETF',
                'view_items' => 'View ETFs',
                'search_items' => 'Search ETFs',
                'not_found' => 'No ETFs found',
                'not_found_in_trash' => 'No ETFs found in Trash',
                'all_items' => 'All ETFs',
                'archives' => 'ETF Archives',
                'attributes' => 'ETF Attributes',
                'insert_into_item' => 'Insert into ETF',
                'uploaded_to_this_item' => 'Uploaded to this ETF',
                'filter_items_list' => 'Filter ETFs list',
                'items_list_navigation' => 'ETFs list navigation',
                'items_list' => 'ETFs list',
                'item_published' => 'ETF published',
                'item_published_privately' => 'ETF published privately',
                'item_reverted_to_draft' => 'ETF reverted to draft',
                'item_scheduled' => 'ETF scheduled',
                'item_updated' => 'ETF updated',
            ],
        ],
    ],
];