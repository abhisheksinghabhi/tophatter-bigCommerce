<?php return $arr = array (
  'Movies' => 
  array (
    'shortDescription' => 
    array (
      'name' => 'shortDescription',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Overview of the key selling points of the item, marketing content, and highlights in paragraph form. For SEO purposes, repeat the product name and relevant keywords here.',
      'requiredLevel' => 'Required',
      'displayName' => 'Description',
      'group' => 'Basic',
      'rank' => '8000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'keyFeatures' => 
    array (
      'name' => 'keyFeatures',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Key features will appear as bulleted text on the item page and in search results. Key features help the user understand the benefits of the product with a simple and clean format. We highly recommended using three or more key features.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Key Features',
      'group' => 'Basic',
      'rank' => '9000',
    ),
    'synopsis' => 
    array (
      'name' => 'synopsis',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A summary of narrative content. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Synopsis',
      'group' => 'Basic',
      'rank' => '12000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'multipackQuantity' => 
    array (
      'name' => 'multipackQuantity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of identical, individually packaged-for-sale items. If an item does not contain other items, does not contain identical items, or if the items contained within cannot be sold individually, the value for this attribute should be "1." Examples: (1) A single bottle of 50 pills has a "Multipack Quantity" of "1." (2) A package containing two identical bottles of 50 pills has a "Multipack Quantity" of 2. (3) A 6-pack of soda labelled for individual sale connected by plastic rings has a "Multipack Quantity" of "6." (4) A 6-pack of soda in a box whose cans are not marked for individual sale has a "Multipack Quantity" of "1." (5) A gift basket of 5 different items has a "Multipack Quantity" of "1."',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Multipack Quantity',
      'group' => 'Basic',
      'rank' => '13000',
      'dataType' => 'integer',
      'totalDigits' => '4',
    ),
    'countPerPack' => 
    array (
      'name' => 'countPerPack',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of identical items inside each individual pack given by the "Multipack Quantity" attribute. Examples: (1) A single bottle of 50 pills has a "Count Per Pack" of "50." (2) A package containing two identical bottles of 50 pills has a "Count Per Pack" of 50. (3) A 6-pack of soda labelled for individual sale connected by plastic rings has a "Count Per Pack" of "1." (4) A 6-pack of soda in a box whose cans are not marked for individual sale has a "Count Per Pack" of "6." (5) A gift basket of 5 different items has a "Count Per Pack" of "1."',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Count Per Pack',
      'group' => 'Basic',
      'rank' => '13500',
      'dataType' => 'integer',
      'totalDigits' => '4',
    ),
    'count' => 
    array (
      'name' => 'count',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The total number of identical items in the package or box; a result of the multiplication of Multipack Quantity by Count Per Pack. Examples: (1) A single bottle of 50 pills has a "Total Count" of 50. (2) A package containing two identical bottles of 50 pills has a "Total Count" of 100. (3) A gift basket of 5 different items has a "Total Count" of 1.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Total Count',
      'group' => 'Basic',
      'rank' => '13550',
      'dataType' => 'string',
      'maxLength' => '7',
      'minLength' => '1',
    ),
    'mainImageUrl' => 
    array (
      'name' => 'mainImageUrl',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Main image of the item. Image URL must end in the file name. Image URL must be static and have no redirections. Preferred file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Recommended image resolution: 3000 x 3000 pixels at 300 ppi. Minimum image size requirements: Zoom capability: 2000 x 2000 pixels at 300 ppi. Non-zoom minimum: 500 x 500 pixels at 72 ppi. Maximum file size: 2 MB.',
      'requiredLevel' => 'Required',
      'displayName' => 'Main Image URL',
      'group' => 'Images',
      'rank' => '14000',
      'dataType' => 'anyURI',
    ),
    'productSecondaryImageURL' => 
    array (
      'name' => 'productSecondaryImageURL',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Secondary images of the item. Image URL must end in the file name. Image URL must be static and have no redirections. Preferred file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Recommended image resolution: 3000 x 3000 pixels at 300 ppi. Minimum image size requirements: Zoom capability: 2000 x 2000 pixels at 300 ppi. Non-zoom minimum: 500 x 500 pixels at 72 ppi. Maximum file size: 2 MB.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Additional Image URL',
      'group' => 'Images',
      'rank' => '15000',
    ),
    'title' => 
    array (
      'name' => 'title',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The name given to the work. Does not include any marketing adjectives outside of the given name.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Title',
      'group' => 'Discoverability',
      'rank' => '16000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'physicalMediaFormat' => 
    array (
      'name' => 'physicalMediaFormat',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The physical form in which the customer receives the product. For digital file formats use "Digital Audio File Format" (for mp3, aiff, etc), "Digital Video File Format" (for mp4, mov, etc), or "Digital File Format" (for exe, pdf, zip, etc).',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Physical Media Format',
      'group' => 'Discoverability',
      'rank' => '17000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'printed media',
        1 => 'USB stick',
        2 => 'DVD',
        3 => 'Blu-Ray',
        4 => 'CD',
        5 => 'LP',
        6 => 'VHS Tape',
        7 => 'miniDV Tape',
        8 => '8-Track Tape',
        9 => 'Cassette Tape',
      ),
    ),
    'mpaaRating' => 
    array (
      'name' => 'mpaaRating',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'The rating provided by the Motion Picture Association of America as a guide to the appropriate age group for a piece of media.',
      'requiredLevel' => 'Required',
      'displayName' => 'MPAA Rating',
      'group' => 'Discoverability',
      'rank' => '18000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'G',
        1 => 'PG',
        2 => 'PG-13',
        3 => 'R',
        4 => 'NC-17',
        5 => 'Not Rated',
      ),
    ),
    'ratingReason' => 
    array (
      'name' => 'ratingReason',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The reason for the rating of an entertainment product, such as a TV show, Movie, or Musical Album. Reasons for suggesting that content is not appropriate for a general audience include Profanity, Drug Use, Violence, Nudity, and Sexual Content. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Rating Reason',
      'group' => 'Discoverability',
      'rank' => '18937',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'movieGenre' => 
    array (
      'name' => 'movieGenre',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'General film category.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Movie Genre',
      'group' => 'Discoverability',
      'rank' => '19000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'movieSubgenre' => 
    array (
      'name' => 'movieSubgenre',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'More specific film subcategory.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Movie Subgenre',
      'group' => 'Discoverability',
      'rank' => '20000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'seriesTitle' => 
    array (
      'name' => 'seriesTitle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If the work is one of multiple works in a series, the title of the series or collection.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Series Title',
      'group' => 'Discoverability',
      'rank' => '21000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'numberInSeries' => 
    array (
      'name' => 'numberInSeries',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number in the series, if the work is one of multiple works in a series.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number in Series',
      'group' => 'Discoverability',
      'rank' => '22000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'director' => 
    array (
      'name' => 'director',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Person who receives "Directed by" billing on a film or television show.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Director',
      'group' => 'Discoverability',
      'rank' => '23000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'actors' => 
    array (
      'name' => 'actors',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Actors who receive top billing in a movie or television show.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Actors',
      'group' => 'Discoverability',
      'rank' => '24000',
    ),
    'screenwriter' => 
    array (
      'name' => 'screenwriter',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Person who is credited or billed as the primary writer on a film or television project.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Screenwriter',
      'group' => 'Discoverability',
      'rank' => '25000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'studioProductionCompany' => 
    array (
      'name' => 'studioProductionCompany',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Company that is credited with creation of a film or television show.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Studio & Production Company',
      'group' => 'Discoverability',
      'rank' => '26000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'targetAudience' => 
    array (
      'name' => 'targetAudience',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The demographic for which the item is targeted.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Target Audience',
      'group' => 'Discoverability',
      'rank' => '27000',
    ),
    'awardsWon' => 
    array (
      'name' => 'awardsWon',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Use this attribute if the item has won any awards in its particular product category. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Awards Won',
      'group' => 'Discoverability',
      'rank' => '28000',
    ),
    'character' => 
    array (
      'name' => 'character',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A person or entity portrayed in print or visual media. A character might be a fictional personality or an actual living person.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Character',
      'group' => 'Discoverability',
      'rank' => '29000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'variantGroupId' => 
    array (
      'name' => 'variantGroupId',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Required if item is a variant. Make up a number and/or letter code for “Variant Group ID” and add this to all variations of the same product. Partners must ensure uniqueness of their Variant Group IDs.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'variantAttributeNames',
          'value' => 'ANY',
        ),
      ),
      'displayName' => 'Variant Group ID',
      'group' => 'Item Variants',
      'rank' => '31000',
      'dataType' => 'string',
      'maxLength' => '300',
      'minLength' => '1',
    ),
    'variantAttributeNames' => 
    array (
      'name' => 'variantAttributeNames',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Designate all attributes by which the item is varying. Variant attributes are limited to those designated for each category. ',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'variantGroupId',
          'value' => 'ANY',
        ),
      ),
      'displayName' => 'Variant Attribute Names',
      'group' => 'Item Variants',
      'rank' => '32000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'variantAttributeName',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'bookFormat',
            1 => 'physicalMediaFormat',
            2 => 'edition',
            3 => 'sportsTeam',
            4 => 'countPerPack',
            5 => 'count',
          ),
        ),
      ),
    ),
    'isPrimaryVariant' => 
    array (
      'name' => 'isPrimaryVariant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Note whether item is intended as the main variant in a variant grouping. The primary variant will appear as the image when customers search and the first image displayed on the item page. This should be set as "Yes" for only one item in a group of variants.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Primary Variant',
      'group' => 'Item Variants',
      'rank' => '33000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'duration' => 
    array (
      'name' => 'duration',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Viewing or listening time.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Duration',
      'group' => 'Additional Category Attributes',
      'rank' => '44000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'decimal',
          'totalDigits' => '16',
        ),
        1 => 
        array (
          'name' => 'unit',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'min',
          ),
        ),
      ),
    ),
    'theatricalReleaseDate' => 
    array (
      'name' => 'theatricalReleaseDate',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Date that a film was originally released in theaters, in the format YYYY-MM-DD.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Theatrical Release Date',
      'group' => 'Additional Category Attributes',
      'rank' => '45000',
      'dataType' => 'date',
    ),
    'isDubbed' => 
    array (
      'name' => 'isDubbed',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A film or television show is dubbed if there is an audio track that replaces the voices of the original actors with a different language',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Dubbed',
      'group' => 'Additional Category Attributes',
      'rank' => '46000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'dubbedLanguages' => 
    array (
      'name' => 'dubbedLanguages',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Language(s) that a film has been dubbed with',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isDubbed',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Dubbed Languages',
      'group' => 'Additional Category Attributes',
      'rank' => '47000',
    ),
    'hasSubtitles' => 
    array (
      'name' => 'hasSubtitles',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A film or television show has subtitles if there is a transcript or screenplay of the dialog or commentary displayed on the screen.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Subtitles',
      'group' => 'Additional Category Attributes',
      'rank' => '48000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'subtitledLanguages' => 
    array (
      'name' => 'subtitledLanguages',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Language(s) that a film\'s subtitles have been written in',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'hasSubtitles',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Subtitled Languages',
      'group' => 'Additional Category Attributes',
      'rank' => '49000',
    ),
    'audioTrackCodec' => 
    array (
      'name' => 'audioTrackCodec',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The compression format or codec for the audio track.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Audio Track Codec',
      'group' => 'Additional Category Attributes',
      'rank' => '50000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'aspectRatio' => 
    array (
      'name' => 'aspectRatio',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The proportional relationship between the display\'s width and its height. Commonly expressed as two numbers separated by a colon.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Aspect Ratio',
      'group' => 'Additional Category Attributes',
      'rank' => '51000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isAdultProduct' => 
    array (
      'name' => 'isAdultProduct',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates if item is adult in nature and should not appear in results for children\'s products.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Adult Product',
      'group' => 'Additional Category Attributes',
      'rank' => '52000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'originalLanguages' => 
    array (
      'name' => 'originalLanguages',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The original language of the work. Usually this will be one language, but occasionally more than one is appropriate. For example, if a movie is dubbed in English but the original language is Chinese, enter "Chinese."',
      'requiredLevel' => 'Optional',
      'displayName' => 'Original Languages',
      'group' => 'Additional Category Attributes',
      'rank' => '53000',
    ),
    'edition' => 
    array (
      'name' => 'edition',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The specific edition of the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Edition',
      'group' => 'Additional Category Attributes',
      'rank' => '54000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'numberOfDiscs' => 
    array (
      'name' => 'numberOfDiscs',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of discs included in the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Discs',
      'group' => 'Additional Category Attributes',
      'rank' => '56000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'sportsLeague' => 
    array (
      'name' => 'sportsLeague',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If your item has any association with a specific sports league, enter the league name. Abbreviations are fine. NOTE: This attribute flags an item for inclusion in the online fan shop.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Sports League',
      'group' => 'Additional Category Attributes',
      'rank' => '57000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'sportsTeam' => 
    array (
      'name' => 'sportsTeam',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If your item has any association with a specific sports team, enter the team name. NOTE: This attribute flags an item for inclusion in the online fan shop.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Sports Team',
      'group' => 'Additional Category Attributes',
      'rank' => '58000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'athlete' => 
    array (
      'name' => 'athlete',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A well-known athlete associated with a product, if applicable. This is used to group items in Fan Shop, not to describe a line of clothing.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Athlete',
      'group' => 'Nice to Have',
      'rank' => '59000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'autographedBy' => 
    array (
      'name' => 'autographedBy',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The full name of the person who has autographed this copy.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Autographed by',
      'group' => 'Nice to Have',
      'rank' => '60000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'features' => 
    array (
      'name' => 'features',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'List notable features of the item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Additional Features',
      'group' => 'Nice to Have',
      'rank' => '65000',
    ),
    'keywords' => 
    array (
      'name' => 'keywords',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Words that people would use to search for this item. Keywords can include synonyms and related terms.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Keywords',
      'group' => 'Nice to Have',
      'rank' => '66000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'swatchImages' => 
    array (
      'name' => 'swatchImages',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'swatchImage',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'child' => 
          array (
            0 => 
            array (
              'name' => 'swatchVariantAttribute',
              'maxOccurs' => '1',
              'minOccurs' => '1',
              'documentation' => 'Conditionally Required',
              'conditionalAttributes' => 
              array (
                0 => 
                array (
                  'name' => 'swatchImageUrl',
                  'value' => 'ANY',
                ),
              ),
              'displayName' => 'Swatch Variant Attribute',
              'group' => 'Item Variants',
              'dataType' => 'string',
              'optionValues' => 
              array (
                0 => 'bookFormat',
                1 => 'physicalMediaFormat',
                2 => 'edition',
                3 => 'sportsTeam',
                4 => 'countPerPack',
                5 => 'count',
              ),
            ),
            1 => 
            array (
              'name' => 'swatchImageUrl',
              'maxOccurs' => '1',
              'minOccurs' => '1',
              'documentation' => 'Conditionally Required',
              'conditionalAttributes' => 
              array (
                0 => 
                array (
                  'name' => 'swatchVariantAttribute',
                  'value' => 'ANY',
                ),
              ),
              'displayName' => 'Swatch Image URL',
              'group' => 'Item Variants',
              'dataType' => 'anyURI',
            ),
          ),
        ),
      ),
    ),
  ),
  'TVShows' => 
  array (
    'shortDescription' => 
    array (
      'name' => 'shortDescription',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Overview of the key selling points of the item, marketing content, and highlights in paragraph form. For SEO purposes, repeat the product name and relevant keywords here.',
      'requiredLevel' => 'Required',
      'displayName' => 'Description',
      'group' => 'Basic',
      'rank' => '8000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'keyFeatures' => 
    array (
      'name' => 'keyFeatures',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Key features will appear as bulleted text on the item page and in search results. Key features help the user understand the benefits of the product with a simple and clean format. We highly recommended using three or more key features.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Key Features',
      'group' => 'Basic',
      'rank' => '9000',
    ),
    'synopsis' => 
    array (
      'name' => 'synopsis',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A summary of narrative content. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Synopsis',
      'group' => 'Basic',
      'rank' => '12000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'countPerPack' => 
    array (
      'name' => 'countPerPack',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of identical items inside each individual pack given by the "Multipack Quantity" attribute. Examples: (1) A single bottle of 50 pills has a "Count Per Pack" of "50." (2) A package containing two identical bottles of 50 pills has a "Count Per Pack" of 50. (3) A 6-pack of soda labelled for individual sale connected by plastic rings has a "Count Per Pack" of "1." (4) A 6-pack of soda in a box whose cans are not marked for individual sale has a "Count Per Pack" of "6." (5) A gift basket of 5 different items has a "Count Per Pack" of "1."',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Count Per Pack',
      'group' => 'Basic',
      'rank' => '12500',
      'dataType' => 'integer',
      'totalDigits' => '4',
    ),
    'multipackQuantity' => 
    array (
      'name' => 'multipackQuantity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of identical, individually packaged-for-sale items. If an item does not contain other items, does not contain identical items, or if the items contained within cannot be sold individually, the value for this attribute should be "1." Examples: (1) A single bottle of 50 pills has a "Multipack Quantity" of "1." (2) A package containing two identical bottles of 50 pills has a "Multipack Quantity" of 2. (3) A 6-pack of soda labelled for individual sale connected by plastic rings has a "Multipack Quantity" of "6." (4) A 6-pack of soda in a box whose cans are not marked for individual sale has a "Multipack Quantity" of "1." (5) A gift basket of 5 different items has a "Multipack Quantity" of "1."',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Multipack Quantity',
      'group' => 'Basic',
      'rank' => '12625',
      'dataType' => 'integer',
      'totalDigits' => '4',
    ),
    'count' => 
    array (
      'name' => 'count',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The total number of identical items in the package or box; a result of the multiplication of Multipack Quantity by Count Per Pack. Examples: (1) A single bottle of 50 pills has a "Total Count" of 50. (2) A package containing two identical bottles of 50 pills has a "Total Count" of 100. (3) A gift basket of 5 different items has a "Total Count" of 1.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Total Count',
      'group' => 'Basic',
      'rank' => '12750',
      'dataType' => 'string',
      'maxLength' => '7',
      'minLength' => '1',
    ),
    'mainImageUrl' => 
    array (
      'name' => 'mainImageUrl',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Main image of the item. Image URL must end in the file name. Image URL must be static and have no redirections. Preferred file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Recommended image resolution: 3000 x 3000 pixels at 300 ppi. Minimum image size requirements: Zoom capability: 2000 x 2000 pixels at 300 ppi. Non-zoom minimum: 500 x 500 pixels at 72 ppi. Maximum file size: 2 MB.',
      'requiredLevel' => 'Required',
      'displayName' => 'Main Image URL',
      'group' => 'Images',
      'rank' => '14000',
      'dataType' => 'anyURI',
    ),
    'productSecondaryImageURL' => 
    array (
      'name' => 'productSecondaryImageURL',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Secondary images of the item. Image URL must end in the file name. Image URL must be static and have no redirections. Preferred file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Recommended image resolution: 3000 x 3000 pixels at 300 ppi. Minimum image size requirements: Zoom capability: 2000 x 2000 pixels at 300 ppi. Non-zoom minimum: 500 x 500 pixels at 72 ppi. Maximum file size: 2 MB.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Additional Image URL',
      'group' => 'Images',
      'rank' => '15000',
    ),
    'title' => 
    array (
      'name' => 'title',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The name given to the work. Does not include any marketing adjectives outside of the given name.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Title',
      'group' => 'Discoverability',
      'rank' => '16000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'physicalMediaFormat' => 
    array (
      'name' => 'physicalMediaFormat',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The physical form in which the customer receives the product. For digital file formats use "Digital Audio File Format" (for mp3, aiff, etc), "Digital Video File Format" (for mp4, mov, etc), or "Digital File Format" (for exe, pdf, zip, etc).',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Physical Media Format',
      'group' => 'Discoverability',
      'rank' => '17000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'printed media',
        1 => 'USB stick',
        2 => 'DVD',
        3 => 'Blu-Ray',
        4 => 'CD',
        5 => 'LP',
        6 => 'VHS Tape',
        7 => 'miniDV Tape',
        8 => '8-Track Tape',
        9 => 'Cassette Tape',
      ),
    ),
    'tvRating' => 
    array (
      'name' => 'tvRating',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'TV Parental Guidelines Rating, as required by the FCC for televisions shows airing in the US.',
      'requiredLevel' => 'Required',
      'displayName' => 'TV Rating',
      'group' => 'Discoverability',
      'rank' => '18000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'ratingReason' => 
    array (
      'name' => 'ratingReason',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The reason for the rating of an entertainment product, such as a TV show, Movie, or Musical Album. Reasons for suggesting that content is not appropriate for a general audience include Profanity, Drug Use, Violence, Nudity, and Sexual Content. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Rating Reason',
      'group' => 'Discoverability',
      'rank' => '18500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'tvShowGenre' => 
    array (
      'name' => 'tvShowGenre',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The general category for the television show.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'TV Show Genre',
      'group' => 'Discoverability',
      'rank' => '19000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'tvShowSubgenre' => 
    array (
      'name' => 'tvShowSubgenre',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The more specific subcategory for the television show.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'TV Show Subgenre',
      'group' => 'Discoverability',
      'rank' => '20000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'tvNetwork' => 
    array (
      'name' => 'tvNetwork',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The broadcast, cable or online network which distributes the television program.',
      'requiredLevel' => 'Optional',
      'displayName' => 'TV Network',
      'group' => 'Discoverability',
      'rank' => '21000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'seriesTitle' => 
    array (
      'name' => 'seriesTitle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If the work is one of multiple works in a series, the title of the series or collection.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Series Title',
      'group' => 'Discoverability',
      'rank' => '22000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'numberInSeries' => 
    array (
      'name' => 'numberInSeries',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number in the series, if the work is one of multiple works in a series.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number in Series',
      'group' => 'Discoverability',
      'rank' => '23000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'tvShowSeason' => 
    array (
      'name' => 'tvShowSeason',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The set of television episodes recorded for the season of the calendar year, usually airing from September until May.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'TV Show Season',
      'group' => 'Discoverability',
      'rank' => '24000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'character' => 
    array (
      'name' => 'character',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A person or entity portrayed in print or visual media. A character might be a fictional personality or an actual living person.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Character',
      'group' => 'Discoverability',
      'rank' => '25000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'numberOfEpisodes' => 
    array (
      'name' => 'numberOfEpisodes',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of television episodes contained in the item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Number of Episodes',
      'group' => 'Discoverability',
      'rank' => '26000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'episode' => 
    array (
      'name' => 'episode',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If the item is only one episode, the number of the episode.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Episode',
      'group' => 'Discoverability',
      'rank' => '27000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'director' => 
    array (
      'name' => 'director',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Person who receives "Directed by" billing on a film or television show.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Director',
      'group' => 'Discoverability',
      'rank' => '28000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'actors' => 
    array (
      'name' => 'actors',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Actors who receive top billing in a movie or television show.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Actors',
      'group' => 'Discoverability',
      'rank' => '29000',
    ),
    'screenwriter' => 
    array (
      'name' => 'screenwriter',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Person who is credited or billed as the primary writer on a film or television project.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Screenwriter',
      'group' => 'Discoverability',
      'rank' => '30000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'studioProductionCompany' => 
    array (
      'name' => 'studioProductionCompany',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Company that is credited with creation of a film or television show.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Studio & Production Company',
      'group' => 'Discoverability',
      'rank' => '31000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'targetAudience' => 
    array (
      'name' => 'targetAudience',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The demographic for which the item is targeted.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Target Audience',
      'group' => 'Discoverability',
      'rank' => '32000',
    ),
    'awardsWon' => 
    array (
      'name' => 'awardsWon',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Use this attribute if the item has won any awards in its particular product category. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Awards Won',
      'group' => 'Discoverability',
      'rank' => '33000',
    ),
    'variantGroupId' => 
    array (
      'name' => 'variantGroupId',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Required if item is a variant. Make up a number and/or letter code for “Variant Group ID” and add this to all variations of the same product. Partners must ensure uniqueness of their Variant Group IDs.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'variantAttributeNames',
          'value' => 'ANY',
        ),
      ),
      'displayName' => 'Variant Group ID',
      'group' => 'Item Variants',
      'rank' => '35000',
      'dataType' => 'string',
      'maxLength' => '300',
      'minLength' => '1',
    ),
    'variantAttributeNames' => 
    array (
      'name' => 'variantAttributeNames',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Designate all attributes by which the item is varying. Variant attributes are limited to those designated for each category. ',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'variantGroupId',
          'value' => 'ANY',
        ),
      ),
      'displayName' => 'Variant Attribute Names',
      'group' => 'Item Variants',
      'rank' => '36000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'variantAttributeName',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'bookFormat',
            1 => 'physicalMediaFormat',
            2 => 'edition',
            3 => 'sportsTeam',
            4 => 'countPerPack',
            5 => 'count',
          ),
        ),
      ),
    ),
    'isPrimaryVariant' => 
    array (
      'name' => 'isPrimaryVariant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Note whether item is intended as the main variant in a variant grouping. The primary variant will appear as the image when customers search and the first image displayed on the item page. This should be set as "Yes" for only one item in a group of variants.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Primary Variant',
      'group' => 'Item Variants',
      'rank' => '37000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isAdultProduct' => 
    array (
      'name' => 'isAdultProduct',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates if item is adult in nature and should not appear in results for children\'s products.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Adult Product',
      'group' => 'Additional Category Attributes',
      'rank' => '48000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'numberOfDiscs' => 
    array (
      'name' => 'numberOfDiscs',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of discs included in the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Discs',
      'group' => 'Additional Category Attributes',
      'rank' => '49000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'originalLanguages' => 
    array (
      'name' => 'originalLanguages',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The original language of the work. Usually this will be one language, but occasionally more than one is appropriate. For example, if a movie is dubbed in English but the original language is Chinese, enter "Chinese."',
      'requiredLevel' => 'Optional',
      'displayName' => 'Original Languages',
      'group' => 'Additional Category Attributes',
      'rank' => '50000',
    ),
    'edition' => 
    array (
      'name' => 'edition',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The specific edition of the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Edition',
      'group' => 'Additional Category Attributes',
      'rank' => '51000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'releaseDate' => 
    array (
      'name' => 'releaseDate',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates the release date of a product from the manufacturer, in the format yyyy-mm-dd. This will be the date on which distribution of the product will be initiated.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Release Date',
      'group' => 'Additional Category Attributes',
      'rank' => '52000',
      'dataType' => 'date',
    ),
    'duration' => 
    array (
      'name' => 'duration',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Viewing or listening time.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Duration',
      'group' => 'Additional Category Attributes',
      'rank' => '53000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'decimal',
          'totalDigits' => '16',
        ),
        1 => 
        array (
          'name' => 'unit',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'min',
          ),
        ),
      ),
    ),
    'hasSubtitles' => 
    array (
      'name' => 'hasSubtitles',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A film or television show has subtitles if there is a transcript or screenplay of the dialog or commentary displayed on the screen.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Subtitles',
      'group' => 'Additional Category Attributes',
      'rank' => '54000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'subtitledLanguages' => 
    array (
      'name' => 'subtitledLanguages',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Language(s) that a film\'s subtitles have been written in',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'hasSubtitles',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Subtitled Languages',
      'group' => 'Additional Category Attributes',
      'rank' => '55000',
    ),
    'isDubbed' => 
    array (
      'name' => 'isDubbed',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A film or television show is dubbed if there is an audio track that replaces the voices of the original actors with a different language',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Dubbed',
      'group' => 'Additional Category Attributes',
      'rank' => '56000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'dubbedLanguages' => 
    array (
      'name' => 'dubbedLanguages',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Language(s) that a film has been dubbed with',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isDubbed',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Dubbed Languages',
      'group' => 'Additional Category Attributes',
      'rank' => '57000',
    ),
    'audioTrackCodec' => 
    array (
      'name' => 'audioTrackCodec',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The compression format or codec for the audio track.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Audio Track Codec',
      'group' => 'Additional Category Attributes',
      'rank' => '58000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'aspectRatio' => 
    array (
      'name' => 'aspectRatio',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The proportional relationship between the display\'s width and its height. Commonly expressed as two numbers separated by a colon.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Aspect Ratio',
      'group' => 'Additional Category Attributes',
      'rank' => '59000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'sportsLeague' => 
    array (
      'name' => 'sportsLeague',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If your item has any association with a specific sports league, enter the league name. Abbreviations are fine. NOTE: This attribute flags an item for inclusion in the online fan shop.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Sports League',
      'group' => 'Additional Category Attributes',
      'rank' => '60000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'sportsTeam' => 
    array (
      'name' => 'sportsTeam',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If your item has any association with a specific sports team, enter the team name. NOTE: This attribute flags an item for inclusion in the online fan shop.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Sports Team',
      'group' => 'Additional Category Attributes',
      'rank' => '61000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'athlete' => 
    array (
      'name' => 'athlete',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A well-known athlete associated with a product, if applicable. This is used to group items in Fan Shop, not to describe a line of clothing.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Athlete',
      'group' => 'Nice to Have',
      'rank' => '62000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'features' => 
    array (
      'name' => 'features',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'List notable features of the item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Additional Features',
      'group' => 'Nice to Have',
      'rank' => '68000',
    ),
    'keywords' => 
    array (
      'name' => 'keywords',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Words that people would use to search for this item. Keywords can include synonyms and related terms.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Keywords',
      'group' => 'Nice to Have',
      'rank' => '69000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'dvdReleaseDate' => 
    array (
      'name' => 'dvdReleaseDate',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Date that the film or TV show was released on DVD, given in the format YYYY-MM-DD.',
      'requiredLevel' => 'Optional',
      'displayName' => 'DVD Release Date',
      'group' => 'Nice to Have',
      'rank' => '70000',
      'dataType' => 'date',
    ),
    'swatchImages' => 
    array (
      'name' => 'swatchImages',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'swatchImage',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'child' => 
          array (
            0 => 
            array (
              'name' => 'swatchVariantAttribute',
              'maxOccurs' => '1',
              'minOccurs' => '1',
              'documentation' => 'Conditionally Required',
              'conditionalAttributes' => 
              array (
                0 => 
                array (
                  'name' => 'swatchImageUrl',
                  'value' => 'ANY',
                ),
              ),
              'displayName' => 'Swatch Variant Attribute',
              'group' => 'Item Variants',
              'dataType' => 'string',
              'optionValues' => 
              array (
                0 => 'bookFormat',
                1 => 'physicalMediaFormat',
                2 => 'edition',
                3 => 'sportsTeam',
                4 => 'countPerPack',
                5 => 'count',
                6 => 'tvRating',
              ),
            ),
            1 => 
            array (
              'name' => 'swatchImageUrl',
              'maxOccurs' => '1',
              'minOccurs' => '1',
              'documentation' => 'Conditionally Required',
              'conditionalAttributes' => 
              array (
                0 => 
                array (
                  'name' => 'swatchVariantAttribute',
                  'value' => 'ANY',
                ),
              ),
              'displayName' => 'Swatch Image URL',
              'group' => 'Item Variants',
              'dataType' => 'anyURI',
            ),
          ),
        ),
      ),
    ),
  ),
  'Music' => 
  array (
    'shortDescription' => 
    array (
      'name' => 'shortDescription',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Overview of the key selling points of the item, marketing content, and highlights in paragraph form. For SEO purposes, repeat the product name and relevant keywords here.',
      'requiredLevel' => 'Required',
      'displayName' => 'Description',
      'group' => 'Basic',
      'rank' => '8000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'keyFeatures' => 
    array (
      'name' => 'keyFeatures',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Key features will appear as bulleted text on the item page and in search results. Key features help the user understand the benefits of the product with a simple and clean format. We highly recommended using three or more key features.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Key Features',
      'group' => 'Basic',
      'rank' => '9000',
    ),
    'synopsis' => 
    array (
      'name' => 'synopsis',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A summary of narrative content. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Synopsis',
      'group' => 'Basic',
      'rank' => '12000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'multipackQuantity' => 
    array (
      'name' => 'multipackQuantity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of identical, individually packaged-for-sale items. If an item does not contain other items, does not contain identical items, or if the items contained within cannot be sold individually, the value for this attribute should be "1." Examples: (1) A single bottle of 50 pills has a "Multipack Quantity" of "1." (2) A package containing two identical bottles of 50 pills has a "Multipack Quantity" of 2. (3) A 6-pack of soda labelled for individual sale connected by plastic rings has a "Multipack Quantity" of "6." (4) A 6-pack of soda in a box whose cans are not marked for individual sale has a "Multipack Quantity" of "1." (5) A gift basket of 5 different items has a "Multipack Quantity" of "1."',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Multipack Quantity',
      'group' => 'Basic',
      'rank' => '13000',
      'dataType' => 'integer',
      'totalDigits' => '4',
    ),
    'countPerPack' => 
    array (
      'name' => 'countPerPack',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of identical items inside each individual pack given by the "Multipack Quantity" attribute. Examples: (1) A single bottle of 50 pills has a "Count Per Pack" of "50." (2) A package containing two identical bottles of 50 pills has a "Count Per Pack" of 50. (3) A 6-pack of soda labelled for individual sale connected by plastic rings has a "Count Per Pack" of "1." (4) A 6-pack of soda in a box whose cans are not marked for individual sale has a "Count Per Pack" of "6." (5) A gift basket of 5 different items has a "Count Per Pack" of "1."',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Count Per Pack',
      'group' => 'Basic',
      'rank' => '13500',
      'dataType' => 'integer',
      'totalDigits' => '4',
    ),
    'count' => 
    array (
      'name' => 'count',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The total number of identical items in the package or box; a result of the multiplication of Multipack Quantity by Count Per Pack. Examples: (1) A single bottle of 50 pills has a "Total Count" of 50. (2) A package containing two identical bottles of 50 pills has a "Total Count" of 100. (3) A gift basket of 5 different items has a "Total Count" of 1.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Total Count',
      'group' => 'Basic',
      'rank' => '13550',
      'dataType' => 'string',
      'maxLength' => '7',
      'minLength' => '1',
    ),
    'mainImageUrl' => 
    array (
      'name' => 'mainImageUrl',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Main image of the item. Image URL must end in the file name. Image URL must be static and have no redirections. Preferred file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Recommended image resolution: 3000 x 3000 pixels at 300 ppi. Minimum image size requirements: Zoom capability: 2000 x 2000 pixels at 300 ppi. Non-zoom minimum: 500 x 500 pixels at 72 ppi. Maximum file size: 2 MB.',
      'requiredLevel' => 'Required',
      'displayName' => 'Main Image URL',
      'group' => 'Images',
      'rank' => '14000',
      'dataType' => 'anyURI',
    ),
    'productSecondaryImageURL' => 
    array (
      'name' => 'productSecondaryImageURL',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Secondary images of the item. Image URL must end in the file name. Image URL must be static and have no redirections. Preferred file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Recommended image resolution: 3000 x 3000 pixels at 300 ppi. Minimum image size requirements: Zoom capability: 2000 x 2000 pixels at 300 ppi. Non-zoom minimum: 500 x 500 pixels at 72 ppi. Maximum file size: 2 MB.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Additional Image URL',
      'group' => 'Images',
      'rank' => '15000',
    ),
    'title' => 
    array (
      'name' => 'title',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The name given to the work. Does not include any marketing adjectives outside of the given name.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Title',
      'group' => 'Discoverability',
      'rank' => '16000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'physicalMediaFormat' => 
    array (
      'name' => 'physicalMediaFormat',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The physical form in which the customer receives the product. For digital file formats use "Digital Audio File Format" (for mp3, aiff, etc), "Digital Video File Format" (for mp4, mov, etc), or "Digital File Format" (for exe, pdf, zip, etc).',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Physical Media Format',
      'group' => 'Discoverability',
      'rank' => '17000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'printed media',
        1 => 'USB stick',
        2 => 'DVD',
        3 => 'Blu-Ray',
        4 => 'CD',
        5 => 'LP',
        6 => 'VHS Tape',
        7 => 'miniDV Tape',
        8 => '8-Track Tape',
        9 => 'Cassette Tape',
      ),
    ),
    'performer' => 
    array (
      'name' => 'performer',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The performer/s or name of group on the album or single.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Performer',
      'group' => 'Discoverability',
      'rank' => '18000',
    ),
    'songwriter' => 
    array (
      'name' => 'songwriter',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A person credited with authorship of tracks on a music product.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Songwriter',
      'group' => 'Discoverability',
      'rank' => '19000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'musicGenre' => 
    array (
      'name' => 'musicGenre',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'General music category.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Music Genre',
      'group' => 'Discoverability',
      'rank' => '20000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'musicSubGenre' => 
    array (
      'name' => 'musicSubGenre',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Specific music category.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Music Subgenre',
      'group' => 'Discoverability',
      'rank' => '21000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'targetAudience' => 
    array (
      'name' => 'targetAudience',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The demographic for which the item is targeted.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Target Audience',
      'group' => 'Discoverability',
      'rank' => '22000',
    ),
    'awardsWon' => 
    array (
      'name' => 'awardsWon',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Use this attribute if the item has won any awards in its particular product category. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Awards Won',
      'group' => 'Discoverability',
      'rank' => '23000',
    ),
    'character' => 
    array (
      'name' => 'character',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A person or entity portrayed in print or visual media. A character might be a fictional personality or an actual living person.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Character',
      'group' => 'Discoverability',
      'rank' => '24000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'variantGroupId' => 
    array (
      'name' => 'variantGroupId',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Required if item is a variant. Make up a number and/or letter code for “Variant Group ID” and add this to all variations of the same product. Partners must ensure uniqueness of their Variant Group IDs.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'variantAttributeNames',
          'value' => 'ANY',
        ),
      ),
      'displayName' => 'Variant Group ID',
      'group' => 'Item Variants',
      'rank' => '26000',
      'dataType' => 'string',
      'maxLength' => '300',
      'minLength' => '1',
    ),
    'variantAttributeNames' => 
    array (
      'name' => 'variantAttributeNames',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Designate all attributes by which the item is varying. Variant attributes are limited to those designated for each category. ',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'variantGroupId',
          'value' => 'ANY',
        ),
      ),
      'displayName' => 'Variant Attribute Names',
      'group' => 'Item Variants',
      'rank' => '27000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'variantAttributeName',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'bookFormat',
            1 => 'physicalMediaFormat',
            2 => 'edition',
            3 => 'sportsTeam',
            4 => 'countPerPack',
            5 => 'count',
                            6 => 'tvRating',

          ),
        ),
      ),
    ),
    'isPrimaryVariant' => 
    array (
      'name' => 'isPrimaryVariant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Note whether item is intended as the main variant in a variant grouping. The primary variant will appear as the image when customers search and the first image displayed on the item page. This should be set as "Yes" for only one item in a group of variants.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Primary Variant',
      'group' => 'Item Variants',
      'rank' => '28000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'digitalAudioFileFormat' => 
    array (
      'name' => 'digitalAudioFileFormat',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The file format of the digital audio file.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Digital Audio File Format',
      'group' => 'Additional Category Attributes',
      'rank' => '36500',
    ),
    'recordLabel' => 
    array (
      'name' => 'recordLabel',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The brand or publishing company associated with the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Record Label',
      'group' => 'Additional Category Attributes',
      'rank' => '39000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'releaseDate' => 
    array (
      'name' => 'releaseDate',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates the release date of a product from the manufacturer, in the format yyyy-mm-dd. This will be the date on which distribution of the product will be initiated.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Release Date',
      'group' => 'Additional Category Attributes',
      'rank' => '40000',
      'dataType' => 'date',
    ),
    'musicReleaseType' => 
    array (
      'name' => 'musicReleaseType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A distinguishing feature of the release, such as number of tracks or type of performance.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Music Release',
      'group' => 'Additional Category Attributes',
      'rank' => '41000',
      'dataType' => 'string',
      'maxLength' => '400',
      'minLength' => '1',
    ),
    'trackListings' => 
    array (
      'name' => 'trackListings',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'List each track on the album with track name, number, and duration.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Track Listings',
      'group' => 'Additional Category Attributes',
      'rank' => '42000',
    ),
    'numberOfTracks' => 
    array (
      'name' => 'numberOfTracks',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of tracks included in the item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Number of Tracks',
      'group' => 'Additional Category Attributes',
      'rank' => '43000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'musicProducer' => 
    array (
      'name' => 'musicProducer',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Person or entity credited with producing the album or single.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Music Producer',
      'group' => 'Additional Category Attributes',
      'rank' => '44000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'seriesTitle' => 
    array (
      'name' => 'seriesTitle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If the work is one of multiple works in a series, the title of the series or collection.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Series Title',
      'group' => 'Additional Category Attributes',
      'rank' => '45000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'numberInSeries' => 
    array (
      'name' => 'numberInSeries',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number in the series, if the work is one of multiple works in a series.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number in Series',
      'group' => 'Additional Category Attributes',
      'rank' => '46000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'isEdited' => 
    array (
      'name' => 'isEdited',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the content has been altered as compared to its original release. For example, a song that has been edited to delete explicate language or to reduce the length of play.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Edited',
      'group' => 'Additional Category Attributes',
      'rank' => '47000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isEnhanced' => 
    array (
      'name' => 'isEnhanced',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the content has undergone a specific process to improve a quality, or add a feature as compared to its original form. For example, a music CD that has tracks added to enable consumers to view details about the song’s title and performer on their TV screen. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Enhanced',
      'group' => 'Additional Category Attributes',
      'rank' => '48000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'edition' => 
    array (
      'name' => 'edition',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The specific edition of the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Edition',
      'group' => 'Additional Category Attributes',
      'rank' => '49000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'hasParentalAdvisoryLabel' => 
    array (
      'name' => 'hasParentalAdvisoryLabel',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates whether a music album has been labeled with a Parental Advisory label by the Recording Industry Association of America.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Has Parental Advisory Label',
      'group' => 'Additional Category Attributes',
      'rank' => '51000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'ratingReason' => 
    array (
      'name' => 'ratingReason',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The reason for the rating of an entertainment product, such as a TV show, Movie, or Musical Album. Reasons for suggesting that content is not appropriate for a general audience include Profanity, Drug Use, Violence, Nudity, and Sexual Content. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Rating Reason',
      'group' => 'Additional Category Attributes',
      'rank' => '51500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'parentalAdvisoryLabelURL' => 
    array (
      'name' => 'parentalAdvisoryLabelURL',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If Has Parental Advisory Label=Y, pdf or image of label must be provided. URL of image. Provide the final destination image URL (no-redirects) that is publicly accessible (no username/password required) and ends in a proper image extension. Recommended file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Maximum file size: 2GB. (Please enter text with 2000 character max.)',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Parental Advisory Label URL',
      'group' => 'Additional Category Attributes',
      'rank' => '52000',
    ),
    'numberOfDiscs' => 
    array (
      'name' => 'numberOfDiscs',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of discs included in the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Discs',
      'group' => 'Additional Category Attributes',
      'rank' => '53000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'isAdultProduct' => 
    array (
      'name' => 'isAdultProduct',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates if item is adult in nature and should not appear in results for children\'s products.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Adult Product',
      'group' => 'Additional Category Attributes',
      'rank' => '54000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'originalLanguages' => 
    array (
      'name' => 'originalLanguages',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The original language of the work. Usually this will be one language, but occasionally more than one is appropriate. For example, if a movie is dubbed in English but the original language is Chinese, enter "Chinese."',
      'requiredLevel' => 'Optional',
      'displayName' => 'Original Languages',
      'group' => 'Additional Category Attributes',
      'rank' => '55000',
    ),
    'autographedBy' => 
    array (
      'name' => 'autographedBy',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The full name of the person who has autographed this copy.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Autographed by',
      'group' => 'Nice to Have',
      'rank' => '56000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'features' => 
    array (
      'name' => 'features',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'List notable features of the item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Additional Features',
      'group' => 'Nice to Have',
      'rank' => '61000',
    ),
    'keywords' => 
    array (
      'name' => 'keywords',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Words that people would use to search for this item. Keywords can include synonyms and related terms.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Keywords',
      'group' => 'Nice to Have',
      'rank' => '62000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'swatchImages' => 
    array (
      'name' => 'swatchImages',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'swatchImage',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'child' => 
          array (
            0 => 
            array (
              'name' => 'swatchVariantAttribute',
              'maxOccurs' => '1',
              'minOccurs' => '1',
              'documentation' => 'Conditionally Required',
              'conditionalAttributes' => 
              array (
                0 => 
                array (
                  'name' => 'swatchImageUrl',
                  'value' => 'ANY',
                ),
              ),
              'displayName' => 'Swatch Variant Attribute',
              'group' => 'Item Variants',
              'dataType' => 'string',
              'optionValues' => 
              array (
                0 => 'bookFormat',
                1 => 'physicalMediaFormat',
                2 => 'edition',
                3 => 'sportsTeam',
                4 => 'countPerPack',
                5 => 'count',
              ),
            ),
            1 => 
            array (
              'name' => 'swatchImageUrl',
              'maxOccurs' => '1',
              'minOccurs' => '1',
              'documentation' => 'Conditionally Required',
              'conditionalAttributes' => 
              array (
                0 => 
                array (
                  'name' => 'swatchVariantAttribute',
                  'value' => 'ANY',
                ),
              ),
              'displayName' => 'Swatch Image URL',
              'group' => 'Item Variants',
              'dataType' => 'anyURI',
            ),
          ),
        ),
      ),
    ),
  ),
  'BooksAndMagazines' => 
  array (
    'shortDescription' => 
    array (
      'name' => 'shortDescription',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Overview of the key selling points of the item, marketing content, and highlights in paragraph form. For SEO purposes, repeat the product name and relevant keywords here.',
      'requiredLevel' => 'Required',
      'displayName' => 'Description',
      'group' => 'Basic',
      'rank' => '8000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'keyFeatures' => 
    array (
      'name' => 'keyFeatures',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Key features will appear as bulleted text on the item page and in search results. Key features help the user understand the benefits of the product with a simple and clean format. We highly recommended using three or more key features.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Key Features',
      'group' => 'Basic',
      'rank' => '9000',
    ),
    'synopsis' => 
    array (
      'name' => 'synopsis',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A summary of narrative content. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Synopsis',
      'group' => 'Basic',
      'rank' => '12000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'multipackQuantity' => 
    array (
      'name' => 'multipackQuantity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of identical, individually packaged-for-sale items. If an item does not contain other items, does not contain identical items, or if the items contained within cannot be sold individually, the value for this attribute should be "1." Examples: (1) A single bottle of 50 pills has a "Multipack Quantity" of "1." (2) A package containing two identical bottles of 50 pills has a "Multipack Quantity" of 2. (3) A 6-pack of soda labelled for individual sale connected by plastic rings has a "Multipack Quantity" of "6." (4) A 6-pack of soda in a box whose cans are not marked for individual sale has a "Multipack Quantity" of "1." (5) A gift basket of 5 different items has a "Multipack Quantity" of "1."',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Multipack Quantity',
      'group' => 'Basic',
      'rank' => '13000',
      'dataType' => 'integer',
      'totalDigits' => '4',
    ),
    'countPerPack' => 
    array (
      'name' => 'countPerPack',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of identical items inside each individual pack given by the "Multipack Quantity" attribute. Examples: (1) A single bottle of 50 pills has a "Count Per Pack" of "50." (2) A package containing two identical bottles of 50 pills has a "Count Per Pack" of 50. (3) A 6-pack of soda labelled for individual sale connected by plastic rings has a "Count Per Pack" of "1." (4) A 6-pack of soda in a box whose cans are not marked for individual sale has a "Count Per Pack" of "6." (5) A gift basket of 5 different items has a "Count Per Pack" of "1."',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Count Per Pack',
      'group' => 'Basic',
      'rank' => '13500',
      'dataType' => 'integer',
      'totalDigits' => '4',
    ),
    'count' => 
    array (
      'name' => 'count',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The total number of identical items in the package or box; a result of the multiplication of Multipack Quantity by Count Per Pack. Examples: (1) A single bottle of 50 pills has a "Total Count" of 50. (2) A package containing two identical bottles of 50 pills has a "Total Count" of 100. (3) A gift basket of 5 different items has a "Total Count" of 1.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Total Count',
      'group' => 'Basic',
      'rank' => '13550',
      'dataType' => 'string',
      'maxLength' => '7',
      'minLength' => '1',
    ),
    'mainImageUrl' => 
    array (
      'name' => 'mainImageUrl',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Main image of the item. Image URL must end in the file name. Image URL must be static and have no redirections. Preferred file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Recommended image resolution: 3000 x 3000 pixels at 300 ppi. Minimum image size requirements: Zoom capability: 2000 x 2000 pixels at 300 ppi. Non-zoom minimum: 500 x 500 pixels at 72 ppi. Maximum file size: 2 MB.',
      'requiredLevel' => 'Required',
      'displayName' => 'Main Image URL',
      'group' => 'Images',
      'rank' => '14000',
      'dataType' => 'anyURI',
    ),
    'productSecondaryImageURL' => 
    array (
      'name' => 'productSecondaryImageURL',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Secondary images of the item. Image URL must end in the file name. Image URL must be static and have no redirections. Preferred file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Recommended image resolution: 3000 x 3000 pixels at 300 ppi. Minimum image size requirements: Zoom capability: 2000 x 2000 pixels at 300 ppi. Non-zoom minimum: 500 x 500 pixels at 72 ppi. Maximum file size: 2 MB.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Additional Image URL',
      'group' => 'Images',
      'rank' => '15000',
    ),
    'title' => 
    array (
      'name' => 'title',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The name given to the work. Does not include any marketing adjectives outside of the given name.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Title',
      'group' => 'Discoverability',
      'rank' => '16000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'bookFormat' => 
    array (
      'name' => 'bookFormat',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Formats specific to books. If the book format is "eBook," also use the Digital File Format attribute to capture file type (exe, pdf, zip, etc). If the book format is "Audiobook," also use "Digital Audio File Format" (for mp3, aiff, etc). If your audio or eBook will not be delivered online (perhaps it will come on an audio CD, USB stick, etc.), fill in the Physical Media Format attribute to capture that information.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Book Format',
      'group' => 'Discoverability',
      'rank' => '17000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Paperback',
        1 => 'Hardcover',
        2 => 'eBook',
        3 => 'Audiobook',
        4 => 'Board Book',
        5 => 'Library Binding',
        6 => 'Other',
      ),
    ),
    'author' => 
    array (
      'name' => 'author',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The name (or pseudonym) of the person who wrote a book, as written on the cover and/or title page.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Author',
      'group' => 'Discoverability',
      'rank' => '18000',
    ),
    'publisher' => 
    array (
      'name' => 'publisher',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Publishing company as printed or displayed on the cover or title page.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Publisher',
      'group' => 'Discoverability',
      'rank' => '19000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'publicationDate' => 
    array (
      'name' => 'publicationDate',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Date of publication for the current edition, in the format yyyy-mm-dd.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Publication Date',
      'group' => 'Discoverability',
      'rank' => '20000',
      'dataType' => 'date',
    ),
    'originalPublicationDate' => 
    array (
      'name' => 'originalPublicationDate',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Date that a printed work was first published in the format yyyy-mm-dd, if different from the publication date of the current edition. If current edition is the original publication, leave this blank.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Original Publication Date',
      'group' => 'Discoverability',
      'rank' => '21000',
      'dataType' => 'date',
    ),
    'targetAudience' => 
    array (
      'name' => 'targetAudience',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The demographic for which the item is targeted.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Target Audience',
      'group' => 'Discoverability',
      'rank' => '22000',
    ),
    'awardsWon' => 
    array (
      'name' => 'awardsWon',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Use this attribute if the item has won any awards in its particular product category. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Awards Won',
      'group' => 'Discoverability',
      'rank' => '23000',
    ),
    'character' => 
    array (
      'name' => 'character',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A person or entity portrayed in print or visual media. A character might be a fictional personality or an actual living person.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Character',
      'group' => 'Discoverability',
      'rank' => '24000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'fictionNonfiction' => 
    array (
      'name' => 'fictionNonfiction',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Basic category of literature, typically in the form of books. For example, fiction books are stories created by an author’s imagination and types of fiction include mystery, science fiction, romance. Non-fiction books present real events, people, and places and include reference books, cookbooks, and biographies.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Fiction/Nonfiction',
      'group' => 'Discoverability',
      'rank' => '25000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Fiction',
        1 => 'Non-Fiction',
      ),
    ),
    'genre' => 
    array (
      'name' => 'genre',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The general book or magazine category.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Genre',
      'group' => 'Discoverability',
      'rank' => '26000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'subgenre' => 
    array (
      'name' => 'subgenre',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The more specific book or magazine subcategory.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Subgenre',
      'group' => 'Discoverability',
      'rank' => '27000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'subject' => 
    array (
      'name' => 'subject',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The "aboutness" of an item, distinct from the genre. It may be the subject of a documentary, nonfiction book, or art print.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Subject',
      'group' => 'Discoverability',
      'rank' => '28000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'seriesTitle' => 
    array (
      'name' => 'seriesTitle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If the work is one of multiple works in a series, the title of the series or collection.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Series Title',
      'group' => 'Discoverability',
      'rank' => '29000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'numberInSeries' => 
    array (
      'name' => 'numberInSeries',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number in the series, if the work is one of multiple works in a series.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number in Series',
      'group' => 'Discoverability',
      'rank' => '30000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'issue' => 
    array (
      'name' => 'issue',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'For an ongoing serial publication, the specific issue, as named by the publication, usually either month and year, or issue and volume number.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Issue',
      'group' => 'Discoverability',
      'rank' => '31000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'assembledProductLength' => 
    array (
      'name' => 'assembledProductLength',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The length of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Length',
      'group' => 'Dimensions',
      'rank' => '33000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'decimal',
          'totalDigits' => '16',
        ),
        1 => 
        array (
          'name' => 'unit',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'in',
            1 => 'ft',
          ),
        ),
      ),
    ),
    'assembledProductWidth' => 
    array (
      'name' => 'assembledProductWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The width of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Width',
      'group' => 'Dimensions',
      'rank' => '34000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'decimal',
          'totalDigits' => '16',
        ),
        1 => 
        array (
          'name' => 'unit',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'in',
            1 => 'ft',
          ),
        ),
      ),
    ),
    'assembledProductHeight' => 
    array (
      'name' => 'assembledProductHeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The height of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Height',
      'group' => 'Dimensions',
      'rank' => '35000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'decimal',
          'totalDigits' => '16',
        ),
        1 => 
        array (
          'name' => 'unit',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'in',
            1 => 'ft',
          ),
        ),
      ),
    ),
    'assembledProductWeight' => 
    array (
      'name' => 'assembledProductWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The weight of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Weight',
      'group' => 'Dimensions',
      'rank' => '36000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'decimal',
          'totalDigits' => '16',
        ),
        1 => 
        array (
          'name' => 'unit',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'oz',
            1 => 'lb',
            2 => 'g',
            3 => 'kg',
          ),
        ),
      ),
    ),
    'variantGroupId' => 
    array (
      'name' => 'variantGroupId',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Required if item is a variant. Make up a number and/or letter code for “Variant Group ID” and add this to all variations of the same product. Partners must ensure uniqueness of their Variant Group IDs.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'variantAttributeNames',
          'value' => 'ANY',
        ),
      ),
      'displayName' => 'Variant Group ID',
      'group' => 'Item Variants',
      'rank' => '38000',
      'dataType' => 'string',
      'maxLength' => '300',
      'minLength' => '1',
    ),
    'variantAttributeNames' => 
    array (
      'name' => 'variantAttributeNames',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Designate all attributes by which the item is varying. Variant attributes are limited to those designated for each category. ',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'variantGroupId',
          'value' => 'ANY',
        ),
      ),
      'displayName' => 'Variant Attribute Names',
      'group' => 'Item Variants',
      'rank' => '39000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'variantAttributeName',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'bookFormat',
            1 => 'physicalMediaFormat',
            2 => 'edition',
            3 => 'sportsTeam',
            4 => 'countPerPack',
            5 => 'count',
          ),
        ),
      ),
    ),
    'isPrimaryVariant' => 
    array (
      'name' => 'isPrimaryVariant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Note whether item is intended as the main variant in a variant grouping. The primary variant will appear as the image when customers search and the first image displayed on the item page. This should be set as "Yes" for only one item in a group of variants.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Primary Variant',
      'group' => 'Item Variants',
      'rank' => '40000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'smallPartsWarnings' => 
    array (
      'name' => 'smallPartsWarnings',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'To determine if any choking warnings are applicable, check current product packaging for choking warning message(s). Please indicate the warning number (0-6). 0 - No warning applicable; 1 - Choking hazard is a small ball; 2 - Choking hazard contains small ball; 3 - Choking hazard contains small parts; 4 - Choking hazard balloon; 5 - Choking hazard is a marble; 6 - Choking hazard contains a marble.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Small Parts Warning Code',
      'group' => 'Compliance',
      'rank' => '44000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'smallPartsWarning',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'dataType' => 'integer',
          'optionValues' => 
          array (
            0 => '0',
            1 => '1',
            2 => '2',
            3 => '3',
            4 => '4',
            5 => '5',
            6 => '6',
          ),
        ),
      ),
    ),
    'isAdultProduct' => 
    array (
      'name' => 'isAdultProduct',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates if item is adult in nature and should not appear in results for children\'s products.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Adult Product',
      'group' => 'Additional Category Attributes',
      'rank' => '51000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'edition' => 
    array (
      'name' => 'edition',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The specific edition of the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Edition',
      'group' => 'Additional Category Attributes',
      'rank' => '52000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'numberOfDiscs' => 
    array (
      'name' => 'numberOfDiscs',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of discs included in the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Discs',
      'group' => 'Additional Category Attributes',
      'rank' => '53000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'originalLanguages' => 
    array (
      'name' => 'originalLanguages',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The original language of the work. Usually this will be one language, but occasionally more than one is appropriate. For example, if a movie is dubbed in English but the original language is Chinese, enter "Chinese."',
      'requiredLevel' => 'Optional',
      'displayName' => 'Original Languages',
      'group' => 'Additional Category Attributes',
      'rank' => '54000',
    ),
    'numberOfPages' => 
    array (
      'name' => 'numberOfPages',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of pages within a work. May refer to numbered pages, for a pre-printed book,  or blank pages, as in a notebook or journal. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Pages',
      'group' => 'Additional Category Attributes',
      'rank' => '55000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'isUnabridged' => 
    array (
      'name' => 'isUnabridged',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that the item is the complete original work with no omissions.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Unabridged',
      'group' => 'Additional Category Attributes',
      'rank' => '56000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isLargePrint' => 
    array (
      'name' => 'isLargePrint',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that the item has been especially printed in a large font to accommodate those with special eyesight needs. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Large Print',
      'group' => 'Additional Category Attributes',
      'rank' => '57000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'readingLevel' => 
    array (
      'name' => 'readingLevel',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The intended age or grade-level for a published work.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Reading Level',
      'group' => 'Additional Category Attributes',
      'rank' => '58000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'editor' => 
    array (
      'name' => 'editor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The person or entity responsible for choosing the collection of stories or articles in a book or magazine, as printed on the title page, or a magazine masthead',
      'requiredLevel' => 'Optional',
      'displayName' => 'Editor',
      'group' => 'Additional Category Attributes',
      'rank' => '59000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'translator' => 
    array (
      'name' => 'translator',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The person credited with translating the book from the original language into the language of the current edition.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Translator',
      'group' => 'Additional Category Attributes',
      'rank' => '60000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'translatedFrom' => 
    array (
      'name' => 'translatedFrom',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The original language that a work was translated from.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Translated From',
      'group' => 'Additional Category Attributes',
      'rank' => '61000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'illustrator' => 
    array (
      'name' => 'illustrator',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The person credited with drawing illustrations within a printed work',
      'requiredLevel' => 'Optional',
      'displayName' => 'Illustrator',
      'group' => 'Additional Category Attributes',
      'rank' => '62000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'bisacSubjectCodes' => 
    array (
      'name' => 'bisacSubjectCodes',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A standardized code from the Book Industry Study Group used to assign a genre and classify a book based on its topical content.',
      'requiredLevel' => 'Optional',
      'displayName' => 'BISAC Subject Code',
      'group' => 'Additional Category Attributes',
      'rank' => '62500',
    ),
    'sportsLeague' => 
    array (
      'name' => 'sportsLeague',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If your item has any association with a specific sports league, enter the league name. Abbreviations are fine. NOTE: This attribute flags an item for inclusion in the online fan shop.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Sports League',
      'group' => 'Additional Category Attributes',
      'rank' => '63000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'sportsTeam' => 
    array (
      'name' => 'sportsTeam',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If your item has any association with a specific sports team, enter the team name. NOTE: This attribute flags an item for inclusion in the online fan shop.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Sports Team',
      'group' => 'Additional Category Attributes',
      'rank' => '64000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'athlete' => 
    array (
      'name' => 'athlete',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A well-known athlete associated with a product, if applicable. This is used to group items in Fan Shop, not to describe a line of clothing.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Athlete',
      'group' => 'Nice to Have',
      'rank' => '65000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'autographedBy' => 
    array (
      'name' => 'autographedBy',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The full name of the person who has autographed this copy.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Autographed by',
      'group' => 'Nice to Have',
      'rank' => '66000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'features' => 
    array (
      'name' => 'features',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'List notable features of the item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Additional Features',
      'group' => 'Nice to Have',
      'rank' => '71000',
    ),
    'keywords' => 
    array (
      'name' => 'keywords',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Words that people would use to search for this item. Keywords can include synonyms and related terms.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Keywords',
      'group' => 'Nice to Have',
      'rank' => '72000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'swatchImages' => 
    array (
      'name' => 'swatchImages',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'swatchImage',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'child' => 
          array (
            0 => 
            array (
              'name' => 'swatchVariantAttribute',
              'maxOccurs' => '1',
              'minOccurs' => '1',
              'documentation' => 'Conditionally Required',
              'conditionalAttributes' => 
              array (
                0 => 
                array (
                  'name' => 'swatchImageUrl',
                  'value' => 'ANY',
                ),
              ),
              'displayName' => 'Swatch Variant Attribute',
              'group' => 'Item Variants',
              'dataType' => 'string',
              'optionValues' => 
              array (
                0 => 'bookFormat',
                1 => 'physicalMediaFormat',
                2 => 'edition',
                3 => 'sportsTeam',
                4 => 'countPerPack',
                5 => 'count',
              ),
            ),
            1 => 
            array (
              'name' => 'swatchImageUrl',
              'maxOccurs' => '1',
              'minOccurs' => '1',
              'documentation' => 'Conditionally Required',
              'conditionalAttributes' => 
              array (
                0 => 
                array (
                  'name' => 'swatchVariantAttribute',
                  'value' => 'ANY',
                ),
              ),
              'displayName' => 'Swatch Image URL',
              'group' => 'Item Variants',
              'dataType' => 'anyURI',
            ),
          ),
        ),
      ),
    ),
  ),
);