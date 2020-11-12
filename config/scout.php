<?php

return [
  "sync" => true,
  "connect_timeout" => 1,
  "application_id" => "BPZJ8L19LC",
  "admin_api_key" => "d4064351a56b61e453c5db43ff9d51b1",
  "mappings" => [
    [
      'indexName' => 'newsEvents',
      'indexSettings' => [
        'settings' => [
          'attributesForFaceting' => ['blogCategory'],
        ],
        'forwardToReplicas' => 'true',
      ],
      'elementType' => \craft\elements\Entry::class,
      'criteria' => [
        'section' => 'newsEvents'
      ],
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
    ],
  ],
];
