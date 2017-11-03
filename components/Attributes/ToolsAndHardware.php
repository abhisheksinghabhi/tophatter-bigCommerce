<?php return $arr = array (
  'BuildingSupply' => 
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
    'material' => 
    array (
      'name' => 'material',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The main material(s) that a product is made of. This does not need to be an exhaustive list, but should contain the predominant or functionally important material/materials. Fabric material specifics should be entered using the "Fabric Content" attribute.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Material',
      'group' => 'Discoverability',
      'rank' => '20000',
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
      'group' => 'Discoverability',
      'rank' => '21000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Brand License',
      'group' => 'Discoverability',
      'rank' => '22000',
    ),
    'coverageArea' => 
    array (
      'name' => 'coverageArea',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measured in square feet.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Coverage Area',
      'group' => 'Discoverability',
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
            0 => 'sq ft',
          ),
        ),
      ),
    ),
    'form' => 
    array (
      'name' => 'form',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes the way the item is dispensed or consumed, including its texture or other physical characteristics.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Form',
      'group' => 'Discoverability',
      'rank' => '26000',
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
      'rank' => '27000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'paintFinish' => 
    array (
      'name' => 'paintFinish',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Term to describe the paint\'s sheen when dry. Important selection factor that affects paint\'s shininess and durability. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Paint Finish',
      'group' => 'Discoverability',
      'rank' => '28000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'recommendedSurfaces' => 
    array (
      'name' => 'recommendedSurfaces',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The surfaces that a product is marketed for, or meant to be compatible with.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Recommended Surfaces',
      'group' => 'Discoverability',
      'rank' => '29000',
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
      'rank' => '30000',
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
    'assembledProductWidth' => 
    array (
      'name' => 'assembledProductWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The width of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Width',
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
    'assembledProductHeight' => 
    array (
      'name' => 'assembledProductHeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The height of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Height',
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
    'assembledProductWeight' => 
    array (
      'name' => 'assembledProductWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The weight of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Weight',
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
            0 => 'oz',
            1 => 'lb',
            2 => 'g',
            3 => 'kg',
          ),
        ),
      ),
    ),
    'rollLength' => 
    array (
      'name' => 'rollLength',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'For products that are packaged on a roll, the measurement of the length of the product.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Roll Length',
      'group' => 'Dimensions',
      'rank' => '36000',
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
            0 => 'in',
            1 => 'ft',
          ),
        ),
      ),
    ),
    'thickness' => 
    array (
      'name' => 'thickness',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the dimension between two surfaces. Thickness is an important feature for strength, fit and use. For example, 1/2 inch thick plywood is commonly used for walls, 3/4 inch for floors.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Thickness',
      'group' => 'Dimensions',
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
            0 => 'in',
            1 => 'mil',
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
      'rank' => '37000',
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
      'rank' => '38000',
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
            1 => 'finish',
            2 => 'grade',
            3 => 'countPerPack',
            4 => 'count',
            5 => 'volts',
            6 => 'amps',
            7 => 'watts',
            8 => 'workingLoadLimit',
            9 => 'gallonsPerMinute',
            10 => 'size',
            11 => 'assembledProductLength',
            12 => 'assembledProductWidth',
            13 => 'assembledProductHeight',
            14 => 'shape',
            15 => 'lightBulbType',
            16 => 'mountType',
            17 => 'baseColor',
            18 => 'baseFinish',
            19 => 'sportsTeam',
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
      'rank' => '39000',
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
      'rank' => '43000',
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
      'rank' => '44000',
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
      'rank' => '48000',
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
      'rank' => '49000',
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
      'rank' => '50000',
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
      'rank' => '59000',
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
      'rank' => '59500',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
      'rank' => '59750',
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
      'rank' => '59875',
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
      'rank' => '59937',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'accessoriesIncluded' => 
    array (
      'name' => 'accessoriesIncluded',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Listing of any supplementary items that come with the product. Important information for consumers because accessories typically provide additional convenience, utility, attractiveness or safety to or for a product. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Accessories Included',
      'group' => 'Additional Category Attributes',
      'rank' => '60000',
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
      'rank' => '61000',
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
      'rank' => '62000',
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
    'doorOpeningStyle' => 
    array (
      'name' => 'doorOpeningStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The type of door-opening motion.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Door Opening Style',
      'group' => 'Additional Category Attributes',
      'rank' => '62500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '63000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isFireResistant' => 
    array (
      'name' => 'isFireResistant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been especially made to resist burning under certain conditions, as specified by the manufacturer. An important feature for products such as fire blankets, building materials, and safes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Fire-Resistant',
      'group' => 'Additional Category Attributes',
      'rank' => '66000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
    'isMadeFromSustainableMaterials' => 
    array (
      'name' => 'isMadeFromSustainableMaterials',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item is manufactured using methods and materials that support sustainable renewal and do not completely use up or destroy natural resources. Examples of materials that are considered sustainable include bamboo, cork, and natural wool fiber. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Made From Sustainable Materials',
      'group' => 'Additional Category Attributes',
      'rank' => '73000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isMadeFromReclaimedMaterials' => 
    array (
      'name' => 'isMadeFromReclaimedMaterials',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item is made from material that was diverted from disposal as waste. For example, reclaimed flooring that is made from structural beams that have been salvaged and milled.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Made From Reclaimed Materials',
      'group' => 'Additional Category Attributes',
      'rank' => '74000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isMadeFromRecycledMaterial' => 
    array (
      'name' => 'isMadeFromRecycledMaterial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that the item is made from recycled materials.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Made From Recycled Material',
      'group' => 'Additional Category Attributes',
      'rank' => '75000',
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
      'group' => 'Additional Category Attributes',
      'rank' => '76000',
    ),
    'hasLowEmissivity' => 
    array (
      'name' => 'hasLowEmissivity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item is specially manufactured and rated to emit low levels of radiant heat. Typically a feature for building materials such as Low-E insulation and glass that have special reflective coatings.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Low Emissivity',
      'group' => 'Additional Category Attributes',
      'rank' => '79000',
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
    'isEnergyStarCertified' => 
    array (
      'name' => 'isEnergyStarCertified',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicate Y if the product has been certified by the EPA Energy Star program.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Energy Star-Certified',
      'group' => 'Additional Category Attributes',
      'rank' => '84000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'pileHeight' => 
    array (
      'name' => 'pileHeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The thickness of the carpet measured from the surface to its backing. Important selection factor for consumers because pile height affects a carpet’s insulation properties, ease of maintenance, and appearance.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Pile Height',
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
            0 => 'in',
          ),
        ),
      ),
    ),
    'grade' => 
    array (
      'name' => 'grade',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The industry designation based on characteristics such quality, size and appearance. Attribute used for a wide variety of products including building materials. Important selection criteria for consumers based on budget and use. For example for structural framing lumber, grade is an indicator of strength and working properties.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Grade',
      'group' => 'Additional Category Attributes',
      'rank' => '86000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'fineness' => 
    array (
      'name' => 'fineness',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A measure of the size of aggregate in the product. Important selection criteria for various construction uses. For example, sand with a fineness modulus of greater than 3.2 is not recommended for making good concrete.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Fineness',
      'group' => 'Additional Category Attributes',
      'rank' => '87000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isOdorless' => 
    array (
      'name' => 'isOdorless',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item does not have an odor or smell. Used for products that typically have an odor. Consumers often prefer odorless versions of products including paints, solvents, and lamp oils.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Odorless',
      'group' => 'Additional Category Attributes',
      'rank' => '88000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'vocLevel' => 
    array (
      'name' => 'vocLevel',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The percent of Volatile Organic Compounds included in the product. Typical products include solvents, paints, and cleaning supplies. Attribute enables consumers with health concerns to select products with low VOC levels.',
      'requiredLevel' => 'Optional',
      'displayName' => 'VOC Level',
      'group' => 'Additional Category Attributes',
      'rank' => '88500',
      'dataType' => 'decimal',
      'totalDigits' => '16',
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
      'rank' => '93000',
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
      'rank' => '94000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'dryTime' => 
    array (
      'name' => 'dryTime',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Amount of time that it takes for an application of this product to dry, as specified by the manufacturer.	',
      'requiredLevel' => 'Optional',
      'displayName' => 'Dry Time',
      'group' => 'Nice to Have',
      'rank' => '96000',
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
            0 => 'h',
            1 => 'min',
          ),
        ),
      ),
    ),
    'isPrefinished' => 
    array (
      'name' => 'isPrefinished',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates item has been treated or coated by the manufacturer. Used for items such as hardwood flooring that have unfinished equivalents.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Prefinished',
      'group' => 'Nice to Have',
      'rank' => '97000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isReadyToUse' => 
    array (
      'name' => 'isReadyToUse',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates product does not need additional preparation as compared to product counterparts. For example, a paint that does not need thinner added before use.  ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Ready-to-Use',
      'group' => 'Nice to Have',
      'rank' => '98000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isFastSetting' => 
    array (
      'name' => 'isFastSetting',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the product is specifically manufactured to require less time to set as compared to equivalent products. For example, a fast-setting concrete that sets up or hardens in 20-40 minutes as compared to other types of concrete that require several days to harden.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Fast Setting',
      'group' => 'Nice to Have',
      'rank' => '99000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isMoldResistant' => 
    array (
      'name' => 'isMoldResistant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the product is specifically manufactured to resist the growth of mold. For example, building materials such as drywall that are certified to be mold resistant based on specific tests.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Mold-Resistant',
      'group' => 'Nice to Have',
      'rank' => '100000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isCombustible' => 
    array (
      'name' => 'isCombustible',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the manufacturer has specified that the substance (usually a liquid) is combustible and has the potential to ignite. Combustible items have a flash point between 100-200 degrees F and pose a potential safety hazard. Examples of products that are classified as flammable include some paints, solvents, and petroleum products. Note: If product is labeled as Flammable (has a flashpoint of less than 100 degrees F) item should be identified as Flammable vs. Combustible.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Combustible',
      'group' => 'Nice to Have',
      'rank' => '101000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isFlammable' => 
    array (
      'name' => 'isFlammable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been especially made to resist burning under certain conditions, as specified by the manufacturer. An important feature for products such as fire blankets, building materials, and safes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Flammable',
      'group' => 'Nice to Have',
      'rank' => '102000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isBiodegradable' => 
    array (
      'name' => 'isBiodegradable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the product is specifically manufactured to have the capability of decomposed by bacteria or other living organisms. Used to identify this characteristic as a feature. Examples of products that have biodegradable versions include paint thinners and cleaning solvents.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Biodegradable',
      'group' => 'Nice to Have',
      'rank' => '103000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isWaterSoluble' => 
    array (
      'name' => 'isWaterSoluble',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the product can be dissolved in or by water.  Used to identify a product for which water solubility would be a feature. For example, for ease of cleanup, consumers prefer wall paint that is water soluble.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Water Soluble',
      'group' => 'Nice to Have',
      'rank' => '104000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'peiRating' => 
    array (
      'name' => 'peiRating',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The (Porcelain Enamel Institute) category rating that measures the hardness and durability of tile. Important for determination for appropriate use because not all tiles can be used for all areas.  For example, PEI 1 tiles are more susceptible to wear and are therefore suitable for walls vs. PEI 5 tiles that are more resistant to abrasion and used for high-traffic floor areas.',
      'requiredLevel' => 'Optional',
      'displayName' => 'PEI Rating',
      'group' => 'Nice to Have',
      'rank' => '105000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'carpetStyle' => 
    array (
      'name' => 'carpetStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Common retail term describing the construction of the carpet based on treatment of the pile (loop pile, cut pile, or cut and loop pile). Used primarily for wall-to-wall carpet vs area rugs.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Carpet Style',
      'group' => 'Nice to Have',
      'rank' => '106000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'acRating' => 
    array (
      'name' => 'acRating',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Represents a laminate\'s resistance to abrasion, impact, stains and cigarette burns. AC ratings also indicate that the product has been tested for the effects of furniture legs, castors and swelling along its edges. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'AC Rating',
      'group' => 'Nice to Have',
      'rank' => '108000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'AC1',
        1 => 'AC2',
        2 => 'AC3',
        3 => 'AC4',
        4 => 'AC5',
      ),
    ),
    'snowLoadRating' => 
    array (
      'name' => 'snowLoadRating',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The capability of the item such as a roof or awning to hold a live load due to the weight of snow on a surface. Value based a number of variables as specified by the manufacturer.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Snow Load Rating',
      'group' => 'Nice to Have',
      'rank' => '109000',
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
            0 => 'psf',
            1 => 'psi',
          ),
        ),
      ),
    ),
    'doorStyle' => 
    array (
      'name' => 'doorStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Descriptive term referring to the overall appearance or design of a door or doors as a component of an item such as the doors of cabinets, vanities, and storage sheds.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Door Style',
      'group' => 'Additional Category Attributes',
      'rank' => '111000',
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
                1 => 'finish',
                2 => 'grade',
                3 => 'countPerPack',
                4 => 'count',
                5 => 'volts',
                6 => 'amps',
                7 => 'watts',
                8 => 'workingLoadLimit',
                9 => 'gallonsPerMinute',
                10 => 'size',
                11 => 'assembledProductLength',
                12 => 'assembledProductWidth',
                13 => 'assembledProductHeight',
                14 => 'shape',
                15 => 'lightBulbType',
                16 => 'mountType',
                17 => 'baseColor',
                18 => 'baseFinish',
                19 => 'sportsTeam',
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
  'Electrical' => 
  array (
    'lightBulbShape' => 
    array (
      'name' => 'lightBulbShape',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Common industry recognized terms describing shapes of light bulbs.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Light Bulb Shape',
      'group' => 'Nice to Have',
      'rank' => 'None',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Flame',
        1 => 'Spiral',
        2 => 'Twist',
        3 => 'Bullet',
        4 => 'Flicker',
        5 => 'A-Line',
        6 => 'A-Line Spiral',
        7 => 'Tubular',
        8 => 'Reflector',
        9 => 'Linear',
        10 => 'Globe Mini',
        11 => 'Twist',
        12 => 'Candle',
        13 => 'U-Shape',
        14 => 'Circline',
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
    'material' => 
    array (
      'name' => 'material',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The main material(s) that a product is made of. This does not need to be an exhaustive list, but should contain the predominant or functionally important material/materials. Fabric material specifics should be entered using the "Fabric Content" attribute.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Material',
      'group' => 'Discoverability',
      'rank' => '20000',
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
      'group' => 'Discoverability',
      'rank' => '21000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Brand License',
      'group' => 'Discoverability',
      'rank' => '22000',
    ),
    'homeDecorStyle' => 
    array (
      'name' => 'homeDecorStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes home furnishings and decorations according to various themes, styles and tastes.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Home Decor Style',
      'group' => 'Discoverability',
      'rank' => '23000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Brightness',
      'group' => 'Discoverability',
      'rank' => '24000',
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
    'powerType' => 
    array (
      'name' => 'powerType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Provides information on the exact type of power used by the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Power Type',
      'group' => 'Discoverability',
      'rank' => '25000',
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
      'rank' => '26000',
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
            0 => 'color',
            1 => 'finish',
            2 => 'grade',
            3 => 'countPerPack',
            4 => 'count',
            5 => 'volts',
            6 => 'amps',
            7 => 'watts',
            8 => 'workingLoadLimit',
            9 => 'gallonsPerMinute',
            10 => 'size',
            11 => 'assembledProductLength',
            12 => 'assembledProductWidth',
            13 => 'assembledProductHeight',
            14 => 'shape',
            15 => 'lightBulbType',
            16 => 'mountType',
            17 => 'baseColor',
            18 => 'baseFinish',
            19 => 'sportsTeam',
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
    'hasWarranty' => 
    array (
      'name' => 'hasWarranty',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item comes with a warranty. If an item has a warranty, then enter EITHER the warranty URL or the warranty text in the appropriate field.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Warranty',
      'group' => 'Compliance',
      'rank' => '44000',
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
      'rank' => '45000',
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
      'rank' => '46000',
      'dataType' => 'string',
      'maxLength' => '1000',
      'minLength' => '1',
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
      'rank' => '54500',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
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
      'group' => 'Additional Category Attributes',
      'rank' => '56000',
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
      'group' => 'Additional Category Attributes',
      'rank' => '57000',
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
      'displayName' => 'Is Energy Star-Certified',
      'group' => 'Additional Category Attributes',
      'rank' => '58000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'maximumEnergySurgeRating' => 
    array (
      'name' => 'maximumEnergySurgeRating',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The maximum amount of energy that a device such as a surge protector can absorb before it fails; measured in joules.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Maximum Energy Surge Rating',
      'group' => 'Additional Category Attributes',
      'rank' => '59000',
    ),
    'estimatedEnergyCostPerYear' => 
    array (
      'name' => 'estimatedEnergyCostPerYear',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The estimated cost per year, based on 3 hrs/day, 11 cents/kWh.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Estimated Energy Cost Per Year',
      'group' => 'Additional Category Attributes',
      'rank' => '60000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'decimal',
          'totalDigits' => '15',
        ),
        1 => 
        array (
          'name' => 'unit',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 'USD',
          ),
        ),
      ),
    ),
    'compatibleConduitSizes' => 
    array (
      'name' => 'compatibleConduitSizes',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'compatibleConduitSize',
          'maxOccurs' => 'unbounded',
          'minOccurs' => '1',
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
      ),
    ),
    'volts' => 
    array (
      'name' => 'volts',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of volts the product produces or requires. The significance of voltage varies with type of product. For example, if product is an appliance, used to describe the outlet voltage required. If an item (such as a power supply) both produces and requires different voltages, each type of voltage should be included.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Volts',
      'group' => 'Additional Category Attributes',
      'rank' => '62000',
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
    'amps' => 
    array (
      'name' => 'amps',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of amps as a measure of electrical current draw. For products such as appliances, amps are usually specified as a peak value to help consumers select items that not overload household circuits. Also used as a measure of capacity (trip level) for electrical products such as circuit breakers and fuses',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Amps',
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
            0 => 'A',
            1 => 'mA',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Watts',
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
            0 => 'W',
            1 => 'kW',
          ),
        ),
      ),
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
      'rank' => '64500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'numberOfLights' => 
    array (
      'name' => 'numberOfLights',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of lights included in an electrical, home decor, or seasonal decoration. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Lights',
      'group' => 'Additional Category Attributes',
      'rank' => '64750',
      'dataType' => 'integer',
      'totalDigits' => '40',
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
      'rank' => '64875',
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
      'rank' => '64937',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'accessoriesIncluded' => 
    array (
      'name' => 'accessoriesIncluded',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Listing of any supplementary items that come with the product. Important information for consumers because accessories typically provide additional convenience, utility, attractiveness or safety to or for a product. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Accessories Included',
      'group' => 'Additional Category Attributes',
      'rank' => '65000',
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
      'rank' => '66000',
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
      'rank' => '67000',
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
    'baseColor' => 
    array (
      'name' => 'baseColor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Color of the base portion of the item, if it needs to be distinguished from other components.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Base Color',
      'group' => 'Additional Category Attributes',
      'rank' => '67500',
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
      'rank' => '67750',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '68000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isFireResistant' => 
    array (
      'name' => 'isFireResistant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been especially made to resist burning under certain conditions, as specified by the manufacturer. An important feature for products such as fire blankets, building materials, and safes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Fire-Resistant',
      'group' => 'Additional Category Attributes',
      'rank' => '71000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
      'rank' => '72000',
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
      'rank' => '73000',
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
      'rank' => '75500',
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
    'conductorMaterial' => 
    array (
      'name' => 'conductorMaterial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A substance that conducts electrical current very easily.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Conductor Material',
      'group' => 'Additional Category Attributes',
      'rank' => '76750',
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
      'rank' => '78000',
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
      'rank' => '79000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'lightBulbBaseType' => 
    array (
      'name' => 'lightBulbBaseType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Designation that corresponds to the method and size of attachment used to connect the light bulb to the lamp. Important criteria to help consumers select bulbs that will fit their lighting fixtures and devices. For example, the E12 is an Edison screw-mount “candelabra” base, with a 12 mm diameter base and is used for many night lights.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Light Bulb Base Code',
      'group' => 'Nice to Have',
      'rank' => '80000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => '2G11',
        1 => '2G7',
        2 => '2GX13',
        3 => '2GX7',
        4 => 'BA15d',
        5 => 'BA15s',
        6 => 'E10',
        7 => 'E11',
        8 => 'E12',
        9 => 'E14',
        10 => 'E17',
        11 => 'E26',
        12 => 'E27',
        13 => 'E39',
        14 => 'E40',
        15 => 'E5',
        16 => 'EX39',
        17 => 'G-23',
        18 => 'G-23-2',
        19 => 'G10q',
        20 => 'G12',
        21 => 'G24d-1',
        22 => 'G24d-2',
        23 => 'G24d-3',
        24 => 'G24q-1',
        25 => 'G24q-2',
        26 => 'G24q-3',
        27 => 'G24q-4',
        28 => 'G24q-5',
        29 => 'G4',
        30 => 'GU4',
        31 => 'G9',
        32 => 'GU10',
        33 => 'GU24',
        34 => 'GU5.3',
        35 => 'GU6.35',
        36 => 'GU8',
        37 => 'GX10q4',
        38 => 'GX23-2',
        39 => 'GX32d-2',
        40 => 'GX32d-3',
        41 => 'GY6.35',
        42 => 'GY8.6',
        43 => 'R7',
        44 => 'R7s',
        45 => 'S14s',
        46 => 'SC',
      ),
    ),
    'electricalBallastFactor' => 
    array (
      'name' => 'electricalBallastFactor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The ratio of the lumen output of a lamp to the lumen output of the same lamp connected to a reference ballast as per ANSI test procedures and as specified by the manufacturer of the lamp. Measures the relationship between the ballast, which is designed to limit the amount of current in the electrical circuit, and the lamp.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Electrical Ballast Factor',
      'group' => 'Nice to Have',
      'rank' => '84000',
    ),
    'beamAngle' => 
    array (
      'name' => 'beamAngle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The angle that corresponds to point at which the intensity of a source drops to 50% of maximum (center reading) measured in degrees of the full angle. Used as a component of light performance in products such as headlights and security lights.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Beam Angle',
      'group' => 'Nice to Have',
      'rank' => '85000',
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
            0 => 'º',
          ),
        ),
      ),
    ),
    'beamSpread' => 
    array (
      'name' => 'beamSpread',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the spread of light from a reflectorized light source.  The width of the beam spread is typically specified by the manufacturer for a certain beam angle, as measured from a given distance. For example, a light with a beam angle of 20 degrees that has a 1.8 foot beam spread from 5 feet away. Feature used by consumers as an indicator of performance for products such as headlights and security lights.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Beam Spread',
      'group' => 'Nice to Have',
      'rank' => '86000',
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
          ),
        ),
      ),
    ),
    'horsepower' => 
    array (
      'name' => 'horsepower',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the power of the device. Significance of horsepower varies with type of product. For example, for products with engines, horsepower is a general indicator of an engine\'s size and power (along with other engine specifications of engine displacement and torque). Horsepower is also used as common rating on electric motors and products that contain them.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Horsepower',
      'group' => 'Nice to Have',
      'rank' => '87000',
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
            0 => 'HP',
          ),
        ),
      ),
    ),
    'isDarkSkyCompliant' => 
    array (
      'name' => 'isDarkSkyCompliant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been certified by the International Dark-Sky Association and incorporates features to reduce light pollution (which reduces the number of stars visible at night), and energy consumption. For example, dark sky compliant lights minimize glare and direct light down. For more information, go to http://darksky.org/fsa/.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Dark Sky-Compliant',
      'group' => 'Nice to Have',
      'rank' => '88000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'colorTemperature' => 
    array (
      'name' => 'colorTemperature',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Light color is measured on a temperature scale referred to as Kelvin (K).',
      'requiredLevel' => 'Optional',
      'displayName' => 'Color Temperature',
      'group' => 'Nice to Have',
      'rank' => '89000',
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
            0 => 'K',
          ),
        ),
      ),
    ),
    'decibelRating' => 
    array (
      'name' => 'decibelRating',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement, expressed as decibels, of the intensity of sound volume a device produces. Important selection criteria for consumers concerned with effects of products that generate loud noise levels. Attribute applied to such products as power tools and security alarms.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Decibel Rating',
      'group' => 'Nice to Have',
      'rank' => '91000',
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
            0 => 'dB',
          ),
        ),
      ),
    ),
    'maximumRange' => 
    array (
      'name' => 'maximumRange',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the maximum area a device can accommodate. Attribute applied to products such as light, motion, and sound sensors.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Maximum Range',
      'group' => 'Nice to Have',
      'rank' => '92000',
    ),
    'numberOfGangs' => 
    array (
      'name' => 'numberOfGangs',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of individual electrical components that can fit in this product. If product is a light switch, refers to the number of rows of switches on the same base-plate. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Number of Gangs',
      'group' => 'Nice to Have',
      'rank' => '93000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'numberOfPoles' => 
    array (
      'name' => 'numberOfPoles',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of poles contained in electrical distribution equipment. For example, residential circuit breakers can be single or double-pole',
      'requiredLevel' => 'Optional',
      'displayName' => 'Number of Poles',
      'group' => 'Nice to Have',
      'rank' => '94000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'responseTime' => 
    array (
      'name' => 'responseTime',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The amount of time the pixels in the display take to change from one state to another. Measured in milliseconds.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Response Time',
      'group' => 'Nice to Have',
      'rank' => '95000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'decimal',
          'totalDigits' => '12',
        ),
        1 => 
        array (
          'name' => 'unit',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'string',
          'optionValues' => 
          array (
            0 => 's',
          ),
        ),
      ),
    ),
    'americanWireGauge' => 
    array (
      'name' => 'americanWireGauge',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of how large a wire is, either in diameter or cross sectional area. Applicable to both electrical non-electrical wires, and to structural cable. Used to indicate electrical characteristics or strength. Measurement is expressed using American wire gauge (AWG) standard. As the wire gauge number increases, the wire diameter decreases. AWG of 12 is a smaller diameter than AWG of 6.',
      'requiredLevel' => 'Optional',
      'displayName' => 'American Wire Gauge',
      'group' => 'Nice to Have',
      'rank' => '96000',
    ),
    'mountType' => 
    array (
      'name' => 'mountType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'How the item is attached. Used for products such as shelving and fixture hardware.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Mount Type',
      'group' => 'Nice to Have',
      'rank' => '97000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isRatedForOutdoorUse' => 
    array (
      'name' => 'isRatedForOutdoorUse',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item has been specifically rated by the manufacture for outdoor use. Used for products that also have indoor versions. For electrical equipment, suitability for outdoor use is often related to its IP (Ingress Protection) rating.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Rated for Outdoor Use',
      'group' => 'Nice to Have',
      'rank' => '98000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'lifespan' => 
    array (
      'name' => 'lifespan',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Amount of time the product is expected to last, as specified by the manufacturer. Important selection criteria for comparing products such as light bulbs. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Lifespan',
      'group' => 'Nice to Have',
      'rank' => '99000',
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
      'rank' => '100000',
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
      'rank' => '101000',
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
      'rank' => '102000',
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
                0 => 'color',
                1 => 'finish',
                2 => 'grade',
                3 => 'countPerPack',
                4 => 'count',
                5 => 'volts',
                6 => 'amps',
                7 => 'watts',
                8 => 'workingLoadLimit',
                9 => 'gallonsPerMinute',
                10 => 'size',
                11 => 'assembledProductLength',
                12 => 'assembledProductWidth',
                13 => 'assembledProductHeight',
                14 => 'shape',
                15 => 'lightBulbType',
                16 => 'mountType',
                17 => 'baseColor',
                18 => 'baseFinish',
                19 => 'sportsTeam',
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
  'Hardware' => 
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
    'material' => 
    array (
      'name' => 'material',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The main material(s) that a product is made of. This does not need to be an exhaustive list, but should contain the predominant or functionally important material/materials. Fabric material specifics should be entered using the "Fabric Content" attribute.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Material',
      'group' => 'Discoverability',
      'rank' => '20000',
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
      'group' => 'Discoverability',
      'rank' => '21000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Brand License',
      'group' => 'Discoverability',
      'rank' => '22000',
    ),
    'homeDecorStyle' => 
    array (
      'name' => 'homeDecorStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes home furnishings and decorations according to various themes, styles and tastes.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Home Decor Style',
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
    'mountType' => 
    array (
      'name' => 'mountType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'How the item is attached. Used for products such as shelving and fixture hardware.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Mount Type',
      'group' => 'Discoverability',
      'rank' => '25000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'threadStandard' => 
    array (
      'name' => 'threadStandard',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Name of the standard used to specify the thread characteristics for such items as screws and threaded pipes. For example, the NPT standard is used for threaded electrical conduits.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Thread Standard',
      'group' => 'Discoverability',
      'rank' => '26000',
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
            1 => 'finish',
            2 => 'grade',
            3 => 'countPerPack',
            4 => 'count',
            5 => 'volts',
            6 => 'amps',
            7 => 'watts',
            8 => 'workingLoadLimit',
            9 => 'gallonsPerMinute',
            10 => 'size',
            11 => 'assembledProductLength',
            12 => 'assembledProductWidth',
            13 => 'assembledProductHeight',
            14 => 'shape',
            15 => 'lightBulbType',
            16 => 'mountType',
            17 => 'baseColor',
            18 => 'baseFinish',
            19 => 'sportsTeam',
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
    'hasWarranty' => 
    array (
      'name' => 'hasWarranty',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item comes with a warranty. If an item has a warranty, then enter EITHER the warranty URL or the warranty text in the appropriate field.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Warranty',
      'group' => 'Compliance',
      'rank' => '45000',
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
      'rank' => '46000',
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
      'rank' => '47000',
      'dataType' => 'string',
      'maxLength' => '1000',
      'minLength' => '1',
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
      'rank' => '53000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'accessoriesIncluded' => 
    array (
      'name' => 'accessoriesIncluded',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Listing of any supplementary items that come with the product. Important information for consumers because accessories typically provide additional convenience, utility, attractiveness or safety to or for a product. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Accessories Included',
      'group' => 'Additional Category Attributes',
      'rank' => '57000',
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
      'rank' => '58000',
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
      'rank' => '59000',
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
    'isWaterproof' => 
    array (
      'name' => 'isWaterproof',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been especially made to be resistant to water, to some degree.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Waterproof',
      'group' => 'Additional Category Attributes',
      'rank' => '60000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isFireResistant' => 
    array (
      'name' => 'isFireResistant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been especially made to resist burning under certain conditions, as specified by the manufacturer. An important feature for products such as fire blankets, building materials, and safes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Fire-Resistant',
      'group' => 'Additional Category Attributes',
      'rank' => '63000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
      'rank' => '64000',
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
      'rank' => '65000',
    ),
    'isLockable' => 
    array (
      'name' => 'isLockable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item has the capability to be secured by a lock or a locking mechanism. Differentiates lockability as a feature of items such as a tool boxes, microscopes, or saddlebags.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Lockable',
      'group' => 'Additional Category Attributes',
      'rank' => '66000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'lockType' => 
    array (
      'name' => 'lockType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The type of lock included with the device. Typically based on access mechanism. Example: electronic lock, padlock',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Lock Type',
      'group' => 'Additional Category Attributes',
      'rank' => '67000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'lockingMechanism' => 
    array (
      'name' => 'lockingMechanism',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Type of internal mechanism that locks the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Locking Mechanism',
      'group' => 'Additional Category Attributes',
      'rank' => '67500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'backsetSize' => 
    array (
      'name' => 'backsetSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The distance from the edge of a door to the center of the 2-1/8 inch bore hole used for door locks and handles.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Backset Size',
      'group' => 'Additional Category Attributes',
      'rank' => '68000',
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
    'maximumWeight' => 
    array (
      'name' => 'maximumWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The upper weight limit or capability of an item, often used in conjunction with "Minimum Weight". The meaning varies with context of product. For example, when used with "Minimum Weight", this attribute provides weight ranges for a range of products including pet medicine, baby carriers and outdoor play structures.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Maximum Weight',
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
            0 => 'lb',
            1 => 'kg',
            2 => 'oz',
            3 => 'g',
            4 => 'mg',
          ),
        ),
      ),
    ),
    'workingLoadLimit' => 
    array (
      'name' => 'workingLoadLimit',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The safe working load limit of the item expressed in pounds.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Working Load Limit',
      'group' => 'Additional Category Attributes',
      'rank' => '71000',
    ),
    'alphanumericCharacter' => 
    array (
      'name' => 'alphanumericCharacter',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The character of a lettering or numbering product, such as a house number.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Alphanumeric Character',
      'group' => 'Additional Category Attributes',
      'rank' => '73500',
      'dataType' => 'string',
      'maxLength' => '40',
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
                1 => 'finish',
                2 => 'grade',
                3 => 'countPerPack',
                4 => 'count',
                5 => 'volts',
                6 => 'amps',
                7 => 'watts',
                8 => 'workingLoadLimit',
                9 => 'gallonsPerMinute',
                10 => 'size',
                11 => 'assembledProductLength',
                12 => 'assembledProductWidth',
                13 => 'assembledProductHeight',
                14 => 'shape',
                15 => 'lightBulbType',
                16 => 'mountType',
                17 => 'baseColor',
                18 => 'baseFinish',
                19 => 'sportsTeam',
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
  'PlumbingAndHVAC' => 
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
      'rank' => '5000',
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
      'rank' => '6000',
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
      'rank' => '8000',
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
      'rank' => '9000',
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
      'rank' => '10000',
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
      'rank' => '11000',
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
      'rank' => '11500',
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
      'rank' => '11750',
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
      'rank' => '11800',
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
      'rank' => '11825',
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
      'rank' => '12000',
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
      'rank' => '13000',
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
      'rank' => '15000',
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
      'group' => 'Discoverability',
      'rank' => '16000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Brand License',
      'group' => 'Discoverability',
      'rank' => '17000',
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
      'rank' => '18000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Home Decor Style',
      'group' => 'Discoverability',
      'rank' => '19000',
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
    'assembledProductWidth' => 
    array (
      'name' => 'assembledProductWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The width of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Width',
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
    'assembledProductHeight' => 
    array (
      'name' => 'assembledProductHeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The height of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Height',
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
            1 => 'finish',
            2 => 'grade',
            3 => 'countPerPack',
            4 => 'count',
            5 => 'volts',
            6 => 'amps',
            7 => 'watts',
            8 => 'workingLoadLimit',
            9 => 'gallonsPerMinute',
            10 => 'size',
            11 => 'assembledProductLength',
            12 => 'assembledProductWidth',
            13 => 'assembledProductHeight',
            14 => 'shape',
            15 => 'lightBulbType',
            16 => 'mountType',
            17 => 'baseColor',
            18 => 'baseFinish',
            19 => 'sportsTeam',
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
    'isProp65WarningRequired' => 
    array (
      'name' => 'isProp65WarningRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Selecting "Y" indicates the product requires California\'s Proposition 65 special warning. Proposition 65 entitles California consumers to special warnings for products that contain chemicals known to the state of California to cause cancer and birth defects or other reproductive harm if certain criteria are met (such as quantity of chemical contained in the product). See the portions of the California Health and Safety Code related to Proposition 65 for more information.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Prop 65 Warning Required',
      'group' => 'Compliance',
      'rank' => '28000',
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
      'rank' => '29000',
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
    'hasFuelContainer' => 
    array (
      'name' => 'hasFuelContainer',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Denotes any item with an empty container that may be filled with fluids, such as fuel, CO2, propane, etc.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Fuel Container',
      'group' => 'Compliance',
      'rank' => '39500',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'accessoriesIncluded' => 
    array (
      'name' => 'accessoriesIncluded',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Listing of any supplementary items that come with the product. Important information for consumers because accessories typically provide additional convenience, utility, attractiveness or safety to or for a product. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Accessories Included',
      'group' => 'Additional Category Attributes',
      'rank' => '40000',
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
      'rank' => '41000',
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
      'rank' => '42000',
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
    'isWaterproof' => 
    array (
      'name' => 'isWaterproof',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been especially made to be resistant to water, to some degree.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Waterproof',
      'group' => 'Additional Category Attributes',
      'rank' => '43000',
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
      'rank' => '44000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isFireResistant' => 
    array (
      'name' => 'isFireResistant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been especially made to resist burning under certain conditions, as specified by the manufacturer. An important feature for products such as fire blankets, building materials, and safes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Fire-Resistant',
      'group' => 'Additional Category Attributes',
      'rank' => '45000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
      'rank' => '46000',
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
      'rank' => '47000',
    ),
    'gallonsPerMinute' => 
    array (
      'name' => 'gallonsPerMinute',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The flow rate capability or capacity for an item. Attribute used for products such as pumps, filters, and pressure washers.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Gallons Per Minute',
      'group' => 'Additional Category Attributes',
      'rank' => '48000',
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
          ),
        ),
      ),
    ),
    'mervRating' => 
    array (
      'name' => 'mervRating',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Rating system measuring the performance of air purifiers. For example, items with a MERV of 4 would filter out carpet fibers vs. items with MERV 8 that would also filter out mold spores. Typically used for large air cleaners.(vs. small portable versions). For more information on this standard, go to www.ashrae.org.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Minimum Efficiency Reporting Values (MERV)',
      'group' => 'Additional Category Attributes',
      'rank' => '49000',
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
      'rank' => '50000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Volts',
      'group' => 'Additional Category Attributes',
      'rank' => '51000',
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
      'rank' => '52000',
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
    'volumeCapacity' => 
    array (
      'name' => 'volumeCapacity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The volume of space available in this item to contain objects. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Volume Capacity',
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
    'finish' => 
    array (
      'name' => 'finish',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Terms describing the overall external treatment applied to the item. Typically finishes give a distinct appearance, texture or additional performance to the item. This attribute is used in a wide variety products and materials including wood, metal and fabric.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Finish',
      'group' => 'Additional Category Attributes',
      'rank' => '54000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'numberOfBlades' => 
    array (
      'name' => 'numberOfBlades',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of blades in a multi-tool or fan.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Blades',
      'group' => 'Additional Category Attributes',
      'rank' => '55000',
      'dataType' => 'integer',
      'totalDigits' => '40',
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
      'rank' => '55500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'roughInDistance' => 
    array (
      'name' => 'roughInDistance',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The toilet rough in is the distance from the wall behind the toilet to the center of the outlet pipe where the waste leaves the toilet. The most common distance is 12 inches, so most toilets have a “12-inch rough.”',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Rough-in Distance',
      'group' => 'Additional Category Attributes',
      'rank' => '55750',
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
      'rank' => '55875',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'faucetHandleDesign' => 
    array (
      'name' => 'faucetHandleDesign',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The term describing the design of the handle portion of a faucet that is typically a component of a sink or bathtub',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Faucet Handle Design',
      'group' => 'Additional Category Attributes',
      'rank' => '55937',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'hardwareFinish' => 
    array (
      'name' => 'hardwareFinish',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If item has a hardware component, the surface treatment of that component. For example if the item was a dresser and had hardware drawer pulls with a brushed copper finish',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Hardware Finish',
      'group' => 'Additional Category Attributes',
      'rank' => '55968',
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
      'rank' => '56000',
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
      'rank' => '57000',
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
      'rank' => '58000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'coverageArea' => 
    array (
      'name' => 'coverageArea',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measured in square feet.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Coverage Area',
      'group' => 'Nice to Have',
      'rank' => '60000',
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
    'faucetDrillings' => 
    array (
      'name' => 'faucetDrillings',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Type of mounting used for faucets. Also used to describe the positions of holes in products, typically sinks. Important to select the correct hardware and fixture fit.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Faucet Drillings',
      'group' => 'Nice to Have',
      'rank' => '61000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'gallonsPerFlush' => 
    array (
      'name' => 'gallonsPerFlush',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of gallons of water a device, typically a toilet, uses per flush. Used as a selection criteria, especially to address concerns with water use. For example, most low flush toilets use less than 1.6 GPF.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Gallons Per Flush',
      'group' => 'Nice to Have',
      'rank' => '62000',
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
          ),
        ),
      ),
    ),
    'hasCeeCertification' => 
    array (
      'name' => 'hasCeeCertification',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Entering a Y indicates the item has a certification designation from the Consortium for Energy Efficiency showing a level of cost effectiveness for a customer. Typical products include hot water heaters and air conditioners.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has CEE Certification',
      'group' => 'Nice to Have',
      'rank' => '63000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'ceeTier' => 
    array (
      'name' => 'ceeTier',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Rating of energy performance for appliances including refrigerators and air conditioners. Levels are defined by the CEE (Consortium for Energy Efficiency www.cee1.org). A Tier III refrigerator is more energy efficient than one with a Tier I rating.
',
      'requiredLevel' => 'Optional',
      'displayName' => 'CEE Tier',
      'group' => 'Nice to Have',
      'rank' => '63500',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'CEE Tier I',
        1 => 'Cee Tier III',
      ),
    ),
    'horsepower' => 
    array (
      'name' => 'horsepower',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the power of the device. Significance of horsepower varies with type of product. For example, for products with engines, horsepower is a general indicator of an engine\'s size and power (along with other engine specifications of engine displacement and torque). Horsepower is also used as common rating on electric motors and products that contain them.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Horsepower',
      'group' => 'Nice to Have',
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
            0 => 'HP',
          ),
        ),
      ),
    ),
    'humidificationOutputPerDay' => 
    array (
      'name' => 'humidificationOutputPerDay',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Volume of water that the device turns into vapor per day, as specified by the manufacturer. Used by consumers as an indication of the effectiveness of products such as humidifiers. For example, a humidifier with an output of 10 gallons per day will be capable of producing 5 times more moisture than a humidifier with a 2-gallon output.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Humidification Output Per Day',
      'group' => 'Nice to Have',
      'rank' => '65000',
    ),
    'pintsOfMoistureRemovedPerDay' => 
    array (
      'name' => 'pintsOfMoistureRemovedPerDay',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of pints that the device removes from the air per day, as specified by the manufacturer. Used by consumers as an indication of the volume capacity and effectiveness of products such as dehumidifiers.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Pints of Moisture Removed Per Day',
      'group' => 'Nice to Have',
      'rank' => '66000',
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
                1 => 'finish',
                2 => 'grade',
                3 => 'countPerPack',
                4 => 'count',
                5 => 'volts',
                6 => 'amps',
                7 => 'watts',
                8 => 'workingLoadLimit',
                9 => 'gallonsPerMinute',
                10 => 'size',
                11 => 'assembledProductLength',
                12 => 'assembledProductWidth',
                13 => 'assembledProductHeight',
                14 => 'shape',
                15 => 'lightBulbType',
                16 => 'mountType',
                17 => 'baseColor',
                18 => 'baseFinish',
                19 => 'sportsTeam',
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
  'Tools' => 
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
      'rank' => '5000',
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
      'rank' => '6000',
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
      'rank' => '8000',
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
      'rank' => '9000',
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
      'rank' => '10000',
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
      'rank' => '11000',
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
      'rank' => '11750',
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
      'rank' => '11875',
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
      'rank' => '11925',
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
      'rank' => '12537',
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
      'rank' => '12768',
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
      'rank' => '13000',
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
      'rank' => '15000',
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
      'group' => 'Discoverability',
      'rank' => '16000',
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
      'rank' => '17000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Brand License',
      'group' => 'Discoverability',
      'rank' => '18000',
    ),
    'powerType' => 
    array (
      'name' => 'powerType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Provides information on the exact type of power used by the item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Power Type',
      'group' => 'Discoverability',
      'rank' => '19500',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Fuel Type',
      'group' => 'Discoverability',
      'rank' => '20250',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'bladeDiameter' => 
    array (
      'name' => 'bladeDiameter',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The measure of the blade at the widest point. For circular blades, measured from the furthest edge of one tip to the furthest edge of the tip directly opposite. Important selection criteria for consumers for compatibility and use.  For example, handheld circular saws accept blades that range from 4 ½ - 7 ¼ inches in diameter.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Blade Diameter',
      'group' => 'Discoverability',
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
          ),
        ),
      ),
    ),
    'bladeLength' => 
    array (
      'name' => 'bladeLength',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The measurement of the length of the blade from the tip to base. For most knives the base would be the forward-most aspect of the handle. Used for products such as knives, scissors, and planers.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Blade Length',
      'group' => 'Discoverability',
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
            0 => 'in',
          ),
        ),
      ),
    ),
    'bladeShank' => 
    array (
      'name' => 'bladeShank',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The type of design of the base of a blade used to attach the blade. Important selection criteria for compatibility between blades and tools. For example, some jigsaws are designed to accept two or more blade shank styles, while others can only accept one style.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Blade Shank',
      'group' => 'Discoverability',
      'rank' => '22500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'shankSize' => 
    array (
      'name' => 'shankSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Overall dimensions of the end piece or shaft portion of the item. In the case of tools, used to select items based on fit. Specific expression of shank size varies with item. For example, for twist drill bits, shank size is the diameter of the shank designed to fit in the chuck of a drill',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Shank Size',
      'group' => 'Discoverability',
      'rank' => '22750',
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
    'chuckType' => 
    array (
      'name' => 'chuckType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The industry term that describes the design of the part of the device that holds the bit. Certain chuck types can be adjusted to accommodate different sizes of bits.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Chuck Type',
      'group' => 'Discoverability',
      'rank' => '22875',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'chuckSize' => 
    array (
      'name' => 'chuckSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The measurement of the part of the device that holds the bit and indicates the maximum diameter bit shank that fits the device. Products that have chucks include power drills, lathes, and scroll saws.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Chuck Size',
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
            0 => 'in',
          ),
        ),
      ),
    ),
    'arborDiameter' => 
    array (
      'name' => 'arborDiameter',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the diameter of shaft or spindle that inserts into and holds an attachment such as a saw blade or grinder wheel. As applied machine tool attachments, describes the arbor hole size and is used to identify machine/attachment fit. For example, a table saw that has a 5/8 inch arbor would accommodate a saw blade with a 5/8 inch arbor opening.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Arbor Diameter',
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
            0 => 'in',
          ),
        ),
      ),
    ),
    'colletSize' => 
    array (
      'name' => 'colletSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The size of the opening of the collar of the collet, which is designed to hold a tool attachment. Collets are commonly found on wood routers, precision grinders and lathes. Attribute also important in selecting compatible tool attachments. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Collet Size',
      'group' => 'Discoverability',
      'rank' => '27500',
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
    'spindleThread' => 
    array (
      'name' => 'spindleThread',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'For tools that have spindles, the design and sizing specifications. For example, the thread measurement of the chuck backplate adapter.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Spindle Thread',
      'group' => 'Discoverability',
      'rank' => '28000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'discSize' => 
    array (
      'name' => 'discSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the diameter of the disc portion of a tool attachment. Typically used to describe sanding discs and attachments for power tools. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Disc Size',
      'group' => 'Discoverability',
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
          ),
        ),
      ),
    ),
    'sandingBeltSize' => 
    array (
      'name' => 'sandingBeltSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The measurement of the width and length of a sandpaper belt. Used to select the correct size to fit  a specific belt sander.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Sanding Belt Size',
      'group' => 'Discoverability',
      'rank' => '31250',
      'dataType' => 'string',
      'maxLength' => '400',
      'minLength' => '1',
    ),
    'airInlet' => 
    array (
      'name' => 'airInlet',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the diameter of the air intake aperture, measured at its widest point. Attribute used for tools such as air inlet hoses, air impact wrenches, and air compressors.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Air Inlet',
      'group' => 'Discoverability',
      'rank' => '31875',
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
    'averageAirConsumptionAt90PSI' => 
    array (
      'name' => 'averageAirConsumptionAt90PSI',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Rate of airflow the product requires at the given pressure of 90 pounds per square inch. Used for products such as air brushes, framing nailers, and jackhammers. Important criteria that allows consumers to select items that are compatible with their air-delivery system. For example, a ½ʺ impact wrench typically requires 5 CFM at 90 psi.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Average Air Consumption @ 90 PSI',
      'group' => 'Discoverability',
      'rank' => '32500',
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
            0 => 'CFM',
          ),
        ),
      ),
    ),
    'cfmAt40Psi' => 
    array (
      'name' => 'cfmAt40Psi',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The flow rate produced by the item. Expressed in cubic feet per minute, as measured at the pressure of 40 pounds per inch.  Allows consumers to select products such as air compressors to accommodate specific tools and applications. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'CFM @ 40 PSI',
      'group' => 'Discoverability',
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
            0 => 'CFM',
          ),
        ),
      ),
    ),
    'cfmAt90Psi' => 
    array (
      'name' => 'cfmAt90Psi',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The airflow rate produced by the item. Expressed in cubic feet per minute, as measured at the pressure of 90 pounds per inch.  Allows consumers to select products such as air compressors to accommodate specific tools and applications. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'CFM @ 90 PSI',
      'group' => 'Discoverability',
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
            0 => 'CFM',
          ),
        ),
      ),
    ),
    'volts' => 
    array (
      'name' => 'volts',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of volts the product produces or requires. The significance of voltage varies with type of product. For example, if product is an appliance, used to describe the outlet voltage required. If an item (such as a power supply) both produces and requires different voltages, each type of voltage should be included.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Volts',
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
    'amps' => 
    array (
      'name' => 'amps',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of amps as a measure of electrical current draw. For products such as appliances, amps are usually specified as a peak value to help consumers select items that not overload household circuits. Also used as a measure of capacity (trip level) for electrical products such as circuit breakers and fuses',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Amps',
      'group' => 'Discoverability',
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
            0 => 'A',
            1 => 'mA',
          ),
        ),
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
    'assembledProductWidth' => 
    array (
      'name' => 'assembledProductWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The width of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Width',
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
      'rank' => '40000',
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
      'rank' => '42000',
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
      'rank' => '43000',
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
            1 => 'finish',
            2 => 'grade',
            3 => 'countPerPack',
            4 => 'count',
            5 => 'volts',
            6 => 'amps',
            7 => 'watts',
            8 => 'workingLoadLimit',
            9 => 'gallonsPerMinute',
            10 => 'size',
            11 => 'assembledProductLength',
            12 => 'assembledProductWidth',
            13 => 'assembledProductHeight',
            14 => 'shape',
            15 => 'lightBulbType',
            16 => 'mountType',
            17 => 'baseColor',
            18 => 'baseFinish',
            19 => 'sportsTeam',
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
      'rank' => '44000',
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
      'rank' => '46000',
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
      'rank' => '47000',
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
      'rank' => '49000',
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
    'hasFuelContainer' => 
    array (
      'name' => 'hasFuelContainer',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Denotes any item with an empty container that may be filled with fluids, such as fuel, CO2, propane, etc.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Fuel Container',
      'group' => 'Compliance',
      'rank' => '54500',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'accessoriesIncluded' => 
    array (
      'name' => 'accessoriesIncluded',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Listing of any supplementary items that come with the product. Important information for consumers because accessories typically provide additional convenience, utility, attractiveness or safety to or for a product. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Accessories Included',
      'group' => 'Additional Category Attributes',
      'rank' => '55000',
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
      'rank' => '56000',
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
      'rank' => '57000',
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
    'isWaterproof' => 
    array (
      'name' => 'isWaterproof',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been especially made to be resistant to water, to some degree.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Waterproof',
      'group' => 'Additional Category Attributes',
      'rank' => '58000',
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
      'rank' => '59000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isFireResistant' => 
    array (
      'name' => 'isFireResistant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been especially made to resist burning under certain conditions, as specified by the manufacturer. An important feature for products such as fire blankets, building materials, and safes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Fire-Resistant',
      'group' => 'Additional Category Attributes',
      'rank' => '60000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
    'numberOfBlades' => 
    array (
      'name' => 'numberOfBlades',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of blades in a multi-tool or fan.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Blades',
      'group' => 'Additional Category Attributes',
      'rank' => '63000',
      'dataType' => 'integer',
      'totalDigits' => '40',
    ),
    'bladeWidth' => 
    array (
      'name' => 'bladeWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The width of a blade of a cutting or wiping tool (saws, squeegees). How the measurement is taken can vary with the product. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Blade Width',
      'group' => 'Additional Category Attributes',
      'rank' => '63500',
    ),
    'lightBulbType' => 
    array (
      'name' => 'lightBulbType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Category of light bulb based on method to produce the light. Important to consumers because each type has different characteristics including bulb life, energy efficiency and color temperature. For example LED bulbs have a greater bulb life than equivalent incandescent bulbs.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Light Bulb Type',
      'group' => 'Additional Category Attributes',
      'rank' => '63750',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'gritSize' => 
    array (
      'name' => 'gritSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The standard numeric designation of abrasive as provided by the manufacturer. Grit size should be in the format for the applicable standard. For example, “P40” if using the ISOS/FEPA, and “40” if using the CAMI standard. Important factor selection factor for sandpapers and abrasive disks based on indented use. A small number (20 or 40) indicates a coarse grit designed for removing deep gouges and imperfections, while a large number (250) indicates a fine grit, which is best for smoothing varnished finishes between coats.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Grit Size',
      'group' => 'Additional Category Attributes',
      'rank' => '63875',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'squareDriveSize' => 
    array (
      'name' => 'squareDriveSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Standardized drive size used to hold a socket or other tooling interface.',
      'requiredLevel' => 'Recommeded',
      'displayName' => 'Square Drive Size',
      'group' => 'Additional Category Attributes',
      'rank' => '63906',
    ),
    'socketDepth' => 
    array (
      'name' => 'socketDepth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The internal, usable depth of a socket.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Socket Depth',
      'group' => 'Additional Category Attributes',
      'rank' => '63937',
    ),
    'numberOfSteps' => 
    array (
      'name' => 'numberOfSteps',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of steps product has as in a ladder. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Steps',
      'group' => 'Additional Category Attributes',
      'rank' => '63968',
      'dataType' => 'decimal',
      'totalDigits' => '40',
    ),
    'numberOfPoints' => 
    array (
      'name' => 'numberOfPoints',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of points within a socket wrench. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Points',
      'group' => 'Additional Category Attributes',
      'rank' => '63984',
      'dataType' => 'decimal',
      'totalDigits' => '40',
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
      'rank' => '64000',
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
      'rank' => '65000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'handing' => 
    array (
      'name' => 'handing',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The primary, or dominant hand for which the device is designed. Example products include left-handed scissors and circular power saws.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Handing',
      'group' => 'Nice to Have',
      'rank' => '65500',
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
      'group' => 'Nice to Have',
      'rank' => '65750',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'cordLength' => 
    array (
      'name' => 'cordLength',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the length of cord that comes with the item. For electrical appliances the cord is typically a power cord. For other products, headphones for example, the cord would connect to the receiver.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Cord Length',
      'group' => 'Nice to Have',
      'rank' => '65875',
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
    'batteryCapacity' => 
    array (
      'name' => 'batteryCapacity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The measure of the current a battery can deliver over time, expressed in ampere-hours (Ah).',
      'requiredLevel' => 'Optional',
      'displayName' => 'Battery Capacity',
      'group' => 'Nice to Have',
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
            0 => 'Ah',
            1 => 'mAh',
          ),
        ),
      ),
    ),
    'engineDisplacement' => 
    array (
      'name' => 'engineDisplacement',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The combined volume, as displaced by the pistons for all cylinders of an internal combustion engine.  Generally expressed in cubic centimeters up to 1000 cc, and liters thereafter, or in cubic inches.  Engine displacement is often used as a rough indicator of an engine\'s power and potential fuel consumption.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Engine Displacement',
      'group' => 'Nice to Have',
      'rank' => '67500',
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
            0 => 'cc',
            1 => 'CID',
          ),
        ),
      ),
    ),
    'horsepower' => 
    array (
      'name' => 'horsepower',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the power of the device. Significance of horsepower varies with type of product. For example, for products with engines, horsepower is a general indicator of an engine\'s size and power (along with other engine specifications of engine displacement and torque). Horsepower is also used as common rating on electric motors and products that contain them.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Horsepower',
      'group' => 'Nice to Have',
      'rank' => '68250',
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
            0 => 'HP',
          ),
        ),
      ),
    ),
    'decibelRating' => 
    array (
      'name' => 'decibelRating',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement, expressed as decibels, of the intensity of sound volume a device produces. Important selection criteria for consumers concerned with effects of products that generate loud noise levels. Attribute applied to such products as power tools and security alarms.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Decibel Rating',
      'group' => 'Nice to Have',
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
            0 => 'dB',
          ),
        ),
      ),
    ),
    'maximumAirPressure' => 
    array (
      'name' => 'maximumAirPressure',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The maximum internal pressure that the product is designed to contain and/or control.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Maximum Pressure',
      'group' => 'Nice to Have',
      'rank' => '77000',
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
            0 => 'psi',
            1 => 'Pa',
            2 => 'Bar',
          ),
        ),
      ),
    ),
    'maximumWattsOut' => 
    array (
      'name' => 'maximumWattsOut',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Overall power rating as specified by the manufacturer, expressed as MWO. Used primarily for power tools.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Maximum Watts Out',
      'group' => 'Nice to Have',
      'rank' => '78000',
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
            0 => 'MWO',
          ),
        ),
      ),
    ),
    'torque' => 
    array (
      'name' => 'torque',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of turning or twisting force as measured in foot pounds (ft-lbs). Significance varies with product. For example, for torque wrenches, torque value helps consumers select the correct torque wrench for tightening a specific nut or bolt.  If item has an engine, torque is a general indicator of an engine\'s pulling power. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Torque',
      'group' => 'Nice to Have',
      'rank' => '78500',
      'dataType' => 'decimal',
      'totalDigits' => '12',
    ),
    'sandingSpeed' => 
    array (
      'name' => 'sandingSpeed',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Speed of the sander expressed in orbits per minute or surface feet per minute.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Sanding Speed',
      'group' => 'Nice to Have',
      'rank' => '78750',
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
            0 => 'OPM',
            1 => 'SFPM',
          ),
        ),
      ),
    ),
    'noLoadSpeed' => 
    array (
      'name' => 'noLoadSpeed',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The maximum speed the product can reach without a load. For example, the maximum speed, expressed in rpm, a cordless drill driver can reach when it\'s not driving screws or drilling holes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'No Load Speed',
      'group' => 'Nice to Have',
      'rank' => '79000',
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
            0 => 'rpm',
          ),
        ),
      ),
    ),
    'strokeLength' => 
    array (
      'name' => 'strokeLength',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement describing how far a component travels in one direction in each movement cycle. When applied to power tools, allows selection based on intended use. For example, for reciprocating saws, a shorter stroke length allows for better control in tight areas, while a longer stroke length provides more aggressive cutting action for heavy demolition.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Stroke Length',
      'group' => 'Nice to Have',
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
            0 => 'in',
          ),
        ),
      ),
    ),
    'strokesPerMinute' => 
    array (
      'name' => 'strokesPerMinute',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of stokes per minute. Attribute typically applied to power tools as a measure of speed, and allows selection based on intended use. For example, for jig saws, deep cuts in dense hardwoods require high speed, while hard steel demands much slower blade stokes per minute.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Strokes Per Minute',
      'group' => 'Nice to Have',
      'rank' => '82000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'blowsPerMinute' => 
    array (
      'name' => 'blowsPerMinute',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of blows per minute a tool, such as a hammer drill, is able to produce.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Blows Per Minute',
      'group' => 'Nice to Have',
      'rank' => '82250',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'impactEnergy' => 
    array (
      'name' => 'impactEnergy',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of force applied by the item, expressed in joules. Used as selection factor for tools such as impact wrenches.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Impact Energy',
      'group' => 'Nice to Have',
      'rank' => '82500',
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
            0 => 'J',
          ),
        ),
      ),
    ),
    'loadCapacity' => 
    array (
      'name' => 'loadCapacity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The maximum load, expressed in psi, that the product is designed to have applied to it.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Load Capacity',
      'group' => 'Nice to Have',
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
            0 => 'psi',
            1 => 'psf',
          ),
        ),
      ),
    ),
    'volumeCapacity' => 
    array (
      'name' => 'volumeCapacity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The volume of space available in this item to contain objects. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Volume Capacity',
      'group' => 'Nice to Have',
      'rank' => '86000',
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
    'teethPerInch' => 
    array (
      'name' => 'teethPerInch',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of teeth per inch of the item. Important selection factor for saw blades. For example, more TPI gives a smoother cut but requires a slower saw cut, fewer TPI allows a faster cut with a slightly rougher finish.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Teeth Per Inch',
      'group' => 'Nice to Have',
      'rank' => '86250',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'maximumJawOpening' => 
    array (
      'name' => 'maximumJawOpening',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of the widest opening with the jaw of the product in its widest position. Typically used for tools such as an adjustable wrench, or vise.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Maximum Jaw Opening',
      'group' => 'Nice to Have',
      'rank' => '87000',
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
    'tankConfiguration' => 
    array (
      'name' => 'tankConfiguration',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The type of arrangement of supply tanks associated with a tool such as an air compressor. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Tank Configuration',
      'group' => 'Nice to Have',
      'rank' => '88000',
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
                1 => 'finish',
                2 => 'grade',
                3 => 'countPerPack',
                4 => 'count',
                5 => 'volts',
                6 => 'amps',
                7 => 'watts',
                8 => 'workingLoadLimit',
                9 => 'gallonsPerMinute',
                10 => 'size',
                11 => 'assembledProductLength',
                12 => 'assembledProductWidth',
                13 => 'assembledProductHeight',
                14 => 'shape',
                15 => 'lightBulbType',
                16 => 'mountType',
                17 => 'baseColor',
                18 => 'baseFinish',
                19 => 'sportsTeam',
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
  'ToolsAndHardwareOther' => 
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
    'material' => 
    array (
      'name' => 'material',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The main material(s) that a product is made of. This does not need to be an exhaustive list, but should contain the predominant or functionally important material/materials. Fabric material specifics should be entered using the "Fabric Content" attribute.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Material',
      'group' => 'Discoverability',
      'rank' => '20000',
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
      'group' => 'Discoverability',
      'rank' => '21000',
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
      'rank' => '22000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Brand License',
      'group' => 'Discoverability',
      'rank' => '23000',
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
            1 => 'finish',
            2 => 'grade',
            3 => 'countPerPack',
            4 => 'count',
            5 => 'volts',
            6 => 'amps',
            7 => 'watts',
            8 => 'workingLoadLimit',
            9 => 'gallonsPerMinute',
            10 => 'size',
            11 => 'assembledProductLength',
            12 => 'assembledProductWidth',
            13 => 'assembledProductHeight',
            14 => 'shape',
            15 => 'lightBulbType',
            16 => 'mountType',
            17 => 'baseColor',
            18 => 'baseFinish',
            19 => 'sportsTeam',
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
    'isProp65WarningRequired' => 
    array (
      'name' => 'isProp65WarningRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Selecting "Y" indicates the product requires California\'s Proposition 65 special warning. Proposition 65 entitles California consumers to special warnings for products that contain chemicals known to the state of California to cause cancer and birth defects or other reproductive harm if certain criteria are met (such as quantity of chemical contained in the product). See the portions of the California Health and Safety Code related to Proposition 65 for more information.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Prop 65 Warning Required',
      'group' => 'Compliance',
      'rank' => '36000',
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
      'rank' => '37000',
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
      'rank' => '40000',
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
      'rank' => '41000',
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
      'rank' => '42000',
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
      'rank' => '43000',
      'dataType' => 'string',
      'maxLength' => '1000',
      'minLength' => '1',
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
      'rank' => '51500',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'accessoriesIncluded' => 
    array (
      'name' => 'accessoriesIncluded',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Listing of any supplementary items that come with the product. Important information for consumers because accessories typically provide additional convenience, utility, attractiveness or safety to or for a product. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Accessories Included',
      'group' => 'Additional Category Attributes',
      'rank' => '53000',
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
      'rank' => '54000',
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
      'rank' => '55000',
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
    'isWaterproof' => 
    array (
      'name' => 'isWaterproof',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been especially made to be resistant to water, to some degree.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Waterproof',
      'group' => 'Additional Category Attributes',
      'rank' => '56000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isFireResistant' => 
    array (
      'name' => 'isFireResistant',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates that the item has been especially made to resist burning under certain conditions, as specified by the manufacturer. An important feature for products such as fire blankets, building materials, and safes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Fire-Resistant',
      'group' => 'Additional Category Attributes',
      'rank' => '59000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
      'rank' => '60000',
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
      'rank' => '61000',
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
                1 => 'finish',
                2 => 'grade',
                3 => 'countPerPack',
                4 => 'count',
                5 => 'volts',
                6 => 'amps',
                7 => 'watts',
                8 => 'workingLoadLimit',
                9 => 'gallonsPerMinute',
                10 => 'size',
                11 => 'assembledProductLength',
                12 => 'assembledProductWidth',
                13 => 'assembledProductHeight',
                14 => 'shape',
                15 => 'lightBulbType',
                16 => 'mountType',
                17 => 'baseColor',
                18 => 'baseFinish',
                19 => 'sportsTeam',
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