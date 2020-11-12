<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

return [
  'endpoints' => [

    // set up in preparation for autocomplete search: http://www.hashtagerrors.com/blog/lightning-fast-autocomplete-search
    'feeds/news-events.json' => function() {
      return [
        'elementType' => Entry::class,
        'criteria' => ['section' => 'newsEvents'],
        'transformer' => function(Entry $entry) {
          $pageContentBlocks =[];
          foreach($entry->getFieldValue('pageContent')->all() as $block){
            switch ($block->type->handle) {
              case 'richText':
                $pageContentBlocks[] = [
                  'content' => $block->text
                ];
                break;
              case 'quote':
                $pageContentBlocks[] = [
                  'quote' => $block->quote
                ];
                break;
            }
          }

          return [
            'title' => $entry->title,
            'url' => $entry->url,
            'jsonUrl' => UrlHelper::url("news-events/{$entry->id}.json"),
            'body' => $pageContentBlocks
          ];
        },
      ];
    },
      'news-events/<entryId:\d+>.json' => function($entryId) {
          return [
              'elementType' => Entry::class,
              'criteria' => ['id' => $entryId],
              'one' => true,
              'transformer' => function(Entry $entry) {
                $pageContentBlocks =[];
                foreach($entry->getFieldValue('pageContent')->all() as $block){
                  switch ($block->type->handle) {
                    case 'richText':
                      $pageContentBlocks[] = [
                        'content' => $block->text
                      ];
                      break;
                    case 'quote':
                      $pageContentBlocks[] = [
                        'quote' => $block->quote
                      ];
                      break;
                  }
                }

                return [
                    'title' => $entry->title,
                    'url' => $entry->url,
                    'body' => $pageContentBlocks
                ];
              },
          ];
      },
  ]
];
