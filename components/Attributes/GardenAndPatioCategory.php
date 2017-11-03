<?php return $arr = array (
  'GrillsAndOutdoorCooking' => 
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
      'requiredLevel' => 'Optional',
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
    'finish' => 
    array (
      'name' => 'finish',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Terms describing the overall external treatment applied to the item. Typically finishes give a distinct appearance, texture or additional performance to the item. This attribute is used in a wide variety products and materials including wood, metal and fabric.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Finish',
      'group' => 'Discoverability',
      'rank' => '21000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'numberOfBurners' => 
    array (
      'name' => 'numberOfBurners',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of burners on a cooktop',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Burners',
      'group' => 'Discoverability',
      'rank' => '22000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'sideBurnerSize' => 
    array (
      'name' => 'sideBurnerSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Size of the grill side burner in square inches.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Side Burner Side',
      'group' => 'Discoverability',
      'rank' => '23000',
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
            0 => 'sq in',
          ),
        ),
      ),
    ),
    'hasSideShelf' => 
    array (
      'name' => 'hasSideShelf',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the grill has a utility shelf on the side of the main unit.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Has Side Shelf',
      'group' => 'Discoverability',
      'rank' => '24000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'hasCharcoalBasket' => 
    array (
      'name' => 'hasCharcoalBasket',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the grill has a charcoal basket.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Has Charcol Basket',
      'group' => 'Discoverability',
      'rank' => '25000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'hasTankTray' => 
    array (
      'name' => 'hasTankTray',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the grill has a tank tray.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Has Tank Tray',
      'group' => 'Discoverability',
      'rank' => '26000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'totalCookingArea' => 
    array (
      'name' => 'totalCookingArea',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Area available for cooking in square inches.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Total Cooking Area',
      'group' => 'Discoverability',
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
            0 => 'sq in',
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
      'rank' => '28000',
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
    'assembledProductWidth' => 
    array (
      'name' => 'assembledProductWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The width of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Assembled Product Width',
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
    'assembledProductWeight' => 
    array (
      'name' => 'assembledProductWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The weight of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Assembled Product Weight',
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
      'rank' => '36000',
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
      'rank' => '37000',
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
            0 => 'size',
            1 => 'color',
            2 => 'material',
            3 => 'finish',
            4 => 'pattern',
            5 => 'assembledProductLength',
            6 => 'assembledProductWidth',
            7 => 'assembledProductHeight',
            8 => 'capacity',
            9 => 'shape',
            10 => 'diameter',
            11 => 'sportsTeam',
            12 => 'countPerPack',
            13 => 'count',
            14 => 'homeDecorStyle',
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
      'rank' => '38000',
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
      'rank' => '42000',
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
      'rank' => '43000',
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
      'rank' => '47000',
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
    'isAssemblyRequired' => 
    array (
      'name' => 'isAssemblyRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Is product unassembled and must be put together before use?',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Assembly Required',
      'group' => 'Additional Category Attributes',
      'rank' => '63000',
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
      'rank' => '64000',
      'dataType' => 'anyURI',
    ),
    'isBulk' => 
    array (
      'name' => 'isBulk',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Intended for weighable or variably \'sized\' items where Vendor Pack Quantity (an integer value) is not all that helpful, for things like Fabric or Roving.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Bulk',
      'group' => 'Additional Category Attributes',
      'rank' => '65000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'maximumWeight' => 
    array (
      'name' => 'maximumWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The upper weight limit or capability of an item, often used in conjunction with "Minimum Weight". The meaning varies with context of product. For example, when used with "Minimum Weight", this attribute provides weight ranges for a range of products including pet medicine, baby carriers and outdoor play structures.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Maximum Weight',
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
            0 => 'lb',
            1 => 'kg',
            2 => 'oz',
            3 => 'g',
            4 => 'mg',
          ),
        ),
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
      'rank' => '68000',
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
      'rank' => '69000',
    ),
    'frameMaterial' => 
    array (
      'name' => 'frameMaterial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The material used in the item\'s frame if different than its main material makeup, which is described using the "Material" attribute.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Frame Material',
      'group' => 'Additional Category Attributes',
      'rank' => '70000',
    ),
    'isFoldable' => 
    array (
      'name' => 'isFoldable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that an item can be folded.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Foldable',
      'group' => 'Additional Category Attributes',
      'rank' => '71000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isWheeled' => 
    array (
      'name' => 'isWheeled',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that an item has wheels and can be rolled.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Wheeled',
      'group' => 'Additional Category Attributes',
      'rank' => '72000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isWeatherResistant' => 
    array (
      'name' => 'isWeatherResistant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been made or is marketed as being resistant to elements of weather, such as rain, wind or cold. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Weather-Resistant',
      'group' => 'Additional Category Attributes',
      'rank' => '73000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isWaterproof' => 
    array (
      'name' => 'isWaterproof',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been especially made to be resistant to water, to some degree.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Waterproof',
      'group' => 'Additional Category Attributes',
      'rank' => '74000',
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
      'requiredLevel' => 'Optional',
      'displayName' => 'Power Type',
      'group' => 'Additional Category Attributes',
      'rank' => '75000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'minimumTemperature' => 
    array (
      'name' => 'minimumTemperature',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The lower temperature limit or capability of an item such as a thermometer or chillers. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Minimum Temperature',
      'group' => 'Additional Category Attributes',
      'rank' => '76000',
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
            0 => 'ºF',
            1 => 'ºC',
            2 => 'ºK',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'BTU',
      'group' => 'Additional Category Attributes',
      'rank' => '77000',
    ),
    'flavor' => 
    array (
      'name' => 'flavor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The distinctive taste or flavor of the item, as provided by manufacturer. This is used for a wide variety of products, including food and beverages for both animals and humans. This may also apply to non-food items that come in flavors, including dental products, cigars and smoker wood chips.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Flavor',
      'group' => 'Additional Category Attributes',
      'rank' => '78000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'lifespan' => 
    array (
      'name' => 'lifespan',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Amount of time the product is expected to last, as specified by the manufacturer. Important selection criteria for comparing products such as light bulbs. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Lifespan',
      'group' => 'Additional Category Attributes',
      'rank' => '79000',
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
      'rank' => '79500',
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
      'rank' => '84000',
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
      'rank' => '85000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'installationType' => 
    array (
      'name' => 'installationType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Term describing the setting necessary to make an item ready to be used. For example, a grill that is designed for a built-in type installation.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Installation Type',
      'group' => 'Nice to Have',
      'rank' => '86000',
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
      'requiredLevel' => 'Optional',
      'displayName' => 'Age Group',
      'group' => 'Nice to Have',
      'rank' => '87000',
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
    'homeDecorStyle' => 
    array (
      'name' => 'homeDecorStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes home furnishings and decorations according to various themes, styles and tastes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Home Decor Style',
      'group' => 'Nice to Have',
      'rank' => '88000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isIndustrial' => 
    array (
      'name' => 'isIndustrial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that an item can be used in an industrial setting or has an industrial application.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Industrial',
      'group' => 'Nice to Have',
      'rank' => '90000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isEnergyStarCertified' => 
    array (
      'name' => 'isEnergyStarCertified',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicate Y if the product has been certified by the EPA Energy Star program.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Energy Star-Certified',
      'group' => 'Nice to Have',
      'rank' => '91000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'hasRadiantHeat' => 
    array (
      'name' => 'hasRadiantHeat',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates this item generates infrared heat as a feature. For example, outdoor grills that have an infrared unit that is designed to keep food juicer and provide more temperature control as compared with charcoal.  ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Radiant Heat',
      'group' => 'Nice to Have',
      'rank' => '93000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'flowRate' => 
    array (
      'name' => 'flowRate',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the volume of liquid per unit of time, intended for products like pumps, sprayers, showerheads, and irrigation regulators. Measured in gallons per minute.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Flow Rate',
      'group' => 'Nice to Have',
      'rank' => '94000',
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
            0 => 'gpm',
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
      'group' => 'Nice to Have',
      'rank' => '95000',
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
      'group' => 'Nice to Have',
      'rank' => '96000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'productVolume' => 
    array (
      'name' => 'productVolume',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The amount of material in the item’s package, expressed as a volume measurement. Important selection factor for items sold by volume such as bags of potting soil.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Product Volume',
      'group' => 'Nice to Have',
      'rank' => '97000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'cleaningCareAndMaintenance' => 
    array (
      'name' => 'cleaningCareAndMaintenance',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Description of how the item should be cleaned and maintained.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Cleaning, Care & Maintenance',
      'group' => 'Nice to Have',
      'rank' => '98000',
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
      'group' => 'Nice to Have',
      'rank' => '101000',
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
      'rank' => '102000',
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
      'rank' => '103000',
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
                0 => 'size',
                1 => 'color',
                2 => 'material',
                3 => 'finish',
                4 => 'pattern',
                5 => 'assembledProductLength',
                6 => 'assembledProductWidth',
                7 => 'assembledProductHeight',
                8 => 'capacity',
                9 => 'shape',
                10 => 'diameter',
                11 => 'sportsTeam',
                12 => 'countPerPack',
                13 => 'count',
                14 => 'homeDecorStyle',
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
  'GardenAndPatio' => 
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
      'requiredLevel' => 'Optional',
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
      'rank' => '15250',
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
      'rank' => '15675',
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
      'rank' => '15762',
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
    'finish' => 
    array (
      'name' => 'finish',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Terms describing the overall external treatment applied to the item. Typically finishes give a distinct appearance, texture or additional performance to the item. This attribute is used in a wide variety products and materials including wood, metal and fabric.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Finish',
      'group' => 'Discoverability',
      'rank' => '22000',
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
      'group' => 'Discoverability',
      'rank' => '23000',
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
      'rank' => '24000',
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
      'rank' => '25000',
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
    'assembledProductWidth' => 
    array (
      'name' => 'assembledProductWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The width of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Width',
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
    'assembledProductHeight' => 
    array (
      'name' => 'assembledProductHeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The height of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Height',
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
    'assembledProductWeight' => 
    array (
      'name' => 'assembledProductWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The weight of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Weight',
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
      'rank' => '33000',
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
      'rank' => '34000',
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
            0 => 'size',
            1 => 'color',
            2 => 'material',
            3 => 'finish',
            4 => 'pattern',
            5 => 'assembledProductLength',
            6 => 'assembledProductWidth',
            7 => 'assembledProductHeight',
            8 => 'capacity',
            9 => 'shape',
            10 => 'diameter',
            11 => 'sportsTeam',
            12 => 'countPerPack',
            13 => 'count',
            14 => 'homeDecorStyle',
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
      'rank' => '35000',
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
      'rank' => '39000',
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
      'rank' => '40000',
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
    'requiresTextileActLabeling' => 
    array (
      'name' => 'requiresTextileActLabeling',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Select "Y" if your item contains wool or is one of the following: clothing (except for hats and shoes), handkerchiefs, scarves, bedding (including sheets, covers, blankets, comforters, pillows, pillowcases, quilts, bedspreads and pads (but not outer coverings for mattresses or box springs)), curtains and casements, draperies, tablecloths, napkins, doilies, floor coverings (rugs, carpets and mats), towels, washcloths, dishcloths, ironing board covers and pads, umbrellas, parasols, bats or batting, flags with heading or that are bigger than 216 square inches, cushions, all fibers, yarns and fabrics (but not packaging ribbons), furniture slip covers and other furniture covers, afghans and throws, sleeping bags, antimacassars (doilies), hammocks, dresser and other furniture scarves. For further information on these requirements, refer to the labeling requirements of the Textile Act. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Requires Textile Act Labeling',
      'group' => 'Compliance',
      'rank' => '44000',
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
      'rank' => '45000',
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
      'rank' => '52000',
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
      'rank' => '53000',
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
      'rank' => '54000',
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
      'rank' => '59750',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
      'rank' => '60375',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
      'rank' => '61000',
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
      'rank' => '62000',
      'dataType' => 'anyURI',
    ),
    'isBulk' => 
    array (
      'name' => 'isBulk',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Intended for weighable or variably \'sized\' items where Vendor Pack Quantity (an integer value) is not all that helpful, for things like Fabric or Roving.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Bulk',
      'group' => 'Additional Category Attributes',
      'rank' => '63000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'maximumWeight' => 
    array (
      'name' => 'maximumWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The upper weight limit or capability of an item, often used in conjunction with "Minimum Weight". The meaning varies with context of product. For example, when used with "Minimum Weight", this attribute provides weight ranges for a range of products including pet medicine, baby carriers and outdoor play structures.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Maximum Weight',
      'group' => 'Additional Category Attributes',
      'rank' => '64000',
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
            0 => 'lb',
            1 => 'kg',
            2 => 'oz',
            3 => 'g',
            4 => 'mg',
          ),
        ),
      ),
    ),
    'coverageArea' => 
    array (
      'name' => 'coverageArea',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measured in square feet.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Coverage Area',
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
            0 => 'sq ft',
          ),
        ),
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
      'rank' => '66000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'season' => 
    array (
      'name' => 'season',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If designed to be used during a specific type of year, the appropriate season this item may be used.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Season',
      'group' => 'Additional Category Attributes',
      'rank' => '67000',
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
      'rank' => '68000',
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
      'rank' => '69000',
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
      'rank' => '70000',
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
      'rank' => '73000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'frameMaterial' => 
    array (
      'name' => 'frameMaterial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The material used in the item\'s frame if different than its main material makeup, which is described using the "Material" attribute.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Frame Material',
      'group' => 'Additional Category Attributes',
      'rank' => '74000',
    ),
    'baseMaterial' => 
    array (
      'name' => 'baseMaterial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Material of the base of an item (such as a pedestal table), if the base material needs to be distinguished from the rest of the item. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Base Material',
      'group' => 'Additional Category Attributes',
      'rank' => '74500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isAntique' => 
    array (
      'name' => 'isAntique',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Is the item a valuable collectable because of its age?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Antique',
      'group' => 'Additional Category Attributes',
      'rank' => '75000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isFoldable' => 
    array (
      'name' => 'isFoldable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that an item can be folded.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Foldable',
      'group' => 'Additional Category Attributes',
      'rank' => '76000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isWheeled' => 
    array (
      'name' => 'isWheeled',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that an item has wheels and can be rolled.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Wheeled',
      'group' => 'Additional Category Attributes',
      'rank' => '77000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isWeatherResistant' => 
    array (
      'name' => 'isWeatherResistant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been made or is marketed as being resistant to elements of weather, such as rain, wind or cold. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Weather-Resistant',
      'group' => 'Additional Category Attributes',
      'rank' => '78000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isWaterproof' => 
    array (
      'name' => 'isWaterproof',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been especially made to be resistant to water, to some degree.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Waterproof',
      'group' => 'Additional Category Attributes',
      'rank' => '79000',
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
      'rank' => '80000',
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
      'requiredLevel' => 'Optional',
      'displayName' => 'Power Type',
      'group' => 'Additional Category Attributes',
      'rank' => '81000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'lightBulbType' => 
    array (
      'name' => 'lightBulbType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Category of light bulb based on method to produce the light. Important to consumers because each type has different characteristics including bulb life, energy efficiency and color temperature. For example LED bulbs have a greater bulb life than equivalent incandescent bulbs.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Light Bulb Type',
      'group' => 'Additional Category Attributes',
      'rank' => '82000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'lightBulbColor' => 
    array (
      'name' => 'lightBulbColor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Color of the bulb, if it needs to be differentiated from a standard light bulb. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Light Bulb Color',
      'group' => 'Additional Category Attributes',
      'rank' => '82500',
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
      'rank' => '83000',
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
      'rank' => '84000',
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
    'minimumTemperature' => 
    array (
      'name' => 'minimumTemperature',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The lower temperature limit or capability of an item such as a thermometer or chillers. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Minimum Temperature',
      'group' => 'Additional Category Attributes',
      'rank' => '85000',
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
            0 => 'ºF',
            1 => 'ºC',
            2 => 'ºK',
          ),
        ),
      ),
    ),
    'plantCategory' => 
    array (
      'name' => 'plantCategory',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Common categories given to live plants and artificial plants based primarily on biological factors.  Allows selection of plants based on purpose and/ or visual effect. For example, consumers that wanted to compare live and artificial trees for their living room.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Plant Category',
      'group' => 'Additional Category Attributes',
      'rank' => '86000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '88500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'cuttingWidth' => 
    array (
      'name' => 'cuttingWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The width that a cutting machine, such as a lawn mower, creates along its cutting path.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Cutting Width',
      'group' => 'Additional Category Attributes',
      'rank' => '89750',
    ),
    'clearingWidth' => 
    array (
      'name' => 'clearingWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the width that a machine clears (rather than cleans). Typically applied to how wide a path a snow blowing machine clears. Clearing width and intake height determine how much snow the machine can take in.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Clearing Width',
      'group' => 'Additional Category Attributes',
      'rank' => '90375',
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
            1 => 'ft',
            2 => 'cm',
          ),
        ),
      ),
    ),
    'sprayPatterns' => 
    array (
      'name' => 'sprayPatterns',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The patterns of water spray from an adjustable shower head, nozzle, or similar. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Spray Patterns',
      'group' => 'Additional Category Attributes',
      'rank' => '90687',
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
      'group' => 'Additional Category Attributes',
      'rank' => '90843',
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
    'features' => 
    array (
      'name' => 'features',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'List notable features of the item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Additional Features',
      'group' => 'Nice to Have',
      'rank' => '91000',
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
      'rank' => '92000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'installationType' => 
    array (
      'name' => 'installationType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Term describing the setting necessary to make an item ready to be used. For example, a grill that is designed for a built-in type installation.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Installation Type',
      'group' => 'Nice to Have',
      'rank' => '93000',
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
      'requiredLevel' => 'Optional',
      'displayName' => 'Age Group',
      'group' => 'Nice to Have',
      'rank' => '94000',
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
    'homeDecorStyle' => 
    array (
      'name' => 'homeDecorStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes home furnishings and decorations according to various themes, styles and tastes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Home Decor Style',
      'group' => 'Nice to Have',
      'rank' => '95000',
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
      'group' => 'Nice to Have',
      'rank' => '96000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isIndustrial' => 
    array (
      'name' => 'isIndustrial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that an item can be used in an industrial setting or has an industrial application.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Industrial',
      'group' => 'Nice to Have',
      'rank' => '97000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isEnergyStarCertified' => 
    array (
      'name' => 'isEnergyStarCertified',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicate Y if the product has been certified by the EPA Energy Star program.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Energy Star-Certified',
      'group' => 'Nice to Have',
      'rank' => '98000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'hasRadiantHeat' => 
    array (
      'name' => 'hasRadiantHeat',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates this item generates infrared heat as a feature. For example, outdoor grills that have an infrared unit that is designed to keep food juicer and provide more temperature control as compared with charcoal.  ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Radiant Heat',
      'group' => 'Nice to Have',
      'rank' => '100000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'flowRate' => 
    array (
      'name' => 'flowRate',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the volume of liquid per unit of time, intended for products like pumps, sprayers, showerheads, and irrigation regulators. Measured in gallons per minute.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Flow Rate',
      'group' => 'Nice to Have',
      'rank' => '101000',
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
            0 => 'gpm',
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
      'group' => 'Nice to Have',
      'rank' => '102000',
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
      'group' => 'Nice to Have',
      'rank' => '103000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'productVolume' => 
    array (
      'name' => 'productVolume',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The amount of material in the item’s package, expressed as a volume measurement. Important selection factor for items sold by volume such as bags of potting soil.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Product Volume',
      'group' => 'Nice to Have',
      'rank' => '104000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'cleaningCareAndMaintenance' => 
    array (
      'name' => 'cleaningCareAndMaintenance',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Description of how the item should be cleaned and maintained.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Cleaning, Care & Maintenance',
      'group' => 'Nice to Have',
      'rank' => '105000',
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
      'group' => 'Nice to Have',
      'rank' => '108000',
    ),
    'flooringMaterial' => 
    array (
      'name' => 'flooringMaterial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If item has a floor, the substance the flooring is made of. For example, if a storage shed has a floor made out of plywood.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Flooring Material',
      'group' => 'Additional Category Attributes',
      'rank' => '110000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'minimumClearance' => 
    array (
      'name' => 'minimumClearance',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The measurement of clearance distance from the item to a specific reference point as specified by the manufacturer for safe operation and/or the capability of meeting building code requirements.  For example, certain types of awnings require a minimum of 8 inches of unobstructed vertical space as measured from the top of an egress door to any roof, eave or overhang',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Minimum Clearance',
      'group' => 'Additional Category Attributes',
      'rank' => '111000',
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
                0 => 'size',
                1 => 'color',
                2 => 'material',
                3 => 'finish',
                4 => 'pattern',
                5 => 'assembledProductLength',
                6 => 'assembledProductWidth',
                7 => 'assembledProductHeight',
                8 => 'capacity',
                9 => 'shape',
                10 => 'diameter',
                11 => 'sportsTeam',
                12 => 'countPerPack',
                13 => 'count',
                14 => 'homeDecorStyle',
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