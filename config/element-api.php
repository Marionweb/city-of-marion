<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

return [
	'endpoints' => [

		// SAMPLE ENDPOINTS TAKEN FROM https://github.com/craftcms/element-api/blob/v2/README.md
		'news.json' => [
			'elementType' => Entry::class,
			'criteria' => ['section' => 'news'],
			'transformer' => function(Entry $entry) {
				return [
					'title' => $entry->title,
					'url' => $entry->url,
					'jsonUrl' => UrlHelper::url("news/{$entry->id}.json"),
					'summary' => $entry->summary,
				];
			},
		],
		'news/<entryId:\d+>.json' => function($entryId) {
			return [
				'elementType' => Entry::class,
				'criteria' => ['id' => $entryId],
				'one' => true,
				'transformer' => function(Entry $entry) {
					return [
						'title' => $entry->title,
						'url' => $entry->url,
						'summary' => $entry->summary,
						'body' => $entry->body,
					];
				},
			];
		},
	]
];
