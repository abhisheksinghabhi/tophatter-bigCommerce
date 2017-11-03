<?php return $arr = array (
  'Office' => 
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
    'size' => 
    array (
      'name' => 'size',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Overall dimensions of an item. Used only for products that do not already have a more specific \'x size\' attribute, such as ring size or clothing size. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Size',
      'group' => 'Discoverability',
      'rank' => '22000',
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
      'rank' => '23000',
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
    'material' => 
    array (
      'name' => 'material',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The main material(s) that a product is made of. This does not need to be an exhaustive list, but should contain the predominant or functionally important material/materials. Fabric material specifics should be entered using the "Fabric Content" attribute.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Material',
      'group' => 'Discoverability',
      'rank' => '24000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '25000',
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
      'group' => 'Discoverability',
      'rank' => '26000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'paperSize' => 
    array (
      'name' => 'paperSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The dimensions of the paper, using ISO 216, ANSI, or standard North American sizes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Paper Size',
      'group' => 'Discoverability',
      'rank' => '27000',
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
            1 => 'paperSize',
            2 => 'material',
            3 => 'countPerPack',
            4 => 'count',
            5 => 'numberOfSheets',
            6 => 'envelopeSize',
            7 => 'capacity',
            8 => 'shape',
            9 => 'sportsTeam',
            10 => 'size',
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
    'smallPartsWarnings' => 
    array (
      'name' => 'smallPartsWarnings',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'To determine if any choking warnings are applicable, check current product packaging for choking warning message(s). Please indicate the warning number (0-6). 0 - No warning applicable; 1 - Choking hazard is a small ball; 2 - Choking hazard contains small ball; 3 - Choking hazard contains small parts; 4 - Choking hazard balloon; 5 - Choking hazard is a marble; 6 - Choking hazard contains a marble.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Small Parts Warning Code',
      'group' => 'Compliance',
      'rank' => '42000',
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
      'rank' => '44000',
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
    'hasExpiration' => 
    array (
      'name' => 'hasExpiration',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Select Yes if product is labeled with any type of expiration or code date that indicates when product should no longer be consumed or no longer at best quality (e.g. Best If Used By,  Best By, Use By, etc. ). Some examples of items with expiration dates include food, cleaning supplies, beauty products, etc.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Expiration',
      'group' => 'Compliance',
      'rank' => '51000',
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
      'rank' => '53000',
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
      'rank' => '54000',
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
      'rank' => '55000',
      'dataType' => 'string',
      'maxLength' => '1000',
      'minLength' => '1',
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
      'rank' => '59500',
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
      'displayName' => 'Lighting Facts',
      'group' => 'Compliance',
      'rank' => '60750',
      'dataType' => 'anyURI',
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
      'rank' => '62000',
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
      'requiredLevel' => 'Optional',
      'displayName' => 'Shape',
      'group' => 'Additional Category Attributes',
      'rank' => '63000',
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
      'rank' => '64000',
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
      'group' => 'Additional Category Attributes',
      'rank' => '65000',
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
      'group' => 'Additional Category Attributes',
      'rank' => '66000',
    ),
    'compatibleDevices' => 
    array (
      'name' => 'compatibleDevices',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A list of the devices compatible with the item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Compatible Devices',
      'group' => 'Additional Category Attributes',
      'rank' => '67000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isPowered' => 
    array (
      'name' => 'isPowered',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that an item uses electricity, requiring a power cord or batteries to operate. Useful for items that have non-powered equivalents (e.g. toothbrushes).',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Powered',
      'group' => 'Additional Category Attributes',
      'rank' => '68000',
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
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isPowered',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Power Type',
      'group' => 'Additional Category Attributes',
      'rank' => '69000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'brightness' => 
    array (
      'name' => 'brightness',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Brightness per bulb measured in lumens.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Brightness',
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
            0 => 'lm',
          ),
        ),
      ),
    ),
    'dexterity' => 
    array (
      'name' => 'dexterity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates whether the item is designed to be used by the right or left hand.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Dexterity',
      'group' => 'Additional Category Attributes',
      'rank' => '71000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'systemOfMeasurement' => 
    array (
      'name' => 'systemOfMeasurement',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Name of the standard for a collection of units of measure that is used in for item. If appropriate, more than one measurement system can be entered. Example: Metric, and SEA for a set of wrenches that has both metric sockets and SEA sockets.',
      'requiredLevel' => 'Optional',
      'displayName' => 'System of Measurement',
      'group' => 'Additional Category Attributes',
      'rank' => '72000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'holeSize' => 
    array (
      'name' => 'holeSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates hole size in inches for paper, paper punches, and other paper products.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Hole Size',
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
            0 => 'in',
          ),
        ),
      ),
    ),
    'year' => 
    array (
      'name' => 'year',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates the calendar year used for the item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Year',
      'group' => 'Additional Category Attributes',
      'rank' => '74000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'calendarFormat' => 
    array (
      'name' => 'calendarFormat',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates what period of time the calendar uses.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Calendar Format',
      'group' => 'Additional Category Attributes',
      'rank' => '75000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'calendarTerm' => 
    array (
      'name' => 'calendarTerm',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates the length of time covered by the calendar.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Calendar Term',
      'group' => 'Additional Category Attributes',
      'rank' => '76000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'integer',
          'totalDigits' => '400',
        ),
        1 => 
        array (
          'name' => 'unit',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'months',
          ),
        ),
      ),
    ),
    'numberOfSheets' => 
    array (
      'name' => 'numberOfSheets',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates the number of paper sheets in items, like pads of paper. Also the number of sheets an office instrument can hold, such as paper punches or paper trays.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Number of Sheets',
      'group' => 'Additional Category Attributes',
      'rank' => '77000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'envelopeSize' => 
    array (
      'name' => 'envelopeSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The dimensions of the envelope, using ISO 269 or standard North American sizes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Envelope Size',
      'group' => 'Additional Category Attributes',
      'rank' => '78000',
      'dataType' => 'decimal',
      'totalDigits' => '12',
    ),
    'inkColor' => 
    array (
      'name' => 'inkColor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The ink color of pens, markers, ink pads, and other writing implements.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Ink Color',
      'group' => 'Additional Category Attributes',
      'rank' => '79000',
    ),
    'isRefillable' => 
    array (
      'name' => 'isRefillable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that the item is available in a container that is intended to be refilled and used again. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Refillable',
      'group' => 'Additional Category Attributes',
      'rank' => '80000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isRetractable' => 
    array (
      'name' => 'isRetractable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that the item can be withdrawn into a holder, as in a cord or leash.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Retractable',
      'group' => 'Additional Category Attributes',
      'rank' => '81000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isIndustrial' => 
    array (
      'name' => 'isIndustrial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that an item can be used in an industrial setting or has an industrial application.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Industrial',
      'group' => 'Additional Category Attributes',
      'rank' => '82000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isAntiglare' => 
    array (
      'name' => 'isAntiglare',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item has been specifically designed or treated to reduce the unwanted reflection of light from the sun or strong, internal lighting. Examples include screen protectors that have an anti-glare coating, and polarized sunglasses.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Antiglare',
      'group' => 'Additional Category Attributes',
      'rank' => '83000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isMagnetic' => 
    array (
      'name' => 'isMagnetic',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item has been designed to attract items made out of iron or steel, or is capable of holding magnets. Examples include a screwdriver with a magnetic tip, and a dry erase board that can accommodate magnetic pen holders.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Magnetic',
      'group' => 'Additional Category Attributes',
      'rank' => '84000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isTearResistant' => 
    array (
      'name' => 'isTearResistant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Selecting Y indicates the item has a material that is specifically designed or treated to withstand the effects of tearing. Important to consumers for a wide variety of products including mailing envelopes, garbage bags and pet bed covers. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Tear-Resistant',
      'group' => 'Additional Category Attributes',
      'rank' => '85000',
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
      'rank' => '86000',
    ),
    'hpprintercartridgeNumber' => 
    array (
      'name' => 'hpprintercartridgeNumber',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'For HP ink and toner cartridges made after 2007.',
      'requiredLevel' => 'Optional',
      'displayName' => 'HP Printer Cartridge Number',
      'group' => 'Additional Category Attributes',
      'rank' => '87000',
    ),
    'pencilLeadDiameter' => 
    array (
      'name' => 'pencilLeadDiameter',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Pencil lead size is the diameter of a  pencil lead, usually measured in millimeters. Used mostly in mechanical pencils.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Pencil Lead Diameter',
      'group' => 'Additional Category Attributes',
      'rank' => '144000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => '0.3mm',
            1 => '0.4mm',
            2 => '0.5mm',
            3 => '0.7mm',
            4 => '0.9mm',
            5 => '2mm',
            6 => '3.15mm',
            7 => '3mm',
            8 => '5.6mm',
            9 => '5mm',
          ),
        ),
        1 => 
        array (
          'name' => 'unit',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'mm',
          ),
        ),
      ),
    ),
    'tabCut' => 
    array (
      'name' => 'tabCut',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes the style and position of a file folder tab.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Tab Cut',
      'group' => 'Additional Category Attribtues',
      'rank' => '172500',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => '1/3 cut',
        1 => '1/5 cut',
        2 => '2/5 cut - right of center',
        3 => '2/5 cut - right position',
        4 => '1/2 cut',
        5 => 'undercut',
      ),
    ),
    'tabColor' => 
    array (
      'name' => 'tabColor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => ' The color of the tab portion of a file folder or divider.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Tab Color',
      'group' => 'Additional Category Attributes',
      'rank' => '186750',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isMadeFromRecycledMaterial' => 
    array (
      'name' => 'isMadeFromRecycledMaterial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that the item is made from recycled materials.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Made From Recycled Material',
      'group' => 'Nice to Have',
      'rank' => '201000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isLined' => 
    array (
      'name' => 'isLined',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates if the item contains a material lining on the interior.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Lined',
      'group' => 'Nice to Have',
      'rank' => '202000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'recycledMaterialContent' => 
    array (
      'name' => 'recycledMaterialContent',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If item contains reused/recycled material, the percentage of all recycled material used to produce the item. This can also include specific material composition; cushions made from 30% recycled cotton fabric. Used to highlight sustainability to the customer.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Recycled Material Content',
      'group' => 'Nice to Have',
      'rank' => '203000',
    ),
    'overallExpansion' => 
    array (
      'name' => 'overallExpansion',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The overall expansion capacity of a file jacket or folder, expressed in inches. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Overall Expansion',
      'group' => 'Additional Category Attributes ',
      'rank' => '205000',
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
            0 => 'inches',
          ),
        ),
      ),
    ),
    'paperClipSize' => 
    array (
      'name' => 'paperClipSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Paper clip size indicates the length of the paperclip and is expressed either as Jumbo or No. 1, No. 2, or No. 3.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Paper Clip Size',
      'group' => 'Additional Category Attributes',
      'rank' => '206000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Jumbo',
        1 => 'No. 1',
        2 => 'No. 2',
        3 => 'No. 3',
      ),
    ),
    'penPointSize' => 
    array (
      'name' => 'penPointSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The size of the pen\'s point based on the thickness of the line it leaves when rolled across paper, expressed in mm. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Pen Point Size',
      'group' => 'Additional Category Attributes',
      'rank' => '207000',
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
            0 => 'mm',
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
                1 => 'paperSize',
                2 => 'material',
                3 => 'countPerPack',
                4 => 'count',
                5 => 'numberOfSheets',
                6 => 'envelopeSize',
                7 => 'capacity',
                8 => 'shape',
                9 => 'sportsTeam',
                10 => 'size',
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