<?php return $arr = array (
  'MusicCasesAndBags' => 
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
    'brand' => 
    array (
      'name' => 'brand',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Name, term, design or other feature that distinguishes one seller\'s product from those of others. This can be the name of the company associated with the product, but not always. If item does not have a brand, use "Unbranded".',
      'requiredLevel' => 'Required',
      'displayName' => 'Brand',
      'group' => 'Basic',
      'rank' => '11000',
      'dataType' => 'string',
      'maxLength' => '60',
      'minLength' => '1',
    ),
    'manufacturer' => 
    array (
      'name' => 'manufacturer',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Manufacturer is the maker of the product. This is the name of the company that produces the product, not necessarily the brand name of the item. For some products, the manufacturer and the brand may be the same.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Manufacturer',
      'group' => 'Basic',
      'rank' => '12000',
      'dataType' => 'string',
      'maxLength' => '60',
      'minLength' => '1',
    ),
    'manufacturerPartNumber' => 
    array (
      'name' => 'manufacturerPartNumber',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'MPN uniquely identifies the product to its manufacturer. For many products this will be identical to the model number. Some manufacturers distinguish part number from model number. Having this information allows customers to search for items on the site and informs product matching.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Manufacturer Part Number',
      'group' => 'Basic',
      'rank' => '13000',
      'dataType' => 'string',
      'maxLength' => '60',
      'minLength' => '1',
    ),
    'modelNumber' => 
    array (
      'name' => 'modelNumber',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Model numbers allow manufacturers to keep track of each hardware device and identify or replace the proper part when needed. Model numbers are often found on the bottom, back, or side of a product. Having this information allows customers to search for items on the site and informs product matching.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Model Number',
      'group' => 'Basic',
      'rank' => '14000',
      'dataType' => 'string',
      'maxLength' => '60',
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
      'rank' => '15000',
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
      'rank' => '15500',
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
      'rank' => '15550',
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
      'rank' => '16000',
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
      'rank' => '17000',
    ),
    'instrument' => 
    array (
      'name' => 'instrument',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The name(s) of the musical instrument(s) or equipment this accessory is intended for/compatible with.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Instrument',
      'group' => 'Discoverability',
      'rank' => '19000',
    ),
    'color' => 
    array (
      'name' => 'color',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Color as described by the manufacturer.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Color',
      'group' => 'Discoverability',
      'rank' => '20000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'colorCategory' => 
    array (
      'name' => 'colorCategory',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Select the color from a short list that best describes the general color of the item. This improves searchability as it allows customers to view items by color from the left navigation when they perform a search.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Color Category',
      'group' => 'Discoverability',
      'rank' => '21000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'colorCategoryValue',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'Beige',
            1 => 'Black',
            2 => 'Blue',
            3 => 'Bronze',
            4 => 'Brown',
            5 => 'Clear',
            6 => 'Gold',
            7 => 'Gray',
            8 => 'Green',
            9 => 'Multi-color',
            10 => 'Off-White',
            11 => 'Orange',
            12 => 'Pink',
            13 => 'Purple',
            14 => 'Red',
            15 => 'Silver',
            16 => 'White',
            17 => 'Yellow',
          ),
        ),
      ),
    ),
    'size' => 
    array (
      'name' => 'size',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Overall dimensions of an item. Used only for products that do not already have a more specific \'x size\' attribute, such as ring size or clothing size. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Size',
      'group' => 'Discoverability',
      'rank' => '23000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Assembled Product Length',
      'group' => 'Dimensions',
      'rank' => '25000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Assembled Product Width',
      'group' => 'Dimensions',
      'rank' => '26000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Assembled Product Height',
      'group' => 'Dimensions',
      'rank' => '27000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Assembled Product Weight',
      'group' => 'Dimensions',
      'rank' => '28000',
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
      'rank' => '30000',
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
      'rank' => '31000',
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
            0 => 'color',
            1 => 'pattern',
            2 => 'material',
            3 => 'finish',
            4 => 'audioPowerOutput',
            5 => 'shape',
            6 => 'sportsTeam',
            7 => 'countPerPack',
            8 => 'count',
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
      'rank' => '32000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'hasWarranty' => 
    array (
      'name' => 'hasWarranty',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item comes with a warranty. If an item has a warranty, then enter EITHER the warranty URL or the warranty text in the appropriate field.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Warranty',
      'group' => 'Compliance',
      'rank' => '37000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'warrantyURL' => 
    array (
      'name' => 'warrantyURL',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If you indicated that your item has a warranty, provide either the Warranty URL or Warranty Text. The Warranty URL is the web location of the image, PDF, or link to the manufacturer\'s warranty page, showing the warranty and its terms, including the duration of the warranty. URLs must begin with http:// or https:// NOTE: Please remember to update the link and/or text of the warranty as the warranty changes. If supplying an image, provide the final destination image URL (no-redirects) that is publicly accessible (no username/password required) and ends in a proper image extension. Recommended file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Maximum file size: 2 GB. If the Ingredients have been included in another image, you may repeat the URL here. ',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'warrantyText',
          'value' => 'null',
        ),
        1 => 
        array (
          'name' => 'hasWarranty',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Warranty URL',
      'group' => 'Compliance',
      'rank' => '38000',
      'dataType' => 'anyURI',
    ),
    'warrantyText' => 
    array (
      'name' => 'warrantyText',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If you marked Y for "Has Warranty" provide the Warranty URL or Warranty Text (the full text of the warranty terms, including what is covered by the warranty and the duration of the warranty). NOTE: please remember to update the text of your warranty as your warranty changes.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'warrantyURL',
          'value' => 'null',
        ),
        1 => 
        array (
          'name' => 'hasWarranty',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Warranty Text',
      'group' => 'Compliance',
      'rank' => '39000',
      'dataType' => 'string',
      'maxLength' => '1000',
      'minLength' => '1',
    ),
    'fabricContent' => 
    array (
      'name' => 'fabricContent',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Material makeup of the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Fabric Content',
      'group' => 'Additional Category Attributes',
      'rank' => '46000',
    ),
    'fabricCareInstructions' => 
    array (
      'name' => 'fabricCareInstructions',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes how the fabric should be cleaned. Enter details of the fabric care label found on the item. (For garments, typically located inside on the top of the back or the lower left side.)',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Fabric Care Instructions',
      'group' => 'Additional Category Attributes',
      'rank' => '49000',
    ),
    'shape' => 
    array (
      'name' => 'shape',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Physical shape of the item. Used in a wide variety of products including rugs, toys and large appliances.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Shape',
      'group' => 'Additional Category Attributes',
      'rank' => '50000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'hardOrSoftCase' => 
    array (
      'name' => 'hardOrSoftCase',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates whether a case is a hard or soft.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Hard or Soft Case',
      'group' => 'Additional Category Attributes',
      'rank' => '51000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Hard',
        1 => 'Soft',
      ),
    ),
    'isWheeled' => 
    array (
      'name' => 'isWheeled',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that an item has wheels and can be rolled.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Wheeled',
      'group' => 'Additional Category Attributes',
      'rank' => '52000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'material' => 
    array (
      'name' => 'material',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The main material(s) that a product is made of. This does not need to be an exhaustive list, but should contain the predominant or functionally important material/materials. Fabric material specifics should be entered using the "Fabric Content" attribute.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Material',
      'group' => 'Additional Category Attributes',
      'rank' => '53000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isPortable' => 
    array (
      'name' => 'isPortable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Is the item designed to be easily moved?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Portable',
      'group' => 'Additional Category Attributes',
      'rank' => '54000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'recommendedUses' => 
    array (
      'name' => 'recommendedUses',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Further clarification of what the item may be used for. This improves searchability when customers search for general terms like "birthday party" that do not include the names of specific items.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Recommended Use',
      'group' => 'Additional Category Attributes',
      'rank' => '55000',
    ),
    'recommendedLocations' => 
    array (
      'name' => 'recommendedLocations',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The primary location recommended for the item\'s use.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Recommended Locations',
      'group' => 'Additional Category Attributes',
      'rank' => '56000',
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
                0 => 'color',
                1 => 'pattern',
                2 => 'material',
                3 => 'finish',
                4 => 'audioPowerOutput',
                5 => 'shape',
                6 => 'sportsTeam',
                7 => 'countPerPack',
                8 => 'count',
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
  'SoundAndRecording' => 
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
    'brand' => 
    array (
      'name' => 'brand',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Name, term, design or other feature that distinguishes one seller\'s product from those of others. This can be the name of the company associated with the product, but not always. If item does not have a brand, use "Unbranded".',
      'requiredLevel' => 'Required',
      'displayName' => 'Brand',
      'group' => 'Basic',
      'rank' => '11000',
      'dataType' => 'string',
      'maxLength' => '60',
      'minLength' => '1',
    ),
    'manufacturer' => 
    array (
      'name' => 'manufacturer',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Manufacturer is the maker of the product. This is the name of the company that produces the product, not necessarily the brand name of the item. For some products, the manufacturer and the brand may be the same.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Manufacturer',
      'group' => 'Basic',
      'rank' => '12000',
      'dataType' => 'string',
      'maxLength' => '60',
      'minLength' => '1',
    ),
    'manufacturerPartNumber' => 
    array (
      'name' => 'manufacturerPartNumber',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'MPN uniquely identifies the product to its manufacturer. For many products this will be identical to the model number. Some manufacturers distinguish part number from model number. Having this information allows customers to search for items on the site and informs product matching.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Manufacturer Part Number',
      'group' => 'Basic',
      'rank' => '13000',
      'dataType' => 'string',
      'maxLength' => '60',
      'minLength' => '1',
    ),
    'modelNumber' => 
    array (
      'name' => 'modelNumber',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Model numbers allow manufacturers to keep track of each hardware device and identify or replace the proper part when needed. Model numbers are often found on the bottom, back, or side of a product. Having this information allows customers to search for items on the site and informs product matching.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Model Number',
      'group' => 'Basic',
      'rank' => '14000',
      'dataType' => 'string',
      'maxLength' => '60',
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
      'rank' => '15000',
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
      'rank' => '15500',
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
      'rank' => '15512',
      'dataType' => 'string',
      'maxLength' => '7',
      'minLength' => '1',
    ),
    'pieceCount' => 
    array (
      'name' => 'pieceCount',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of small pieces, slices, or different items within the product. Piece Count applies to things such as puzzles, building block sets, and products that contain multiple different items (such as tool sets, dinnerware sets, gift baskets, art sets, makeup kits, or shaving kits). EXAMPLE: (1) A 500-piece puzzle has a "Piece Count" of 500. (2) A 105-Piece Socket Wrench set has a piece count of "105." (3) A gift basket of 5 different items has a "Piece Count" of 5.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Pieces',
      'group' => 'Basic',
      'rank' => '15525',
      'dataType' => 'integer',
      'totalDigits' => '20',
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
      'rank' => '16000',
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
      'rank' => '17000',
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
      'rank' => '19000',
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
      'rank' => '20000',
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
      'rank' => '21000',
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
      'rank' => '22000',
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
      'rank' => '24000',
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
      'rank' => '25000',
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
            0 => 'color',
            1 => 'pattern',
            2 => 'material',
            3 => 'finish',
            4 => 'audioPowerOutput',
            5 => 'shape',
            6 => 'sportsTeam',
            7 => 'countPerPack',
            8 => 'count',
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
      'rank' => '26000',
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
      'rank' => '30000',
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
    'batteryTechnologyType' => 
    array (
      'name' => 'batteryTechnologyType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Please select the Battery Technology Type from the list provided. NOTE: If battery type is lead acid, lead acid (nonspillable), lithium ion, or lithium metal, please ensure that you have obtained a hazardous materials risk assessment through WERCS  before setting up your item. ',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'hasBatteries',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Contained Battery Type',
      'group' => 'Compliance',
      'rank' => '32000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Does Not Contain a Battery',
        1 => 'Alkaline',
        2 => 'Carbon Zinc',
        3 => 'Lead Acid',
        4 => 'Lead Acid (Nonspillable)',
        5 => 'Lithium Primary (Lithium Metal)',
        6 => 'Lithium Ion',
        7 => 'Magnesium',
        8 => 'Mercury',
        9 => 'Nickel Cadmium',
        10 => 'Nickel Metal Hydride',
        11 => 'Silver',
        12 => 'Thermal',
        13 => 'Other',
        14 => 'Multiple Types',
      ),
    ),
    'hasWarranty' => 
    array (
      'name' => 'hasWarranty',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item comes with a warranty. If an item has a warranty, then enter EITHER the warranty URL or the warranty text in the appropriate field.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Warranty',
      'group' => 'Compliance',
      'rank' => '33000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'warrantyURL' => 
    array (
      'name' => 'warrantyURL',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If you indicated that your item has a warranty, provide either the Warranty URL or Warranty Text. The Warranty URL is the web location of the image, PDF, or link to the manufacturer\'s warranty page, showing the warranty and its terms, including the duration of the warranty. URLs must begin with http:// or https:// NOTE: Please remember to update the link and/or text of the warranty as the warranty changes. If supplying an image, provide the final destination image URL (no-redirects) that is publicly accessible (no username/password required) and ends in a proper image extension. Recommended file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Maximum file size: 2 GB. If the Ingredients have been included in another image, you may repeat the URL here. ',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'warrantyText',
          'value' => 'null',
        ),
        1 => 
        array (
          'name' => 'hasWarranty',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Warranty URL',
      'group' => 'Compliance',
      'rank' => '34000',
      'dataType' => 'anyURI',
    ),
    'warrantyText' => 
    array (
      'name' => 'warrantyText',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If you marked Y for "Has Warranty" provide the Warranty URL or Warranty Text (the full text of the warranty terms, including what is covered by the warranty and the duration of the warranty). NOTE: please remember to update the text of your warranty as your warranty changes.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'warrantyURL',
          'value' => 'null',
        ),
        1 => 
        array (
          'name' => 'hasWarranty',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Warranty Text',
      'group' => 'Compliance',
      'rank' => '35000',
      'dataType' => 'string',
      'maxLength' => '1000',
      'minLength' => '1',
    ),
    'inputsAndOutputs' => 
    array (
      'name' => 'inputsAndOutputs',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Enter the type and quantity of each input and/or output connection provided on the product.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Inputs & Outputs',
      'group' => 'Additional Category Attributes',
      'rank' => '42000',
    ),
    'audioPowerOutput' => 
    array (
      'name' => 'audioPowerOutput',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The audio output power of the amplifier or self-powered device\'s speakers, expressed in watts. A self-powered item has an internal amplifier; it does not need to be plugged into a power amplifier to produce sound.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Audio Power Output',
      'group' => 'Additional Category Attributes',
      'rank' => '43000',
    ),
    'equalizerControl' => 
    array (
      'name' => 'equalizerControl',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Audio equalization features.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Equalizer Control',
      'group' => 'Additional Category Attributes',
      'rank' => '44000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'hasIntegratedSpeakers' => 
    array (
      'name' => 'hasIntegratedSpeakers',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Does the item include speakers integrated into the body of the main item?',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Has Integrated Speakers',
      'group' => 'Additional Category Attributes',
      'rank' => '46000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'wirelessTechnologies' => 
    array (
      'name' => 'wirelessTechnologies',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Any wireless communications standard used within or by the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Wireless Technologies',
      'group' => 'Additional Category Attributes',
      'rank' => '47000',
    ),
    'hasBluetooth' => 
    array (
      'name' => 'hasBluetooth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Does the item provide wireless communication compatibility with the Bluetooth standard?',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Has Bluetooth',
      'group' => 'Additional Category Attributes',
      'rank' => '48000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isRemoteControlIncluded' => 
    array (
      'name' => 'isRemoteControlIncluded',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Is a remote control included with the item?',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Remote Control Included',
      'group' => 'Additional Category Attributes',
      'rank' => '50000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isPowered' => 
    array (
      'name' => 'isPowered',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that an item uses electricity, requiring a power cord or batteries to operate. Useful for items that have non-powered equivalents (e.g. toothbrushes).',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Powered',
      'group' => 'Additional Category Attributes',
      'rank' => '51000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'powerType' => 
    array (
      'name' => 'powerType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Provides information on the exact type of power used by the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Power Type',
      'group' => 'Additional Category Attributes',
      'rank' => '52000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'batteryLife' => 
    array (
      'name' => 'batteryLife',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Life of the device\'s battery under ideal conditions (maximum run time).',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Battery Life',
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
            0 => 'h',
          ),
        ),
      ),
    ),
    'material' => 
    array (
      'name' => 'material',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The main material(s) that a product is made of. This does not need to be an exhaustive list, but should contain the predominant or functionally important material/materials. Fabric material specifics should be entered using the "Fabric Content" attribute.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Material',
      'group' => 'Additional Category Attributes',
      'rank' => '54000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'color' => 
    array (
      'name' => 'color',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Color as described by the manufacturer.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Color',
      'group' => 'Additional Category Attributes',
      'rank' => '55000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'colorCategory' => 
    array (
      'name' => 'colorCategory',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Select the color from a short list that best describes the general color of the item. This improves searchability as it allows customers to view items by color from the left navigation when they perform a search.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Color Category',
      'group' => 'Additional Category Attributes',
      'rank' => '56000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'colorCategoryValue',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'Beige',
            1 => 'Black',
            2 => 'Blue',
            3 => 'Bronze',
            4 => 'Brown',
            5 => 'Clear',
            6 => 'Gold',
            7 => 'Gray',
            8 => 'Green',
            9 => 'Multi-color',
            10 => 'Off-White',
            11 => 'Orange',
            12 => 'Pink',
            13 => 'Purple',
            14 => 'Red',
            15 => 'Silver',
            16 => 'White',
            17 => 'Yellow',
          ),
        ),
      ),
    ),
    'isPortable' => 
    array (
      'name' => 'isPortable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Is the item designed to be easily moved?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Portable',
      'group' => 'Additional Category Attributes',
      'rank' => '57000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'recommendedUses' => 
    array (
      'name' => 'recommendedUses',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Further clarification of what the item may be used for. This improves searchability when customers search for general terms like "birthday party" that do not include the names of specific items.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Recommended Use',
      'group' => 'Additional Category Attributes',
      'rank' => '58000',
    ),
    'recommendedLocations' => 
    array (
      'name' => 'recommendedLocations',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The primary location recommended for the item\'s use.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Recommended Locations',
      'group' => 'Additional Category Attributes',
      'rank' => '59000',
    ),
    'batteriesRequired' => 
    array (
      'name' => 'batteriesRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Are batteries required to use this item?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Batteries Required',
      'group' => 'Additional Category Attributes',
      'rank' => '60000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
      'rank' => '66000',
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
      'rank' => '67000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'microphoneTechnology' => 
    array (
      'name' => 'microphoneTechnology',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Term describing the method the microphone’s design converts sound waves into electrical signals. Important to consumers because different microphone technologies are suited to different applications',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Microphone Technology',
      'group' => 'Additional Category Attributes',
      'rank' => '69000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'impedance' => 
    array (
      'name' => 'impedance',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement in Ohms, of the electrical resistance a circuit presents to a current when a voltage is applied. Important characteristic for products such as transmitters, speakers, microphones, and headphones because it restricts ("impedes") the flow of power from the receiver or amplifier.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Impedance',
      'group' => 'Additional Category Attributes',
      'rank' => '70000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'string',
        ),
        1 => 
        array (
          'name' => 'unit',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'olms',
            1 => 'kolms',
          ),
        ),
      ),
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
                0 => 'color',
                1 => 'pattern',
                2 => 'material',
                3 => 'finish',
                4 => 'audioPowerOutput',
                5 => 'shape',
                6 => 'sportsTeam',
                7 => 'countPerPack',
                8 => 'count',
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
  'MusicalInstruments' => 
  array (
    'compositeWoodCertificationCode' => 
    array (
      'name' => 'compositeWoodCertificationCode',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Composite Wood - Indicates if any portion of the item contains any of the following types of composite wood: hardwood plywood veneer core, hardwood plywood composite core, particleboard, or medium density fiber board (MDF). Enter the code corresponding to the highest formaldehyde emission level on any portion of the item. Code Definitions: 1 - Does not contain composite wood; 7 - Product is not CARB compliant and cannot be sold in California; 8 - Product is CARB compliant and can be sold in California.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Composite Wood Certification Code',
      'group' => 'Compliance',
      'rank' => 'None',
      'dataType' => 'integer',
      'optionValues' => 
      array (
        0 => '1',
        1 => '7',
        2 => '8',
      ),
      'totalDigits' => '1',
    ),
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
    'brand' => 
    array (
      'name' => 'brand',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Name, term, design or other feature that distinguishes one seller\'s product from those of others. This can be the name of the company associated with the product, but not always. If item does not have a brand, use "Unbranded".',
      'requiredLevel' => 'Required',
      'displayName' => 'Brand',
      'group' => 'Basic',
      'rank' => '11000',
      'dataType' => 'string',
      'maxLength' => '60',
      'minLength' => '1',
    ),
    'manufacturer' => 
    array (
      'name' => 'manufacturer',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Manufacturer is the maker of the product. This is the name of the company that produces the product, not necessarily the brand name of the item. For some products, the manufacturer and the brand may be the same.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Manufacturer',
      'group' => 'Basic',
      'rank' => '12000',
      'dataType' => 'string',
      'maxLength' => '60',
      'minLength' => '1',
    ),
    'manufacturerPartNumber' => 
    array (
      'name' => 'manufacturerPartNumber',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'MPN uniquely identifies the product to its manufacturer. For many products this will be identical to the model number. Some manufacturers distinguish part number from model number. Having this information allows customers to search for items on the site and informs product matching.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Manufacturer Part Number',
      'group' => 'Basic',
      'rank' => '13000',
      'dataType' => 'string',
      'maxLength' => '60',
      'minLength' => '1',
    ),
    'modelNumber' => 
    array (
      'name' => 'modelNumber',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Model numbers allow manufacturers to keep track of each hardware device and identify or replace the proper part when needed. Model numbers are often found on the bottom, back, or side of a product. Having this information allows customers to search for items on the site and informs product matching.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Model Number',
      'group' => 'Basic',
      'rank' => '14000',
      'dataType' => 'string',
      'maxLength' => '60',
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
      'rank' => '15000',
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
      'rank' => '15500',
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
      'rank' => '15550',
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
      'rank' => '16000',
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
      'rank' => '17000',
    ),
    'instrument' => 
    array (
      'name' => 'instrument',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The name(s) of the musical instrument(s) or equipment this accessory is intended for/compatible with.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Instrument',
      'group' => 'Discoverability',
      'rank' => '19000',
    ),
    'musicalInstrumentFamily' => 
    array (
      'name' => 'musicalInstrumentFamily',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The musical instrument family.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Musical Instrument Family',
      'group' => 'Discoverability',
      'rank' => '20000',
      'dataType' => 'string',
      'maxLength' => '400',
      'minLength' => '1',
    ),
    'color' => 
    array (
      'name' => 'color',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Color as described by the manufacturer.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Color',
      'group' => 'Discoverability',
      'rank' => '21000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'colorCategory' => 
    array (
      'name' => 'colorCategory',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Select the color from a short list that best describes the general color of the item. This improves searchability as it allows customers to view items by color from the left navigation when they perform a search.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Color Category',
      'group' => 'Discoverability',
      'rank' => '22000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'colorCategoryValue',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'Beige',
            1 => 'Black',
            2 => 'Blue',
            3 => 'Bronze',
            4 => 'Brown',
            5 => 'Clear',
            6 => 'Gold',
            7 => 'Gray',
            8 => 'Green',
            9 => 'Multi-color',
            10 => 'Off-White',
            11 => 'Orange',
            12 => 'Pink',
            13 => 'Purple',
            14 => 'Red',
            15 => 'Silver',
            16 => 'White',
            17 => 'Yellow',
          ),
        ),
      ),
    ),
    'isAcoustic' => 
    array (
      'name' => 'isAcoustic',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Is this an acoustic instrument?',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Acoustic',
      'group' => 'Discoverability',
      'rank' => '23000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isElectric' => 
    array (
      'name' => 'isElectric',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Is this an electric instrument?',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Electric',
      'group' => 'Discoverability',
      'rank' => '24000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
      'rank' => '26000',
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
      'rank' => '27000',
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
      'rank' => '28000',
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
      'rank' => '29000',
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
            0 => 'color',
            1 => 'pattern',
            2 => 'material',
            3 => 'finish',
            4 => 'audioPowerOutput',
            5 => 'shape',
            6 => 'sportsTeam',
            7 => 'countPerPack',
            8 => 'count',
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
    'smallPartsWarnings' => 
    array (
      'name' => 'smallPartsWarnings',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'To determine if any choking warnings are applicable, check current product packaging for choking warning message(s). Please indicate the warning number (0-6). 0 - No warning applicable; 1 - Choking hazard is a small ball; 2 - Choking hazard contains small ball; 3 - Choking hazard contains small parts; 4 - Choking hazard balloon; 5 - Choking hazard is a marble; 6 - Choking hazard contains a marble.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Small Parts Warning Code',
      'group' => 'Compliance',
      'rank' => '37000',
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
    'batteryTechnologyType' => 
    array (
      'name' => 'batteryTechnologyType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Please select the Battery Technology Type from the list provided. NOTE: If battery type is lead acid, lead acid (nonspillable), lithium ion, or lithium metal, please ensure that you have obtained a hazardous materials risk assessment through WERCS  before setting up your item. ',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'hasBatteries',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Contained Battery Type',
      'group' => 'Compliance',
      'rank' => '39000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Does Not Contain a Battery',
        1 => 'Alkaline',
        2 => 'Carbon Zinc',
        3 => 'Lead Acid',
        4 => 'Lead Acid (Nonspillable)',
        5 => 'Lithium Primary (Lithium Metal)',
        6 => 'Lithium Ion',
        7 => 'Magnesium',
        8 => 'Mercury',
        9 => 'Nickel Cadmium',
        10 => 'Nickel Metal Hydride',
        11 => 'Silver',
        12 => 'Thermal',
        13 => 'Other',
        14 => 'Multiple Types',
      ),
    ),
    'hasWarranty' => 
    array (
      'name' => 'hasWarranty',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item comes with a warranty. If an item has a warranty, then enter EITHER the warranty URL or the warranty text in the appropriate field.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Warranty',
      'group' => 'Compliance',
      'rank' => '40000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'warrantyURL' => 
    array (
      'name' => 'warrantyURL',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If you indicated that your item has a warranty, provide either the Warranty URL or Warranty Text. The Warranty URL is the web location of the image, PDF, or link to the manufacturer\'s warranty page, showing the warranty and its terms, including the duration of the warranty. URLs must begin with http:// or https:// NOTE: Please remember to update the link and/or text of the warranty as the warranty changes. If supplying an image, provide the final destination image URL (no-redirects) that is publicly accessible (no username/password required) and ends in a proper image extension. Recommended file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Maximum file size: 2 GB. If the Ingredients have been included in another image, you may repeat the URL here. ',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'warrantyText',
          'value' => 'null',
        ),
        1 => 
        array (
          'name' => 'hasWarranty',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Warranty URL',
      'group' => 'Compliance',
      'rank' => '41000',
      'dataType' => 'anyURI',
    ),
    'warrantyText' => 
    array (
      'name' => 'warrantyText',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If you marked Y for "Has Warranty" provide the Warranty URL or Warranty Text (the full text of the warranty terms, including what is covered by the warranty and the duration of the warranty). NOTE: please remember to update the text of your warranty as your warranty changes.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'warrantyURL',
          'value' => 'null',
        ),
        1 => 
        array (
          'name' => 'hasWarranty',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Warranty Text',
      'group' => 'Compliance',
      'rank' => '42000',
      'dataType' => 'string',
      'maxLength' => '1000',
      'minLength' => '1',
    ),
    'batteriesRequired' => 
    array (
      'name' => 'batteriesRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Are batteries required to use this item?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Batteries Required',
      'group' => 'Additional Category Attributes',
      'rank' => '49000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'audioPowerOutput' => 
    array (
      'name' => 'audioPowerOutput',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The audio output power of the amplifier or self-powered device\'s speakers, expressed in watts. A self-powered item has an internal amplifier; it does not need to be plugged into a power amplifier to produce sound.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Audio Power Output',
      'group' => 'Additional Category Attributes',
      'rank' => '51000',
    ),
    'isPowered' => 
    array (
      'name' => 'isPowered',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that an item uses electricity, requiring a power cord or batteries to operate. Useful for items that have non-powered equivalents (e.g. toothbrushes).',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Powered',
      'group' => 'Additional Category Attributes',
      'rank' => '51500',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'powerType' => 
    array (
      'name' => 'powerType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Provides information on the exact type of power used by the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Power Type',
      'group' => 'Additional Category Attributes',
      'rank' => '52000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'material' => 
    array (
      'name' => 'material',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The main material(s) that a product is made of. This does not need to be an exhaustive list, but should contain the predominant or functionally important material/materials. Fabric material specifics should be entered using the "Fabric Content" attribute.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Material',
      'group' => 'Additional Category Attributes',
      'rank' => '53000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isPortable' => 
    array (
      'name' => 'isPortable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Is the item designed to be easily moved?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Portable',
      'group' => 'Additional Category Attributes',
      'rank' => '54000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'recommendedUses' => 
    array (
      'name' => 'recommendedUses',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Further clarification of what the item may be used for. This improves searchability when customers search for general terms like "birthday party" that do not include the names of specific items.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Recommended Use',
      'group' => 'Additional Category Attributes',
      'rank' => '55000',
    ),
    'recommendedLocations' => 
    array (
      'name' => 'recommendedLocations',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The primary location recommended for the item\'s use.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Recommended Locations',
      'group' => 'Additional Category Attributes',
      'rank' => '56000',
    ),
    'inputsAndOutputs' => 
    array (
      'name' => 'inputsAndOutputs',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Enter the type and quantity of each input and/or output connection provided on the product.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Inputs & Outputs',
      'group' => 'Additional Category Attributes',
      'rank' => '57000',
    ),
    'displayTechnology' => 
    array (
      'name' => 'displayTechnology',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The primary technology used for the item\'s display.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Display Technology',
      'group' => 'Additional Category Attributes',
      'rank' => '58000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'hasBluetooth' => 
    array (
      'name' => 'hasBluetooth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Does the item provide wireless communication compatibility with the Bluetooth standard?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Bluetooth',
      'group' => 'Additional Category Attributes',
      'rank' => '61000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'hasIntegratedSpeakers' => 
    array (
      'name' => 'hasIntegratedSpeakers',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Does the item include speakers integrated into the body of the main item?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Integrated Speakers',
      'group' => 'Additional Category Attributes',
      'rank' => '62000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'batteryLife' => 
    array (
      'name' => 'batteryLife',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Life of the device\'s battery under ideal conditions (maximum run time).',
      'requiredLevel' => 'Optional',
      'displayName' => 'Battery Life',
      'group' => 'Additional Category Attributes',
      'rank' => '63000',
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
            0 => 'h',
          ),
        ),
      ),
    ),
    'isFretted' => 
    array (
      'name' => 'isFretted',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Does this instrument have frets?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Fretted',
      'group' => 'Additional Category Attributes',
      'rank' => '64000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isCollectible' => 
    array (
      'name' => 'isCollectible',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates if the item is regarded as being of value or interest to a collector.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Collectible',
      'group' => 'Additional Category Attributes',
      'rank' => '65000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'ageGroup' => 
    array (
      'name' => 'ageGroup',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'General grouping of ages into commonly used demographic labels.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Age Group',
      'group' => 'Additional Category Attributes',
      'rank' => '67000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'ageGroupValue',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'Infant',
            1 => 'Toddler',
            2 => 'Child',
            3 => 'Teen',
            4 => 'Adult',
          ),
        ),
      ),
    ),
    'shape' => 
    array (
      'name' => 'shape',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Physical shape of the item. Used in a wide variety of products including rugs, toys and large appliances.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Shape',
      'group' => 'Additional Category Attributes',
      'rank' => '68000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'finish' => 
    array (
      'name' => 'finish',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Terms describing the overall external treatment applied to the item. Typically finishes give a distinct appearance, texture or additional performance to the item. This attribute is used in a wide variety products and materials including wood, metal and fabric.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Finish',
      'group' => 'Additional Category Attributes',
      'rank' => '69000',
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
      'rank' => '76000',
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
      'rank' => '77000',
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
                0 => 'color',
                1 => 'pattern',
                2 => 'material',
                3 => 'finish',
                4 => 'audioPowerOutput',
                5 => 'shape',
                6 => 'sportsTeam',
                7 => 'countPerPack',
                8 => 'count',
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
  'InstrumentAccessories' => 
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
    'brand' => 
    array (
      'name' => 'brand',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Name, term, design or other feature that distinguishes one seller\'s product from those of others. This can be the name of the company associated with the product, but not always. If item does not have a brand, use "Unbranded".',
      'requiredLevel' => 'Required',
      'displayName' => 'Brand',
      'group' => 'Basic',
      'rank' => '11000',
      'dataType' => 'string',
      'maxLength' => '60',
      'minLength' => '1',
    ),
    'manufacturer' => 
    array (
      'name' => 'manufacturer',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Manufacturer is the maker of the product. This is the name of the company that produces the product, not necessarily the brand name of the item. For some products, the manufacturer and the brand may be the same.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Manufacturer',
      'group' => 'Basic',
      'rank' => '12000',
      'dataType' => 'string',
      'maxLength' => '60',
      'minLength' => '1',
    ),
    'manufacturerPartNumber' => 
    array (
      'name' => 'manufacturerPartNumber',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'MPN uniquely identifies the product to its manufacturer. For many products this will be identical to the model number. Some manufacturers distinguish part number from model number. Having this information allows customers to search for items on the site and informs product matching.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Manufacturer Part Number',
      'group' => 'Basic',
      'rank' => '13000',
      'dataType' => 'string',
      'maxLength' => '60',
      'minLength' => '1',
    ),
    'modelNumber' => 
    array (
      'name' => 'modelNumber',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Model numbers allow manufacturers to keep track of each hardware device and identify or replace the proper part when needed. Model numbers are often found on the bottom, back, or side of a product. Having this information allows customers to search for items on the site and informs product matching.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Model Number',
      'group' => 'Basic',
      'rank' => '14000',
      'dataType' => 'string',
      'maxLength' => '60',
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
      'rank' => '15000',
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
      'rank' => '15500',
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
      'rank' => '15550',
      'dataType' => 'string',
      'maxLength' => '7',
      'minLength' => '1',
    ),
    'pieceCount' => 
    array (
      'name' => 'pieceCount',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of small pieces, slices, or different items within the product. Piece Count applies to things such as puzzles, building block sets, and products that contain multiple different items (such as tool sets, dinnerware sets, gift baskets, art sets, makeup kits, or shaving kits). EXAMPLE: (1) A 500-piece puzzle has a "Piece Count" of 500. (2) A 105-Piece Socket Wrench set has a piece count of "105." (3) A gift basket of 5 different items has a "Piece Count" of 5.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Pieces',
      'group' => 'Basic',
      'rank' => '15575',
      'dataType' => 'integer',
      'totalDigits' => '20',
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
      'rank' => '16000',
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
      'rank' => '17000',
    ),
    'instrument' => 
    array (
      'name' => 'instrument',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The name(s) of the musical instrument(s) or equipment this accessory is intended for/compatible with.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Instrument',
      'group' => 'Discoverability',
      'rank' => '19000',
    ),
    'color' => 
    array (
      'name' => 'color',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Color as described by the manufacturer.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Color',
      'group' => 'Discoverability',
      'rank' => '20000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'colorCategory' => 
    array (
      'name' => 'colorCategory',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Select the color from a short list that best describes the general color of the item. This improves searchability as it allows customers to view items by color from the left navigation when they perform a search.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Color Category',
      'group' => 'Discoverability',
      'rank' => '21000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'colorCategoryValue',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'Beige',
            1 => 'Black',
            2 => 'Blue',
            3 => 'Bronze',
            4 => 'Brown',
            5 => 'Clear',
            6 => 'Gold',
            7 => 'Gray',
            8 => 'Green',
            9 => 'Multi-color',
            10 => 'Off-White',
            11 => 'Orange',
            12 => 'Pink',
            13 => 'Purple',
            14 => 'Red',
            15 => 'Silver',
            16 => 'White',
            17 => 'Yellow',
          ),
        ),
      ),
    ),
    'size' => 
    array (
      'name' => 'size',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Overall dimensions of an item. Used only for products that do not already have a more specific \'x size\' attribute, such as ring size or clothing size. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Size',
      'group' => 'Discoverability',
      'rank' => '23000',
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
      'rank' => '25000',
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
      'rank' => '26000',
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
      'rank' => '27000',
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
      'rank' => '28000',
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
      'rank' => '30000',
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
      'rank' => '31000',
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
            0 => 'color',
            1 => 'pattern',
            2 => 'material',
            3 => 'finish',
            4 => 'audioPowerOutput',
            5 => 'shape',
            6 => 'sportsTeam',
            7 => 'countPerPack',
            8 => 'count',
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
      'rank' => '32000',
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
      'rank' => '36000',
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
    'batteryTechnologyType' => 
    array (
      'name' => 'batteryTechnologyType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Please select the Battery Technology Type from the list provided. NOTE: If battery type is lead acid, lead acid (nonspillable), lithium ion, or lithium metal, please ensure that you have obtained a hazardous materials risk assessment through WERCS  before setting up your item. ',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'hasBatteries',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Contained Battery Type',
      'group' => 'Compliance',
      'rank' => '38000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Does Not Contain a Battery',
        1 => 'Alkaline',
        2 => 'Carbon Zinc',
        3 => 'Lead Acid',
        4 => 'Lead Acid (Nonspillable)',
        5 => 'Lithium Primary (Lithium Metal)',
        6 => 'Lithium Ion',
        7 => 'Magnesium',
        8 => 'Mercury',
        9 => 'Nickel Cadmium',
        10 => 'Nickel Metal Hydride',
        11 => 'Silver',
        12 => 'Thermal',
        13 => 'Other',
        14 => 'Multiple Types',
      ),
    ),
    'hasWarranty' => 
    array (
      'name' => 'hasWarranty',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item comes with a warranty. If an item has a warranty, then enter EITHER the warranty URL or the warranty text in the appropriate field.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Warranty',
      'group' => 'Compliance',
      'rank' => '39000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'warrantyURL' => 
    array (
      'name' => 'warrantyURL',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If you indicated that your item has a warranty, provide either the Warranty URL or Warranty Text. The Warranty URL is the web location of the image, PDF, or link to the manufacturer\'s warranty page, showing the warranty and its terms, including the duration of the warranty. URLs must begin with http:// or https:// NOTE: Please remember to update the link and/or text of the warranty as the warranty changes. If supplying an image, provide the final destination image URL (no-redirects) that is publicly accessible (no username/password required) and ends in a proper image extension. Recommended file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Maximum file size: 2 GB. If the Ingredients have been included in another image, you may repeat the URL here. ',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'warrantyText',
          'value' => 'null',
        ),
        1 => 
        array (
          'name' => 'hasWarranty',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Warranty URL',
      'group' => 'Compliance',
      'rank' => '40000',
      'dataType' => 'anyURI',
    ),
    'warrantyText' => 
    array (
      'name' => 'warrantyText',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If you marked Y for "Has Warranty" provide the Warranty URL or Warranty Text (the full text of the warranty terms, including what is covered by the warranty and the duration of the warranty). NOTE: please remember to update the text of your warranty as your warranty changes.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'warrantyURL',
          'value' => 'null',
        ),
        1 => 
        array (
          'name' => 'hasWarranty',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Warranty Text',
      'group' => 'Compliance',
      'rank' => '41000',
      'dataType' => 'string',
      'maxLength' => '1000',
      'minLength' => '1',
    ),
    'hasIngredientList' => 
    array (
      'name' => 'hasIngredientList',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Does your product have a list of ingredients OTHER than that provided with Drug Facts, Nutrition Facts, or Supplement Facts? If so, please provide EITHER the ingredients text or the URL to the image.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Has Ingredient List',
      'group' => 'Compliance',
      'rank' => '44875',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'ingredientListImage' => 
    array (
      'name' => 'ingredientListImage',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If your product contains a list of ingredients OTHER than that required with drug, supplement, or nutrition info, provide the URL of image. Provide the final destination image URL (no-redirects) that is publicly accessible (no username/password required) and ends in a proper image extension. Recommended file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Maximum file size: 2 GB.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'hasIngredientList',
          'value' => 'Yes',
        ),
        1 => 
        array (
          'name' => 'ingredients',
          'value' => 'null',
        ),
      ),
      'displayName' => 'Ingredient List Image',
      'group' => 'Compliance',
      'rank' => '46750',
      'dataType' => 'anyURI',
    ),
    'ingredients' => 
    array (
      'name' => 'ingredients',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The list of all ingredients contained in an item, as found on the product label mandated by FDA guidelines. The ingredients should be listed in descending order by weight. The label must list the names of any FDA-certified color additives, but some ingredients can be listed collectively as flavors, spices, artificial flavoring or artificial colors. Refer to the FDA Food Labeling Guide for more guidelines.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'hasIngredientList',
          'value' => 'Yes',
        ),
        1 => 
        array (
          'name' => 'ingredientListImage',
          'value' => 'null',
        ),
      ),
      'displayName' => 'Ingredients Text',
      'group' => 'Compliance',
      'rank' => '47062',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'compositeWoodCertificationCode' => 
    array (
      'name' => 'compositeWoodCertificationCode',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Composite Wood - Indicates if any portion of the item contains any of the following types of composite wood: hardwood plywood veneer core, hardwood plywood composite core, particleboard, or medium density fiber board (MDF). Enter the code corresponding to the highest formaldehyde emission level on any portion of the item. Code Definitions: 1 - Does not contain composite wood; 7 - Product is not CARB compliant and cannot be sold in California; 8 - Product is CARB compliant and can be sold in California.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Composite Wood Certification Code',
      'group' => 'Compliance',
      'rank' => '47375',
      'dataType' => 'integer',
      'optionValues' => 
      array (
        0 => '1',
        1 => '7',
        2 => '8',
      ),
      'totalDigits' => '1',
    ),
    'isAerosol' => 
    array (
      'name' => 'isAerosol',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => ' ‘Aerosol’ is defined by Walmart to include any item of Merchandise that contains a compressed gas or propellant (including bag-on-valve and other pressurized designs).  If your product meets this definition, Mark Y and ensure that you have obtained a hazardous materials risk assessment through WERCS  before setting up your item.  ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Contains Aerosol',
      'group' => 'Compliance',
      'rank' => '47687',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isChemical' => 
    array (
      'name' => 'isChemical',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => ' ‘Chemical’ is defined by Walmart to include any item of Merchandise that contains a powder, gel, paste, or liquid that is not intended for human consumption.  ‘Chemical’ also includes the following types items that ARE intended for human consumption, inhalation, or absorption, or labeled with drug facts:  All over-the-counter medications, including: Lozenges, pills or capsules (e.g. pain relievers; allergy medications; as well as vitamins and supplements that contain metals); Medicated swabs and wipes, acne medication, and sunscreen; Medicated patches (such as nicotine patches); Liquids (e.g. cough medicine, medicated drops, nasal spray and inhalers); Medicated shampoos, gums, ointments and creams; Medicated lip balm, lip creams and petroleum jelly; Contraceptive foam, films, and spermicides; and Product/Equipment sold with chemicals (e.g. vaporizer sold with medication) and electronic cigarettes. If your product meets this definition, Mark Y and ensure that you have obtained a hazardous materials risk assessment through WERCS  before setting up your item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Contains Chemical',
      'group' => 'Compliance',
      'rank' => '47843',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'inputsAndOutputs' => 
    array (
      'name' => 'inputsAndOutputs',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Enter the type and quantity of each input and/or output connection provided on the product.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Inputs & Outputs',
      'group' => 'Additional Category Attributes',
      'rank' => '48000',
    ),
    'displayTechnology' => 
    array (
      'name' => 'displayTechnology',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The primary technology used for the item\'s display.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Display Technology',
      'group' => 'Additional Category Attributes',
      'rank' => '49000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'wirelessTechnologies' => 
    array (
      'name' => 'wirelessTechnologies',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Any wireless communications standard used within or by the item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Wireless Technologies',
      'group' => 'Additional Category Attributes',
      'rank' => '51000',
    ),
    'hasBluetooth' => 
    array (
      'name' => 'hasBluetooth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Does the item provide wireless communication compatibility with the Bluetooth standard?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Bluetooth',
      'group' => 'Additional Category Attributes',
      'rank' => '52000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isRemoteControlIncluded' => 
    array (
      'name' => 'isRemoteControlIncluded',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Is a remote control included with the item?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Remote Control Included',
      'group' => 'Additional Category Attributes',
      'rank' => '54000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'batteryLife' => 
    array (
      'name' => 'batteryLife',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Life of the device\'s battery under ideal conditions (maximum run time).',
      'requiredLevel' => 'Optional',
      'displayName' => 'Battery Life',
      'group' => 'Additional Category Attributes',
      'rank' => '55000',
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
            0 => 'h',
          ),
        ),
      ),
    ),
    'pattern' => 
    array (
      'name' => 'pattern',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Decorative design or visual ornamentation, often with a thematic, recurring motif.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Pattern',
      'group' => 'Additional Category Attributes',
      'rank' => '56000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'material' => 
    array (
      'name' => 'material',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The main material(s) that a product is made of. This does not need to be an exhaustive list, but should contain the predominant or functionally important material/materials. Fabric material specifics should be entered using the "Fabric Content" attribute.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Material',
      'group' => 'Additional Category Attributes',
      'rank' => '57000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isPortable' => 
    array (
      'name' => 'isPortable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Is the item designed to be easily moved?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Portable',
      'group' => 'Additional Category Attributes',
      'rank' => '58000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'recommendedUses' => 
    array (
      'name' => 'recommendedUses',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Further clarification of what the item may be used for. This improves searchability when customers search for general terms like "birthday party" that do not include the names of specific items.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Recommended Use',
      'group' => 'Additional Category Attributes',
      'rank' => '59000',
    ),
    'recommendedLocations' => 
    array (
      'name' => 'recommendedLocations',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The primary location recommended for the item\'s use.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Recommended Locations',
      'group' => 'Additional Category Attributes',
      'rank' => '60000',
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
      'rank' => '61000',
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
      'rank' => '62000',
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
      'rank' => '63000',
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
      'rank' => '64000',
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
      'rank' => '69000',
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
      'rank' => '70000',
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
                0 => 'color',
                1 => 'pattern',
                2 => 'material',
                3 => 'finish',
                4 => 'audioPowerOutput',
                5 => 'shape',
                6 => 'sportsTeam',
                7 => 'countPerPack',
                8 => 'count',
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