<?php return $arr = array (
  'Bedding' => 
  array (
    'pieceCount' => 
    array (
      'name' => 'pieceCount',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of small pieces, slices, or different items within the product. Piece Count applies to things such as puzzles, building block sets, and products that contain multiple different items (such as tool sets, dinnerware sets, gift baskets, art sets, makeup kits, or shaving kits). EXAMPLE: (1) A 500-piece puzzle has a "Piece Count" of 500. (2) A 105-Piece Socket Wrench set has a piece count of "105." (3) A gift basket of 5 different items has a "Piece Count" of 5.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Pieces',
      'group' => 'Basic',
      'rank' => 'None',
      'dataType' => 'integer',
      'totalDigits' => '20',
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
    'modelNumber' => 
    array (
      'name' => 'modelNumber',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Model numbers allow manufacturers to keep track of each hardware device and identify or replace the proper part when needed. Model numbers are often found on the bottom, back, or side of a product. Having this information allows customers to search for items on the site and informs product matching.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Model Number',
      'group' => 'Basic',
      'rank' => '13000',
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
    'color' => 
    array (
      'name' => 'color',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Color as described by the manufacturer.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Color',
      'group' => 'Discoverability',
      'rank' => '19000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '19500',
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
      'group' => 'Discoverability',
      'rank' => '20000',
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
    'pattern' => 
    array (
      'name' => 'pattern',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Decorative design or visual ornamentation, often with a thematic, recurring motif.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Pattern',
      'group' => 'Discoverability',
      'rank' => '21000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Material',
      'group' => 'Discoverability',
      'rank' => '22000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'gender' => 
    array (
      'name' => 'gender',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicate whether this item is meant for a particular gender or meant to be gender-agnostic (unisex).',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Gender',
      'group' => 'Discoverability',
      'rank' => '23000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Women',
        1 => 'Men',
        2 => 'Girls',
        3 => 'Boys',
        4 => 'Unisex',
      ),
    ),
    'ageGroup' => 
    array (
      'name' => 'ageGroup',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'General grouping of ages into commonly used demographic labels.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Age Group',
      'group' => 'Discoverability',
      'rank' => '24000',
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
    'bedSize' => 
    array (
      'name' => 'bedSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Denotes the size of a bed, a bed\'s parts, mattress or bed linens in standard sizes.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Bed Size',
      'group' => 'Discoverability',
      'rank' => '26000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'bedPillowSize' => 
    array (
      'name' => 'bedPillowSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'General size label describing the size of a bed pillow or pillow cover.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Bed Pillow Size',
      'group' => 'Discoverability',
      'rank' => '27000',
    ),
    'threadCount' => 
    array (
      'name' => 'threadCount',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of horizontal and vertical threads per square inch of fabric. This is considered an important indicator of item quality. For example, when selecting bed sheets, consumers correlate higher thread counts (over 300) with better quality and comfort.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Thread Count',
      'group' => 'Discoverability',
      'rank' => '28000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'homeDecorStyle' => 
    array (
      'name' => 'homeDecorStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes home furnishings and decorations according to various themes, styles and tastes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Home Decor Style',
      'group' => 'Discoverability',
      'rank' => '29000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'theme' => 
    array (
      'name' => 'theme',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A dominant idea, meaning, or setting applied to an item. Used in a wide range of products including decorative objects, clothing, toys, and furniture. Can be an important selection criteria for consumers who want to achieve a particular ambiance for room décor or for a special occasion.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Theme',
      'group' => 'Discoverability',
      'rank' => '30000',
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
      'requiredLevel' => 'Optional',
      'displayName' => 'Character',
      'group' => 'Discoverability',
      'rank' => '32000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'globalBrandLicense' => 
    array (
      'name' => 'globalBrandLicense',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A brand name that is not owned by the product brand, but is licensed for the particular product. (Often character and media tie-ins and promotions.)',
      'requiredLevel' => 'Optional',
      'displayName' => 'Brand License',
      'group' => 'Discoverability',
      'rank' => '33000',
    ),
    'fillMaterial' => 
    array (
      'name' => 'fillMaterial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The material used to stuff the item (in a cushion or plush toy, for example).',
      'requiredLevel' => 'Optional',
      'displayName' => 'Fill Material',
      'group' => 'Discoverability',
      'rank' => '34000',
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
      'rank' => '37000',
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
      'rank' => '38000',
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
      'rank' => '39000',
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
      'rank' => '41000',
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
      'rank' => '42000',
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
            1 => 'size',
            2 => 'capacity',
            3 => 'pattern',
            4 => 'homeDecorStyle',
            5 => 'assembledProductLength',
            6 => 'assembledProductWidth',
            7 => 'assembledProductHeight',
            8 => 'bedSize',
            9 => 'material',
            10 => 'scent',
            11 => 'countPerPack',
            12 => 'count',
            13 => 'academicInstitution',
            14 => 'fabricColor',
            15 => 'capacity',
            16 => 'shape',
            17 => 'accentColor',
            18 => 'diameter',
            19 => 'fabricMaterialName',
            20 => 'baseColor',
            21 => 'baseFinish',
            22 => 'sportsTeam',
            23 => 'character',
            24 => 'finish',
            25 => 'monogramLetter',
            26 => 'threadCount',
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
      'rank' => '43000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isProp65WarningRequired' => 
    array (
      'name' => 'isProp65WarningRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Selecting "Y" indicates the product requires California\'s Proposition 65 special warning. Proposition 65 entitles California consumers to special warnings for products that contain chemicals known to the state of California to cause cancer and birth defects or other reproductive harm if certain criteria are met (such as quantity of chemical contained in the product). See the portions of the California Health and Safety Code related to Proposition 65 for more information.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Prop 65 Warning Required',
      'group' => 'Compliance',
      'rank' => '47000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'prop65WarningText' => 
    array (
      'name' => 'prop65WarningText',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'This is a particular statement legally required by the State of California for certain products to warn consumers about potential health dangers. See the portions of the California Health and Safety Code related to Proposition 65 to see what products require labels and to verify the text of your warning label.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isProp65WarningRequired',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Prop 65 Warning Text',
      'group' => 'Compliance',
      'rank' => '48000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '49000',
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
    'requiresTextileActLabeling' => 
    array (
      'name' => 'requiresTextileActLabeling',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Select "Y" if your item contains wool or is one of the following: clothing (except for hats and shoes), handkerchiefs, scarves, bedding (including sheets, covers, blankets, comforters, pillows, pillowcases, quilts, bedspreads and pads (but not outer coverings for mattresses or box springs)), curtains and casements, draperies, tablecloths, napkins, doilies, floor coverings (rugs, carpets and mats), towels, washcloths, dishcloths, ironing board covers and pads, umbrellas, parasols, bats or batting, flags with heading or that are bigger than 216 square inches, cushions, all fibers, yarns and fabrics (but not packaging ribbons), furniture slip covers and other furniture covers, afghans and throws, sleeping bags, antimacassars (doilies), hammocks, dresser and other furniture scarves. For further information on these requirements, refer to the labeling requirements of the Textile Act. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Requires Textile Act Labeling',
      'group' => 'Compliance',
      'rank' => '50000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'countryOfOriginTextiles' => 
    array (
      'name' => 'countryOfOriginTextiles',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Use “Made in U.S.A. and Imported” to indicate manufacture in the U.S. from imported materials, or part processing in the U.S. and part in a foreign country. Use “Made in U.S.A. or Imported” to reflect that some units of an item originate from a domestic source and others from a foreign source. Use “Made in U.S.A.” only if all units were made completely in the U.S. using materials also made in the U.S. Use "Imported" if units are completely imported.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'requiresTextileActLabeling',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Country of Origin - Textiles',
      'group' => 'Compliance',
      'rank' => '51000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'USA',
        1 => 'Imported',
        2 => 'USA and Imported',
        3 => 'USA or Imported',
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
      'rank' => '54000',
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
      'rank' => '55000',
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
      'rank' => '56000',
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
      'rank' => '63000',
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
      'rank' => '66000',
    ),
    'isSet' => 
    array (
      'name' => 'isSet',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the product consists of two or more different items sold together as a set. Example: A bedding set that includes sheets, pillow shams, and a comforter.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Set',
      'group' => 'Additional Category Attributes',
      'rank' => '67000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'occasion' => 
    array (
      'name' => 'occasion',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The particular target time, event, or holiday for the product.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Occasion',
      'group' => 'Additional Category Attributes',
      'rank' => '68000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'bedStyle' => 
    array (
      'name' => 'bedStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes the bed\'s shape and appearance according to its design features.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Bed Style',
      'group' => 'Additional Category Attributes',
      'rank' => '69000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'collection' => 
    array (
      'name' => 'collection',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A collection is a particular group of items that have the same visual style, made by the same brand.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Collection',
      'group' => 'Additional Category Attributes',
      'rank' => '70000',
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
      'group' => 'Additional Category Attributes',
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
      'group' => 'Additional Category Attributes',
      'rank' => '72000',
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
      'group' => 'Nice to Have',
      'rank' => '77000',
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
      'group' => 'Nice to Have',
      'rank' => '78000',
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
      'rank' => '79000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'monogramLetter' => 
    array (
      'name' => 'monogramLetter',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If the item has a monogram, indicate the letter/s.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Monogram Letter',
      'group' => 'Nice to Have',
      'rank' => '81000',
      'dataType' => 'string',
      'maxLength' => '7',
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
                1 => 'size',
                2 => 'capacity',
                3 => 'pattern',
                4 => 'homeDecorStyle',
                5 => 'assembledProductLength',
                6 => 'assembledProductWidth',
                7 => 'assembledProductHeight',
                8 => 'bedSize',
                9 => 'material',
                10 => 'scent',
                11 => 'countPerPack',
                12 => 'count',
                13 => 'academicInstitution',
                14 => 'fabricColor',
                15 => 'capacity',
                16 => 'shape',
                17 => 'accentColor',
                18 => 'diameter',
                19 => 'fabricMaterialName',
                20 => 'baseColor',
                21 => 'baseFinish',
                22 => 'sportsTeam',
                23 => 'character',
                24 => 'finish',
                25 => 'monogramLetter',
                26 => 'threadCount',
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
  'LargeAppliances' => 
  array (
    'hasFuelContainer' => 
    array (
      'name' => 'hasFuelContainer',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Denotes any item with an empty container that may be filled with fluids, such as fuel, CO2, propane, etc.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Fuel Container',
      'group' => 'Compliance',
      'rank' => 'None',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
    'modelNumber' => 
    array (
      'name' => 'modelNumber',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Model numbers allow manufacturers to keep track of each hardware device and identify or replace the proper part when needed. Model numbers are often found on the bottom, back, or side of a product. Having this information allows customers to search for items on the site and informs product matching.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Model Number',
      'group' => 'Basic',
      'rank' => '13000',
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
      'rank' => '14000',
      'dataType' => 'string',
      'maxLength' => '60',
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
    'color' => 
    array (
      'name' => 'color',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Color as described by the manufacturer.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Color',
      'group' => 'Discoverability',
      'rank' => '19000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '19500',
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
      'group' => 'Discoverability',
      'rank' => '20000',
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
    'isSet' => 
    array (
      'name' => 'isSet',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the product consists of two or more different items sold together as a set. Example: A bedding set that includes sheets, pillow shams, and a comforter.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Set',
      'group' => 'Discoverability',
      'rank' => '21000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'capacity' => 
    array (
      'name' => 'capacity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A product\'s available space. Capacity is often provided for items that contain multiple pieces of something or that can accommodate some number of objects.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Capacity',
      'group' => 'Discoverability',
      'rank' => '22000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'pattern' => 
    array (
      'name' => 'pattern',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Decorative design or visual ornamentation, often with a thematic, recurring motif.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Pattern',
      'group' => 'Discoverability',
      'rank' => '23000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Finish',
      'group' => 'Discoverability',
      'rank' => '24000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'homeDecorStyle' => 
    array (
      'name' => 'homeDecorStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes home furnishings and decorations according to various themes, styles and tastes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Home Decor Style',
      'group' => 'Discoverability',
      'rank' => '25000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Material',
      'group' => 'Discoverability',
      'rank' => '26000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isEnergyStarCertified' => 
    array (
      'name' => 'isEnergyStarCertified',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicate Y if the product has been certified by the EPA Energy Star program.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Energry Star-Certified',
      'group' => 'Discoverability',
      'rank' => '27000',
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
      'rank' => '30000',
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
      'rank' => '31000',
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
      'rank' => '32000',
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
      'rank' => '34000',
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
      'rank' => '35000',
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
            1 => 'size',
            2 => 'capacity',
            3 => 'pattern',
            4 => 'homeDecorStyle',
            5 => 'assembledProductLength',
            6 => 'assembledProductWidth',
            7 => 'assembledProductHeight',
            8 => 'bedSize',
            9 => 'material',
            10 => 'scent',
            11 => 'countPerPack',
            12 => 'count',
            13 => 'academicInstitution',
            14 => 'fabricColor',
            15 => 'capacity',
            16 => 'shape',
            17 => 'accentColor',
            18 => 'diameter',
            19 => 'fabricMaterialName',
            20 => 'baseColor',
            21 => 'baseFinish',
            22 => 'sportsTeam',
            23 => 'character',
            24 => 'finish',
            25 => 'monogramLetter',
            26 => 'threadCount',
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
      'rank' => '36000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isProp65WarningRequired' => 
    array (
      'name' => 'isProp65WarningRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Selecting "Y" indicates the product requires California\'s Proposition 65 special warning. Proposition 65 entitles California consumers to special warnings for products that contain chemicals known to the state of California to cause cancer and birth defects or other reproductive harm if certain criteria are met (such as quantity of chemical contained in the product). See the portions of the California Health and Safety Code related to Proposition 65 for more information.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Prop 65 Warning Required',
      'group' => 'Compliance',
      'rank' => '40000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'prop65WarningText' => 
    array (
      'name' => 'prop65WarningText',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'This is a particular statement legally required by the State of California for certain products to warn consumers about potential health dangers. See the portions of the California Health and Safety Code related to Proposition 65 to see what products require labels and to verify the text of your warning label.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isProp65WarningRequired',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Prop 65 Warning Text',
      'group' => 'Compliance',
      'rank' => '41000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '43000',
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
    'hasCfl' => 
    array (
      'name' => 'hasCfl',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates if any part of the item is or has a compact fluorescent light bulb.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Has CFL',
      'group' => 'Compliance',
      'rank' => '45000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isLightingFactsLabelRequired' => 
    array (
      'name' => 'isLightingFactsLabelRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Does your item require a Lighting Facts label? A Lighting Facts label must appear on packaging for most general service "lamps" with medium screw bases. That includes most incandescent, compact fluorescent (CFL), and light emitting diode (LED) light bulbs. For more information on what items are covered, see 16 CFR § 305.2 and § 305.3.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Lighting Facts Label Required',
      'group' => 'Compliance',
      'rank' => '46000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'lightingFactsLabel' => 
    array (
      'name' => 'lightingFactsLabel',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'URL of the location of the label. URLs must begin with http:// or https://  Label must include brightness specified lumens, estimated energy cost per year, life, light appearance, scale, energy used, and special handling information needed for disposal, as outlined by the FTC. If supplying an image, provide the final destination image URL (no-redirects) that is publicly accessible (no username/password required) and ends in a proper image extension. Recommended file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Maximum file size: 2 GB.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isLightingFactsLabelRequired',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Lighting Facts Label Image',
      'group' => 'Compliance',
      'rank' => '47000',
      'dataType' => 'anyURI',
    ),
    'isEnergyGuideLabelRequired' => 
    array (
      'name' => 'isEnergyGuideLabelRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Denotes whether the label is required for the item. The FTC’s Appliance Labeling Rule requires retailers to display energy cost information for certain refrigerators, freezers, furnaces, televisions, clothes washers, dishwashers, water heaters, pool heaters, and room air conditioners. The Rule also covers labeling for plumbing products and ceiling fans. For more information, see 16 CFR part 305. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Energy Guide Label Required',
      'group' => 'Compliance',
      'rank' => '48000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'energyGuideLabel' => 
    array (
      'name' => 'energyGuideLabel',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Image URL must end in the file name. Image URL must be static and have no query parameters. Recommended file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Maximum file size: 2 GB. Recommended image resolution: 2000 pixels on longest side at 72 ppi. Minimum image size requirements: 500 pixels on longest side.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isEnergyGuideLabelRequired',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Energy Guide Label',
      'group' => 'Compliance',
      'rank' => '49000',
      'dataType' => 'anyURI',
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
      'rank' => '50000',
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
      'rank' => '51000',
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
      'rank' => '52000',
      'dataType' => 'string',
      'maxLength' => '1000',
      'minLength' => '1',
    ),
    'isAssemblyRequired' => 
    array (
      'name' => 'isAssemblyRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Is product unassembled and must be put together before use?',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Assembly Required',
      'group' => 'Additional Category Attributes',
      'rank' => '59000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'assemblyInstructions' => 
    array (
      'name' => 'assemblyInstructions',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Provide a URL to an image or PDF asset showing assembly instructions for items requiring assembly. URLs must be static and have no query parameters. URLs must begin with http:// or https:// and should end in in the file name.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isAssemblyRequired',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Assembly Instructions',
      'group' => 'Additional Category Attributes',
      'rank' => '60000',
      'dataType' => 'anyURI',
    ),
    'cleaningCareAndMaintenance' => 
    array (
      'name' => 'cleaningCareAndMaintenance',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Description of how the item should be cleaned and maintained.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Cleaning, Care & Maintenance',
      'group' => 'Additional Category Attributes',
      'rank' => '61000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '62000',
    ),
    'recommendedRooms' => 
    array (
      'name' => 'recommendedRooms',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The rooms where the item is likely or recommended to be used.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Recommended Rooms',
      'group' => 'Additional Category Attributes',
      'rank' => '63000',
    ),
    'powerType' => 
    array (
      'name' => 'powerType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Provides information on the exact type of power used by the item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Power Type',
      'group' => 'Additional Category Attributes',
      'rank' => '64000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'volts' => 
    array (
      'name' => 'volts',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of volts the product produces or requires. The significance of voltage varies with type of product. For example, if product is an appliance, used to describe the outlet voltage required. If an item (such as a power supply) both produces and requires different voltages, each type of voltage should be included.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Volts',
      'group' => 'Additional Category Attributes',
      'rank' => '65000',
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
            0 => 'mV',
            1 => 'V',
            2 => 'VAC',
            3 => 'VDC',
            4 => 'kV',
            5 => 'kVAC',
            6 => 'kVDC',
          ),
        ),
      ),
    ),
    'watts' => 
    array (
      'name' => 'watts',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of watts (wattage) of electrical power the product produces or consumes. This attribute is used in a wide variety of products including appliances, light bulbs, electronic equipment and electrical components.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Watts',
      'group' => 'Additional Category Attributes',
      'rank' => '66000',
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
            0 => 'W',
            1 => 'kW',
          ),
        ),
      ),
    ),
    'btu' => 
    array (
      'name' => 'btu',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates British thermal units for heating and cooling appliances.',
      'requiredLevel' => 'Optional',
      'displayName' => 'BTU',
      'group' => 'Additional Category Attributes',
      'rank' => '67000',
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
      'rank' => '68000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'cordLength' => 
    array (
      'name' => 'cordLength',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the length of cord that comes with the item. For electrical appliances the cord is typically a power cord. For other products, headphones for example, the cord would connect to the receiver.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Cord Length',
      'group' => 'Additional Category Attributes',
      'rank' => '69000',
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
    'maximumRoomSize' => 
    array (
      'name' => 'maximumRoomSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates the maximum room size that can be comfortably climate controlled for climate-control appliances. Measured in square feet.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Maximum Room Size',
      'group' => 'Additional Category Attributes',
      'rank' => '70000',
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
            0 => 'sq ft',
          ),
        ),
      ),
    ),
    'fuelType' => 
    array (
      'name' => 'fuelType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The kind of material that a product consumes to produce heat or power. Attribute is also used to classify a fuel product.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Fuel Type',
      'group' => 'Additional Category Attributes',
      'rank' => '71000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isSmart' => 
    array (
      'name' => 'isSmart',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates whether a device is among the set of "smart" appliances (indicating Web, wireless, or interactive technology has been integrated into device functionality).',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Smart',
      'group' => 'Additional Category Attributes',
      'rank' => '72000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'runTime' => 
    array (
      'name' => 'runTime',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates how long humidifying appliances will run with one tank fill, measured in hours.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Run Time',
      'group' => 'Additional Category Attributes',
      'rank' => '73000',
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
    'hasAutomaticShutoff' => 
    array (
      'name' => 'hasAutomaticShutoff',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item has a mechanism that automatically shuts off the device or shuts off flow to the device. This is important to consumers to conserve resources or as a safety feature. It is used for a variety of products including hoses, appliances and gas grills.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Automatic Shutoff',
      'group' => 'Additional Category Attributes',
      'rank' => '74000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'loadPosition' => 
    array (
      'name' => 'loadPosition',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates whether washing machines and dryers are top load or front load.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Load Position',
      'group' => 'Additional Category Attributes',
      'rank' => '75000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '76000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'collection' => 
    array (
      'name' => 'collection',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A collection is a particular group of items that have the same visual style, made by the same brand.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Collection',
      'group' => 'Nice to Have',
      'rank' => '82000',
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
      'rank' => '83000',
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
      'rank' => '84000',
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
                1 => 'size',
                2 => 'capacity',
                3 => 'pattern',
                4 => 'homeDecorStyle',
                5 => 'assembledProductLength',
                6 => 'assembledProductWidth',
                7 => 'assembledProductHeight',
                8 => 'bedSize',
                9 => 'material',
                10 => 'scent',
                11 => 'countPerPack',
                12 => 'count',
                13 => 'academicInstitution',
                14 => 'fabricColor',
                15 => 'capacity',
                16 => 'shape',
                17 => 'accentColor',
                18 => 'diameter',
                19 => 'fabricMaterialName',
                20 => 'baseColor',
                21 => 'baseFinish',
                22 => 'sportsTeam',
                23 => 'character',
                24 => 'finish',
                25 => 'monogramLetter',
                26 => 'threadCount',
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
  'HomeOther' => 
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
    'modelNumber' => 
    array (
      'name' => 'modelNumber',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Model numbers allow manufacturers to keep track of each hardware device and identify or replace the proper part when needed. Model numbers are often found on the bottom, back, or side of a product. Having this information allows customers to search for items on the site and informs product matching.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Model Number',
      'group' => 'Basic',
      'rank' => '13000',
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
    'color' => 
    array (
      'name' => 'color',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Color as described by the manufacturer.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Color',
      'group' => 'Discoverability',
      'rank' => '19000',
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
      'group' => 'Discoverability',
      'rank' => '20000',
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
    'pattern' => 
    array (
      'name' => 'pattern',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Decorative design or visual ornamentation, often with a thematic, recurring motif.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Pattern',
      'group' => 'Discoverability',
      'rank' => '21000',
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
      'group' => 'Discoverability',
      'rank' => '22000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Finish',
      'group' => 'Discoverability',
      'rank' => '23000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'ageGroup' => 
    array (
      'name' => 'ageGroup',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'General grouping of ages into commonly used demographic labels.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Age Group',
      'group' => 'Discoverability',
      'rank' => '25000',
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
    'gender' => 
    array (
      'name' => 'gender',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicate whether this item is meant for a particular gender or meant to be gender-agnostic (unisex).',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Gender',
      'group' => 'Discoverability',
      'rank' => '26000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Women',
        1 => 'Men',
        2 => 'Girls',
        3 => 'Boys',
        4 => 'Unisex',
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
      'rank' => '27000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'threadCount' => 
    array (
      'name' => 'threadCount',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of horizontal and vertical threads per square inch of fabric. This is considered an important indicator of item quality. For example, when selecting bed sheets, consumers correlate higher thread counts (over 300) with better quality and comfort.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Thread Count',
      'group' => 'Discoverability',
      'rank' => '28000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'rugSize' => 
    array (
      'name' => 'rugSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The approximate size of rugs and rug runners, measured in feet, and and expressed as Length x Width (for example: a ten-foot-long by five-foot-wide rug\'s measurements should be entered as 10 x 5).',
      'requiredLevel' => 'Optional',
      'displayName' => 'Rug Size',
      'group' => 'Discoverability',
      'rank' => '29000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'rugStyle' => 
    array (
      'name' => 'rugStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Style of rug expressed in fashion or form. Use the example values; if your style does not appear, you may enter it.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Rug Style',
      'group' => 'Discoverability',
      'rank' => '30000',
    ),
    'curtainPanelStyle' => 
    array (
      'name' => 'curtainPanelStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Type of design for panel curtains typically based on method of attachment. Attribute is used on the front end to display panel types to customers. For example, some customers prefer a grommet style panel because it slides easily onto a rod or pole.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Curtain Panel Style',
      'group' => 'Discoverability',
      'rank' => '31000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'scent' => 
    array (
      'name' => 'scent',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Descriptive term for fragrance labeled on the product, if any. "Unscented" is a scent, if labeled. If no scent is specifically labeled, leave blank.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Scent',
      'group' => 'Discoverability',
      'rank' => '32000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isPetFriendly' => 
    array (
      'name' => 'isPetFriendly',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item has special features that are contusive to pet well-being, or living with a pet. Used for home products that are a good choice if you have pets.  For example, if a chair cushion is made of fabric that\'s designed to resistant to stains, smells, bacteria and muddy paws.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Pet Friendly',
      'group' => 'Discoverability',
      'rank' => '33000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'fillMaterial' => 
    array (
      'name' => 'fillMaterial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The material used to stuff the item (in a cushion or plush toy, for example).',
      'requiredLevel' => 'Optional',
      'displayName' => 'Fill Material',
      'group' => 'Discoverability',
      'rank' => '34000',
    ),
    'clockNumberType' => 
    array (
      'name' => 'clockNumberType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The type of numbers on a clock or watch. Some consumers find Arabic numbers easier to read than Roman numerals. Others prefer the clean look of a clock with no numbers.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Clock Number Type',
      'group' => 'Discoverability',
      'rank' => '35000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'homeDecorStyle' => 
    array (
      'name' => 'homeDecorStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes home furnishings and decorations according to various themes, styles and tastes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Home Decor Style',
      'group' => 'Discoverability',
      'rank' => '36000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'diameter' => 
    array (
      'name' => 'diameter',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The measurement from one side of a circle to the other, through the middle. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Diameter',
      'group' => 'Discoverability',
      'rank' => '36500',
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
            0 => 'ft',
            1 => 'in',
            2 => 'mm',
            3 => 'cm',
          ),
        ),
      ),
    ),
    'theme' => 
    array (
      'name' => 'theme',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A dominant idea, meaning, or setting applied to an item. Used in a wide range of products including decorative objects, clothing, toys, and furniture. Can be an important selection criteria for consumers who want to achieve a particular ambiance for room décor or for a special occasion.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Theme',
      'group' => 'Discoverability',
      'rank' => '37000',
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
      'requiredLevel' => 'Optional',
      'displayName' => 'Character',
      'group' => 'Discoverability',
      'rank' => '38000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'globalBrandLicense' => 
    array (
      'name' => 'globalBrandLicense',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A brand name that is not owned by the product brand, but is licensed for the particular product. (Often character and media tie-ins and promotions.)',
      'requiredLevel' => 'Optional',
      'displayName' => 'Brand License',
      'group' => 'Discoverability',
      'rank' => '39000',
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
      'rank' => '41000',
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
      'rank' => '42000',
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
      'rank' => '43000',
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
      'rank' => '46000',
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
      'rank' => '47000',
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
            1 => 'size',
            2 => 'capacity',
            3 => 'pattern',
            4 => 'homeDecorStyle',
            5 => 'assembledProductLength',
            6 => 'assembledProductWidth',
            7 => 'assembledProductHeight',
            8 => 'bedSize',
            9 => 'material',
            10 => 'scent',
            11 => 'countPerPack',
            12 => 'count',
            13 => 'academicInstitution',
            14 => 'fabricColor',
            15 => 'capacity',
            16 => 'shape',
            17 => 'accentColor',
            18 => 'diameter',
            19 => 'fabricMaterialName',
            20 => 'baseColor',
            21 => 'baseFinish',
            22 => 'sportsTeam',
            23 => 'character',
            24 => 'finish',
            25 => 'monogramLetter',
            26 => 'threadCount',
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
      'rank' => '48000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isProp65WarningRequired' => 
    array (
      'name' => 'isProp65WarningRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Selecting "Y" indicates the product requires California\'s Proposition 65 special warning. Proposition 65 entitles California consumers to special warnings for products that contain chemicals known to the state of California to cause cancer and birth defects or other reproductive harm if certain criteria are met (such as quantity of chemical contained in the product). See the portions of the California Health and Safety Code related to Proposition 65 for more information.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Prop 65 Warning Required',
      'group' => 'Compliance',
      'rank' => '52000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'prop65WarningText' => 
    array (
      'name' => 'prop65WarningText',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'This is a particular statement legally required by the State of California for certain products to warn consumers about potential health dangers. See the portions of the California Health and Safety Code related to Proposition 65 to see what products require labels and to verify the text of your warning label.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isProp65WarningRequired',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Prop 65 Warning Text',
      'group' => 'Compliance',
      'rank' => '53000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '54000',
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
    'requiresTextileActLabeling' => 
    array (
      'name' => 'requiresTextileActLabeling',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Select "Y" if your item contains wool or is one of the following: clothing (except for hats and shoes), handkerchiefs, scarves, bedding (including sheets, covers, blankets, comforters, pillows, pillowcases, quilts, bedspreads and pads (but not outer coverings for mattresses or box springs)), curtains and casements, draperies, tablecloths, napkins, doilies, floor coverings (rugs, carpets and mats), towels, washcloths, dishcloths, ironing board covers and pads, umbrellas, parasols, bats or batting, flags with heading or that are bigger than 216 square inches, cushions, all fibers, yarns and fabrics (but not packaging ribbons), furniture slip covers and other furniture covers, afghans and throws, sleeping bags, antimacassars (doilies), hammocks, dresser and other furniture scarves. For further information on these requirements, refer to the labeling requirements of the Textile Act. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Requires Textile Act Labeling',
      'group' => 'Compliance',
      'rank' => '58000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'countryOfOriginTextiles' => 
    array (
      'name' => 'countryOfOriginTextiles',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Use “Made in U.S.A. and Imported” to indicate manufacture in the U.S. from imported materials, or part processing in the U.S. and part in a foreign country. Use “Made in U.S.A. or Imported” to reflect that some units of an item originate from a domestic source and others from a foreign source. Use “Made in U.S.A.” only if all units were made completely in the U.S. using materials also made in the U.S. Use "Imported" if units are completely imported.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'requiresTextileActLabeling',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Country of Origin - Textiles',
      'group' => 'Compliance',
      'rank' => '59000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'USA',
        1 => 'Imported',
        2 => 'USA and Imported',
        3 => 'USA or Imported',
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
      'rank' => '61000',
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
      'rank' => '62000',
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
      'rank' => '63000',
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
      'rank' => '64000',
      'dataType' => 'string',
      'maxLength' => '1000',
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
      'rank' => '68500',
      'dataType' => 'integer',
      'optionValues' => 
      array (
        0 => '1',
        1 => '7',
        2 => '8',
      ),
      'totalDigits' => '1',
    ),
    'hasFuelContainer' => 
    array (
      'name' => 'hasFuelContainer',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Denotes any item with an empty container that may be filled with fluids, such as fuel, CO2, propane, etc.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Fuel Container',
      'group' => 'Compliance',
      'rank' => '69750',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isLightingFactsLabelRequired' => 
    array (
      'name' => 'isLightingFactsLabelRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Does your item require a Lighting Facts label? A Lighting Facts label must appear on packaging for most general service "lamps" with medium screw bases. That includes most incandescent, compact fluorescent (CFL), and light emitting diode (LED) light bulbs. For more information on what items are covered, see 16 CFR § 305.2 and § 305.3.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Lighting Facts Label Required',
      'group' => 'Compliance',
      'rank' => '70375',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'lightingFactsLabel' => 
    array (
      'name' => 'lightingFactsLabel',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'URL of the location of the label. URLs must begin with http:// or https://  Label must include brightness specified lumens, estimated energy cost per year, life, light appearance, scale, energy used, and special handling information needed for disposal, as outlined by the FTC. If supplying an image, provide the final destination image URL (no-redirects) that is publicly accessible (no username/password required) and ends in a proper image extension. Recommended file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Maximum file size: 2 GB.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isLightingFactsLabelRequired',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Lighting Facts Label Image',
      'group' => 'Compliance',
      'rank' => '70687',
      'dataType' => 'anyURI',
    ),
    'isAssemblyRequired' => 
    array (
      'name' => 'isAssemblyRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Is product unassembled and must be put together before use?',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Assembly Required',
      'group' => 'Additional Category Attributes',
      'rank' => '71000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'assemblyInstructions' => 
    array (
      'name' => 'assemblyInstructions',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Provide a URL to an image or PDF asset showing assembly instructions for items requiring assembly. URLs must be static and have no query parameters. URLs must begin with http:// or https:// and should end in in the file name.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isAssemblyRequired',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Assembly Instructions',
      'group' => 'Additional Category Attributes',
      'rank' => '72000',
      'dataType' => 'anyURI',
    ),
    'cleaningCareAndMaintenance' => 
    array (
      'name' => 'cleaningCareAndMaintenance',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Description of how the item should be cleaned and maintained.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Cleaning, Care & Maintenance',
      'group' => 'Additional Category Attributes',
      'rank' => '73000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'contaminantsRemoved' => 
    array (
      'name' => 'contaminantsRemoved',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The particles, liquids, and gases in the air or water which have harmful chemical properties that are removed by the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Contaminants Removed',
      'group' => 'Additional Category Attributes',
      'rank' => '73500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '74000',
    ),
    'recommendedRooms' => 
    array (
      'name' => 'recommendedRooms',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The rooms where the item is likely or recommended to be used.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Recommended Rooms',
      'group' => 'Additional Category Attributes',
      'rank' => '75000',
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
      'rank' => '76000',
    ),
    'fabricColor' => 
    array (
      'name' => 'fabricColor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Color of a fabric part of an item, to distinguish it from the general color of the item, if needed. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Fabric Color',
      'group' => 'Additional Category Attributes',
      'rank' => '77500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '79000',
    ),
    'curtainLength' => 
    array (
      'name' => 'curtainLength',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the length of the curtain as specified by the manufacturer. How length is measured varies with the type of curtain. Most are measured overall from the top edge of the curtain to the bottom edge (longest point) of the curtain. Curtains with large rod pockets are measured from the top of the rod pocket to the bottom edge of the curtain.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Curtain Length',
      'group' => 'Additional Category Attributes',
      'rank' => '79500',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'decimal',
          'totalDigits' => '40',
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
            1 => 'cm',
          ),
        ),
      ),
    ),
    'powerType' => 
    array (
      'name' => 'powerType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Provides information on the exact type of power used by the item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Power Type',
      'group' => 'Additional Category Attributes',
      'rank' => '80000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'volumeCapacity' => 
    array (
      'name' => 'volumeCapacity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The volume of space available in this item to contain objects. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Volume Capacity',
      'group' => 'Additional Category Attributes',
      'rank' => '81000',
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
            0 => 'gal',
            1 => 'L',
            2 => 'qt',
            3 => 'pt',
            4 => 'fl oz',
            5 => 'ml',
            6 => 'cu cm',
            7 => 'cu in',
            8 => 'cu ft',
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
      'rank' => '82000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'occasion' => 
    array (
      'name' => 'occasion',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The particular target time, event, or holiday for the product.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Occasion',
      'group' => 'Additional Category Attributes',
      'rank' => '83000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'accentColor' => 
    array (
      'name' => 'accentColor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A secondary product color.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Accent Color',
      'group' => 'Additional Category Attributes',
      'rank' => '83500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'bedStyle' => 
    array (
      'name' => 'bedStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes the bed\'s shape and appearance according to its design features.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Bed Style',
      'group' => 'Additional Category Attributes',
      'rank' => '84000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'hasPricePerUnit' => 
    array (
      'name' => 'hasPricePerUnit',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Mark as "Y" if your item is any of the following: food used for human or domestic animal consumption; ingredients added to food; napkins; tissues; toilet paper; foil, plastic wrap, wax paper, parchment paper; paper towels; disposable plates, bowls, and cutlery; detergents, soaps, waxes, and other cleansing agents; non-prescription drugs, female hygeine products, and toiletries; automotive fluids and cleaners; rock salt; diapers, pullups and swimmers; fertilizer; kitty litter.',
      'requiredLevel' => 'Required',
      'displayName' => 'Has Price Per Unit',
      'group' => 'Compliance',
      'rank' => '84250',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'pricePerUnitQuantity' => 
    array (
      'name' => 'pricePerUnitQuantity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Enter the quantity of units for the item, based on the "PPU Unit of Measure" you selected. For example, a gallon of milk should be 128.  NOTE: Do not enter the price. ',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'hasPricePerUnit',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'PPU Quantity of Units',
      'group' => 'Compliance',
      'rank' => '84375',
      'dataType' => 'decimal',
      'totalDigits' => '16',
    ),
    'pricePerUnitUom' => 
    array (
      'name' => 'pricePerUnitUom',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The units that will be used to calculate the "Price Per Unit" for your product. For example, a gallon of milk has a "PPU Unit of Measure" of Fluid Ounces. NOTE: This may not be the Unit of Measure on the label.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'hasPricePerUnit',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Price Per Unit UOM',
      'group' => 'Compliance',
      'rank' => '84437',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Ounce',
        1 => 'Fluid Ounce',
        2 => 'Yard',
        3 => 'Square Foot',
        4 => 'Cubic Foot',
        5 => 'Foot',
        6 => 'Inch',
        7 => 'Pound',
        8 => 'Each',
      ),
    ),
    'baseColor' => 
    array (
      'name' => 'baseColor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Color of the base portion of the item, if it needs to be distinguished from other components.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Base Color',
      'group' => 'Additional Category Attributes',
      'rank' => '84500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'baseFinish' => 
    array (
      'name' => 'baseFinish',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The finish of a base component of an item, if it needs to be distinguished from another component. ',
      'requiredLevel' => 'Opitonal',
      'displayName' => 'Base Finish',
      'group' => 'Additional Category Attributes',
      'rank' => '84750',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'shadeMaterial' => 
    array (
      'name' => 'shadeMaterial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The material of a lampshade, to distinguish it from the rest of the lamp or other lighting product',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Shade Material',
      'group' => 'Additional Category Attributes',
      'rank' => '84875',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'shadeStyle' => 
    array (
      'name' => 'shadeStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Descriptive term for the shape of a lamp or other lighting product. Many terms are industry standard. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Shade Style',
      'group' => 'Additional Category Attributes',
      'rank' => '84937',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'collection' => 
    array (
      'name' => 'collection',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A collection is a particular group of items that have the same visual style, made by the same brand.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Collection',
      'group' => 'Additional Category Attributes',
      'rank' => '85000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'serviceCount' => 
    array (
      'name' => 'serviceCount',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of people that a set of dishes, glasses, flatware, etc. will serve. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Service Count',
      'group' => 'Additional Category Attributes',
      'rank' => '85250',
      'dataType' => 'decimal',
      'totalDigits' => '40',
    ),
    'meal' => 
    array (
      'name' => 'meal',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A meal that is normally tied to a particular time of day: breakfast, lunch, dinner, tea. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Meal',
      'group' => 'Additional Category Attributes',
      'rank' => '85375',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'frameColor' => 
    array (
      'name' => 'frameColor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The color of a frame component of a product, if it needs to be distinguished from other components. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Frame Color',
      'group' => 'Additional Category Attributes',
      'rank' => '85500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'slatWidth' => 
    array (
      'name' => 'slatWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The width of a slat component of a product, such as widow blinds. This measurement is distinguished from the width of the product itself. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Slat Width',
      'group' => 'Additional Category Attributes',
      'rank' => '85750',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'decimal',
          'totalDigits' => '40',
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
            1 => 'cm',
          ),
        ),
      ),
    ),
    'isSet' => 
    array (
      'name' => 'isSet',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the product consists of two or more different items sold together as a set. Example: A bedding set that includes sheets, pillow shams, and a comforter.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Set',
      'group' => 'Additional Category Attributes',
      'rank' => '86000',
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
      'group' => 'Additional Category Attributes',
      'rank' => '87000',
    ),
    'keywords' => 
    array (
      'name' => 'keywords',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Words that people would use to search for this item. Keywords can include synonyms and related terms.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Keywords',
      'group' => 'Additional Category Attributes',
      'rank' => '88000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'academicInstitution' => 
    array (
      'name' => 'academicInstitution',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Name of College or other school. This is to distinguish the school from its sports team. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Academic Institution',
      'group' => 'Additional Category Attributes',
      'rank' => '90500',
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
      'group' => 'Nice to Have',
      'rank' => '93000',
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
      'group' => 'Nice to Have',
      'rank' => '94000',
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
      'rank' => '95000',
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
                1 => 'size',
                2 => 'capacity',
                3 => 'pattern',
                4 => 'homeDecorStyle',
                5 => 'assembledProductLength',
                6 => 'assembledProductWidth',
                7 => 'assembledProductHeight',
                8 => 'bedSize',
                9 => 'material',
                10 => 'scent',
                11 => 'countPerPack',
                12 => 'count',
                13 => 'academicInstitution',
                14 => 'fabricColor',
                15 => 'capacity',
                16 => 'shape',
                17 => 'accentColor',
                18 => 'diameter',
                19 => 'fabricMaterialName',
                20 => 'baseColor',
                21 => 'baseFinish',
                22 => 'sportsTeam',
                23 => 'character',
                24 => 'finish',
                25 => 'monogramLetter',
                26 => 'threadCount',
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