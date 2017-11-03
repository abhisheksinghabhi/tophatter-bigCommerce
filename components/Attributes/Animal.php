<?php return $arr = array (
  'AnimalHealthAndGrooming' => 
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
      'rank' => '14500',
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
      'rank' => '15000',
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
      'rank' => '15050',
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
    'animalType' => 
    array (
      'name' => 'animalType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The common generic name for the type of animal.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Type',
      'group' => 'Discoverability',
      'rank' => '19000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'animalBreed' => 
    array (
      'name' => 'animalBreed',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The specific breed or species of animal.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Breed',
      'group' => 'Discoverability',
      'rank' => '20000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'animalLifestage' => 
    array (
      'name' => 'animalLifestage',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Age group of animals. Common labels include puppies, kittens, adult, and senior.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Lifestage',
      'group' => 'Discoverability',
      'rank' => '20250',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'minimumWeight' => 
    array (
      'name' => 'minimumWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The minimum weight of animal for which this product is intended.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Minimum Animal Weight',
      'group' => 'Discoverability',
      'rank' => '20500',
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
          ),
        ),
      ),
    ),
    'maximumWeight' => 
    array (
      'name' => 'maximumWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The maximum weight of animal for which this product is intended.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Maximum Animal Weight',
      'group' => 'Discoverability',
      'rank' => '20750',
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
          ),
        ),
      ),
    ),
    'petSize' => 
    array (
      'name' => 'petSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Size category of an animal (e.g. Small, Toy, Teacup, Medium, Large). Attribute most commonly used for products for dogs and cats. Size classification is often related to weight. (For dogs: Small = under 25 lbs. Med = 25 to 60 lbs. Large = over 60 lbs.) (For cats: Small = under 6 lbs. Med = 9-13 lbs. Large = over 14 lbs.) For specific weight range, also use Minimum Weight and Maximum Weight attributes. If product is articles of pet clothing, use "Clothing Size".',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Pet Size',
      'group' => 'Discoverability',
      'rank' => '20875',
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
      'rank' => '23000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'animalHealthConcern' => 
    array (
      'name' => 'animalHealthConcern',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Type of condition that the item is intended to address.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Health Concern',
      'group' => 'Discoverability',
      'rank' => '24000',
    ),
    'dosage' => 
    array (
      'name' => 'dosage',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The amount of a medication, drug, or supplement that is directed to be taken, or applied at one time or regularly during a period of time, as specified by the manufacturer.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Dosage',
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
    'assembledProductWidth' => 
    array (
      'name' => 'assembledProductWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The width of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Width',
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
    'assembledProductHeight' => 
    array (
      'name' => 'assembledProductHeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The height of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Height',
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
    'assembledProductWeight' => 
    array (
      'name' => 'assembledProductWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The weight of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Weight',
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
      'rank' => '32000',
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
      'rank' => '33000',
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
            2 => 'countPerPack',
            3 => 'count',
            4 => 'flavor',
            5 => 'assembledProductLength',
            6 => 'assembledProductWidth',
            7 => 'assembledProductHeight',
            8 => 'scent',
            9 => 'capacity',
            10 => 'shape',
            11 => 'sportsTeam',
            12 => 'character',
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
      'rank' => '34000',
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
      'rank' => '38000',
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
      'rank' => '39000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '47000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'hasPricePerUnit' => 
    array (
      'name' => 'hasPricePerUnit',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Mark as "Y" if your item is any of the following: food used for human or domestic animal consumption; ingredients added to food; napkins; tissues; toilet paper; foil, plastic wrap, wax paper, parchment paper; paper towels; disposable plates, bowls, and cutlery; detergents, soaps, waxes, and other cleansing agents; non-prescription drugs, female hygeine products, and toiletries; automotive fluids and cleaners; rock salt; diapers, pullups and swimmers; fertilizer; kitty litter.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Price Per Unit',
      'group' => 'Compliance',
      'rank' => '49000',
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
      'rank' => '51000',
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
      'displayName' => 'PPU Unit of Measure',
      'group' => 'Compliance',
      'rank' => '51500',
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
    'isNutritionFactsLabelRequired' => 
    array (
      'name' => 'isNutritionFactsLabelRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates if item requires nutritional facts labeling per FDA guidelines. If yes, please provide the following elements in one or more images 1) The Nutrition Facts and 2) Ingredients. Both attributes are required. If both elements are contained in one image, you may repeat the URL in both attributes. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Nutrition Facts and Ingredient Label Required',
      'group' => 'Compliance',
      'rank' => '57500',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'nutritionFactsLabel' => 
    array (
      'name' => 'nutritionFactsLabel',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Image URL of the nutritional facts label. Provide the final destination image URL (no-redirects) that is publicly accessible (no username/password required) and ends in a proper image extension. Recommended file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Maximum file size: 2 GB.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isNutritionFactsLabelRequired',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Nutrition Facts Label Image',
      'group' => 'Compliance',
      'rank' => '58250',
      'dataType' => 'string',
      'maxLength' => '2000',
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
      'rank' => '58625',
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
      'requiredLevel' => 'Optional',
      'displayName' => 'Ingredient List Image',
      'group' => 'Compliance',
      'rank' => '59000',
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
      'rank' => '60750',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isDrugFactsLabelRequired' => 
    array (
      'name' => 'isDrugFactsLabelRequired',
      'maxOccurs' => '1',
      'minOccurs' => '1',
      'documentation' => 'Y indicates that your product is a drug as defined by the FDA. A drug is a substance intended for use in the diagnosis, cure, mitigation, treatment, or prevention of disease. If yes, you must provide an image of: 1)  your drug facts label, 2) dosage instruction/directions, and 3) active/inactive ingredients. All three image attributes are required. If your image contains more than one element, you may repeat the same image.',
      'requiredLevel' => 'Required',
      'displayName' => 'Is Drug Facts Label Required',
      'group' => 'Compliance',
      'rank' => '62500',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'drugFactsLabel' => 
    array (
      'name' => 'drugFactsLabel',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'URL of the Drug Facts label\'s image. Provide the final destination image URL (no-redirects) that is publicly accessible (no username/password required) and ends in a proper image extension such as, .jpg, .png or .gif. (200 character max)',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isDrugFactsLabelRequired',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Drug Facts Label Image',
      'group' => 'Compliance',
      'rank' => '64000',
      'dataType' => 'anyURI',
    ),
    'drugDosageInstructionsImage' => 
    array (
      'name' => 'drugDosageInstructionsImage',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Please provide the image URL of the  Dosage / Instructions, if not included in another image. Provide the final destination image URL (no-redirects) that is publicly accessible (no username/password required) and ends in a proper image extension. Recommended file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Maximum file size: 2 GB.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Drug Facts Dosage / Instructions Image',
      'group' => 'Compliance',
      'rank' => '65000',
      'dataType' => 'anyURI',
    ),
    'drugActiveInactiveIngredientsImage' => 
    array (
      'name' => 'drugActiveInactiveIngredientsImage',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Provide a URL of the image containing the Active/Inactive Ingredients, if not included in another image.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Drug Facts Active / Inactive Ingredients Image',
      'group' => 'Compliance',
      'rank' => '66000',
      'dataType' => 'anyURI',
    ),
    'globalBrandLicense' => 
    array (
      'name' => 'globalBrandLicense',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A brand name that is not owned by the product brand, but is licensed for the particular product. (Often character and media tie-ins and promotions.)',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Brand License',
      'group' => 'Additional Category Attributes',
      'rank' => '66375',
    ),
    'activeIngredients' => 
    array (
      'name' => 'activeIngredients',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The list of active ingredients in order of potency, as shown on the item label.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Active Ingredients',
      'group' => 'Additional Category Attributes',
      'rank' => '67000',
    ),
    'inactiveIngredients' => 
    array (
      'name' => 'inactiveIngredients',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The list of inactive ingredients in order of potency, as shown on the item label.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Inactive Ingredients',
      'group' => 'Additional Category Attributes',
      'rank' => '68000',
    ),
    'stopUseIndications' => 
    array (
      'name' => 'stopUseIndications',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Text that describes symptoms, or lack thereof that indicate when to stop taking a medicine. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Stop Use Indications',
      'group' => 'Additional Category Attributes',
      'rank' => '69000',
    ),
    'form' => 
    array (
      'name' => 'form',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes the way the item is dispensed or consumed, including its texture or other physical characteristics.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Form',
      'group' => 'Additional Category Attributes',
      'rank' => '70000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Scent',
      'group' => 'Additional Category Attributes',
      'rank' => '71000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'hairLength' => 
    array (
      'name' => 'hairLength',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The length of hair that grooming product is intended for.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Hair Length',
      'group' => 'Additional Category Attributes',
      'rank' => '72000',
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
      'rank' => '73000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isDisposable' => 
    array (
      'name' => 'isDisposable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates the item is intended for single use.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Disposable',
      'group' => 'Additional Category Attributes',
      'rank' => '74000',
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
      'rank' => '79000',
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
      'rank' => '80000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'instructions' => 
    array (
      'name' => 'instructions',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Detailed information telling how the product should be operated or assembled.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Instructions',
      'group' => 'Nice to Have',
      'rank' => '81000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isRetractable' => 
    array (
      'name' => 'isRetractable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that the item can be withdrawn into a holder, as in a cord or leash.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Retractable',
      'group' => 'Nice to Have',
      'rank' => '119000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
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
                1 => 'size',
                2 => 'countPerPack',
                3 => 'count',
                4 => 'flavor',
                5 => 'assembledProductLength',
                6 => 'assembledProductWidth',
                7 => 'assembledProductHeight',
                8 => 'scent',
                9 => 'capacity',
                10 => 'shape',
                11 => 'sportsTeam',
                12 => 'character',
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
  'AnimalAccessories' => 
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
      'rank' => '11250',
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
      'rank' => '11312',
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
      'rank' => '11375',
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
      'rank' => '11531',
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
    'animalType' => 
    array (
      'name' => 'animalType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The common generic name for the type of animal.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Type',
      'group' => 'Discoverability',
      'rank' => '14000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'animalBreed' => 
    array (
      'name' => 'animalBreed',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The specific breed or species of animal.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Breed',
      'group' => 'Discoverability',
      'rank' => '15000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'animalLifestage' => 
    array (
      'name' => 'animalLifestage',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Age group of animals. Common labels include puppies, kittens, adult, and senior.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Lifestage',
      'group' => 'Discoverability',
      'rank' => '16000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'minimumWeight' => 
    array (
      'name' => 'minimumWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The minimum weight of animal for which this product is intended.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Minimum Animal Weight',
      'group' => 'Discoverability',
      'rank' => '17000',
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
          ),
        ),
      ),
    ),
    'maximumWeight' => 
    array (
      'name' => 'maximumWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The maximum weight of animal for which this product is intended.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Maximum Animal Weight',
      'group' => 'Discoverability',
      'rank' => '18000',
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
          ),
        ),
      ),
    ),
    'petSize' => 
    array (
      'name' => 'petSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Size category of an animal (e.g. Small, Toy, Teacup, Medium, Large). Attribute most commonly used for products for dogs and cats. Size classification is often related to weight. (For dogs: Small = under 25 lbs. Med = 25 to 60 lbs. Large = over 60 lbs.) (For cats: Small = under 6 lbs. Med = 9-13 lbs. Large = over 14 lbs.) For specific weight range, also use Minimum Weight and Maximum Weight attributes. If product is articles of pet clothing, use "Clothing Size".',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Pet Size',
      'group' => 'Discoverability',
      'rank' => '19000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Capacity',
      'group' => 'Discoverability',
      'rank' => '21000',
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
      'rank' => '22000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Color',
      'group' => 'Discoverability',
      'rank' => '23000',
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
      'rank' => '24000',
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
            1 => 'size',
            2 => 'countPerPack',
            3 => 'count',
            4 => 'flavor',
            5 => 'assembledProductLength',
            6 => 'assembledProductWidth',
            7 => 'assembledProductHeight',
            8 => 'scent',
            9 => 'capacity',
            10 => 'shape',
            11 => 'sportsTeam',
            12 => 'character',
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
      'rank' => '34000',
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
      'rank' => '35000',
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
    'requiresTextileActLabeling' => 
    array (
      'name' => 'requiresTextileActLabeling',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Select "Y" if your item contains wool or is one of the following: clothing (except for hats and shoes), handkerchiefs, scarves, bedding (including sheets, covers, blankets, comforters, pillows, pillowcases, quilts, bedspreads and pads (but not outer coverings for mattresses or box springs)), curtains and casements, draperies, tablecloths, napkins, doilies, floor coverings (rugs, carpets and mats), towels, washcloths, dishcloths, ironing board covers and pads, umbrellas, parasols, bats or batting, flags with heading or that are bigger than 216 square inches, cushions, all fibers, yarns and fabrics (but not packaging ribbons), furniture slip covers and other furniture covers, afghans and throws, sleeping bags, antimacassars (doilies), hammocks, dresser and other furniture scarves. For further information on these requirements, refer to the labeling requirements of the Textile Act. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Requires Textile Act Labeling',
      'group' => 'Compliance',
      'rank' => '39000',
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
      'rank' => '40000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'USA',
        1 => 'Imported',
        2 => 'USA and Imported',
        3 => 'USA or Imported',
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
      'rank' => '44000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'hasPricePerUnit' => 
    array (
      'name' => 'hasPricePerUnit',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Mark as "Y" if your item is any of the following: food used for human or domestic animal consumption; ingredients added to food; napkins; tissues; toilet paper; foil, plastic wrap, wax paper, parchment paper; paper towels; disposable plates, bowls, and cutlery; detergents, soaps, waxes, and other cleansing agents; non-prescription drugs, female hygeine products, and toiletries; automotive fluids and cleaners; rock salt; diapers, pullups and swimmers; fertilizer; kitty litter.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Price Per Unit',
      'group' => 'Compliance',
      'rank' => '46000',
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
      'rank' => '48000',
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
      'displayName' => 'PPU Unit of Measure',
      'group' => 'Compliance',
      'rank' => '48500',
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
    'hasWarranty' => 
    array (
      'name' => 'hasWarranty',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Y indicates the item comes with a warranty. If an item has a warranty, then enter EITHER the warranty URL or the warranty text in the appropriate field.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Warranty',
      'group' => 'Compliance',
      'rank' => '49000',
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
      'rank' => '50000',
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
      'rank' => '51000',
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
      'rank' => '53500',
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
      'rank' => '54000',
      'dataType' => 'string',
      'maxLength' => '4000',
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
      'rank' => '55000',
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
      'rank' => '56000',
    ),
    'globalBrandLicense' => 
    array (
      'name' => 'globalBrandLicense',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A brand name that is not owned by the product brand, but is licensed for the particular product. (Often character and media tie-ins and promotions.)',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Brand License',
      'group' => 'Additional Category Attributes',
      'rank' => '57000',
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
      'rank' => '59000',
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
      'rank' => '60000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'instructions' => 
    array (
      'name' => 'instructions',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Detailed information telling how the product should be operated or assembled.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Instructions',
      'group' => 'Nice to Have',
      'rank' => '61000',
      'dataType' => 'string',
      'maxLength' => '4000',
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
      'group' => 'Nice to Have',
      'rank' => '62000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'batterySize' => 
    array (
      'name' => 'batterySize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The size or form factor of a battery, as specified by its code. This lets customers know which size of battery to purchase to operate the device.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Battery Size',
      'group' => 'Nice to Have',
      'rank' => '63000',
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
      'rank' => '64000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isFoldable' => 
    array (
      'name' => 'isFoldable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that an item can be folded.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Foldable',
      'group' => 'Nice to Have',
      'rank' => '65000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isReflective' => 
    array (
      'name' => 'isReflective',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that the item contains material that reflects light, especially for nighttime safety.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Reflective',
      'group' => 'Nice to Have',
      'rank' => '66000',
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
      'group' => 'Nice to Have',
      'rank' => '67000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'maximumTemperature' => 
    array (
      'name' => 'maximumTemperature',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The higher temperature limit or capacity of an item such as a heater or thermometer. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Maximum Temperature',
      'group' => 'Nice to Have',
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
            0 => 'ºF',
            1 => 'ºC',
            2 => 'ºK',
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
            0 => 'ºF',
            1 => 'ºC',
            2 => 'ºK',
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
      'group' => 'Nice to Have',
      'rank' => '70000',
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
      'rank' => '71000',
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
      'rank' => '72000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '74000',
      'dataType' => 'decimal',
      'totalDigits' => '40',
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
                2 => 'countPerPack',
                3 => 'count',
                4 => 'flavor',
                5 => 'assembledProductLength',
                6 => 'assembledProductWidth',
                7 => 'assembledProductHeight',
                8 => 'scent',
                9 => 'capacity',
                10 => 'shape',
                11 => 'sportsTeam',
                12 => 'character',
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
  'AnimalFood' => 
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
      'rank' => '14500',
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
      'rank' => '15000',
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
      'rank' => '15050',
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
    'animalType' => 
    array (
      'name' => 'animalType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The common generic name for the type of animal.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Type',
      'group' => 'Discoverability',
      'rank' => '19000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'animalBreed' => 
    array (
      'name' => 'animalBreed',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The specific breed or species of animal.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Breed',
      'group' => 'Discoverability',
      'rank' => '20000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'animalLifestage' => 
    array (
      'name' => 'animalLifestage',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Age group of animals. Common labels include puppies, kittens, adult, and senior.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Lifestage',
      'group' => 'Discoverability',
      'rank' => '20375',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'minimumWeight' => 
    array (
      'name' => 'minimumWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The minimum weight of animal for which this product is intended.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Minimum Animal Weight',
      'group' => 'Discoverability',
      'rank' => '20750',
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
          ),
        ),
      ),
    ),
    'maximumWeight' => 
    array (
      'name' => 'maximumWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The maximum weight of animal for which this product is intended, in pounds.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Maximum Animal Weight',
      'group' => 'Discoverability',
      'rank' => '21125',
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
          ),
        ),
      ),
    ),
    'petSize' => 
    array (
      'name' => 'petSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Size category of an animal (e.g. Small, Toy, Teacup, Medium, Large). Attribute most commonly used for products for dogs and cats. Size classification is often related to weight. (For dogs: Small = under 25 lbs. Med = 25 to 60 lbs. Large = over 60 lbs.) (For cats: Small = under 6 lbs. Med = 9-13 lbs. Large = over 14 lbs.) For specific weight range, also use Minimum Weight and Maximum Weight attributes. If product is articles of pet clothing, use "Clothing Size".',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Pet Size',
      'group' => 'Discoverability',
      'rank' => '21500',
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
      'rank' => '22500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'petFoodForm' => 
    array (
      'name' => 'petFoodForm',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The physical format of the animal food.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Pet Food Form',
      'group' => 'Discoverability',
      'rank' => '24000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'flavor' => 
    array (
      'name' => 'flavor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The distinctive taste or flavor of the item, as provided by manufacturer. This is used for a wide variety of products, including food and beverages for both animals and humans. This may also apply to non-food items that come in flavors, including dental products, cigars and smoker wood chips.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Flavor',
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
    'assembledProductWidth' => 
    array (
      'name' => 'assembledProductWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The width of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Width',
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
    'assembledProductHeight' => 
    array (
      'name' => 'assembledProductHeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The height of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Height',
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
    'assembledProductWeight' => 
    array (
      'name' => 'assembledProductWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The weight of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Weight',
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
      'rank' => '32000',
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
      'rank' => '33000',
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
            2 => 'countPerPack',
            3 => 'count',
            4 => 'flavor',
            5 => 'assembledProductLength',
            6 => 'assembledProductWidth',
            7 => 'assembledProductHeight',
            8 => 'scent',
            9 => 'capacity',
            10 => 'shape',
            11 => 'sportsTeam',
            12 => 'character',
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
      'rank' => '34000',
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
      'rank' => '38000',
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
      'rank' => '39000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '42000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'hasPricePerUnit' => 
    array (
      'name' => 'hasPricePerUnit',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Mark as "Y" if your item is any of the following: food used for human or domestic animal consumption; ingredients added to food; napkins; tissues; toilet paper; foil, plastic wrap, wax paper, parchment paper; paper towels; disposable plates, bowls, and cutlery; detergents, soaps, waxes, and other cleansing agents; non-prescription drugs, female hygeine products, and toiletries; automotive fluids and cleaners; rock salt; diapers, pullups and swimmers; fertilizer; kitty litter.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Price Per Unit',
      'group' => 'Compliance',
      'rank' => '44000',
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
      'rank' => '46000',
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
      'displayName' => 'PPU Unit of Measure',
      'group' => 'Compliance',
      'rank' => '46500',
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
    'hasGMOs' => 
    array (
      'name' => 'hasGMOs',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Does your product contain Genetically Modified Organisms (GMOS) whose DNA has been altered using genetic engineering techniques?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has GMOs',
      'group' => 'Compliance',
      'rank' => '47000',
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
    'isNutritionFactsLabelRequired' => 
    array (
      'name' => 'isNutritionFactsLabelRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates if item requires nutritional facts labeling per FDA guidelines. If yes, please provide the following elements in one or more images 1) The Nutrition Facts and 2) Ingredients. Both attributes are required. If both elements are contained in one image, you may repeat the URL in both attributes. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Nutrition Facts and Ingredient Label Required',
      'group' => 'Compliance',
      'rank' => '58000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'nutritionFactsLabel' => 
    array (
      'name' => 'nutritionFactsLabel',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Image URL of the nutritional facts label. Provide the final destination image URL (no-redirects) that is publicly accessible (no username/password required) and ends in a proper image extension. Recommended file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Maximum file size: 2 GB.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isNutritionFactsLabelRequired',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Nutrition Facts Label Image',
      'group' => 'Compliance',
      'rank' => '59000',
      'dataType' => 'string',
      'maxLength' => '2000',
      'minLength' => '1',
    ),
    'nutritionIngredientsImage' => 
    array (
      'name' => 'nutritionIngredientsImage',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'URL of image. Provide the final destination image URL (no-redirects) that is publicly accessible (no username/password required) and ends in a proper image extension. Recommended file type: JPEG Accepted file types: JPG, PNG, GIF, BMP Maximum file size: 2 GB. If the Ingredients have been included in another image, you may repeat the URL here. ',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'isNutritionFactsLabelRequired',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Nutrition Ingredients Image',
      'group' => 'Compliance',
      'rank' => '60000',
      'dataType' => 'string',
      'maxLength' => '400',
      'minLength' => '1',
    ),
    'feedingInstructions' => 
    array (
      'name' => 'feedingInstructions',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Instructions for feeding food to the animal.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Feeding Instructions',
      'group' => 'Additional Category Attributes',
      'rank' => '62000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'animalHealthConcern' => 
    array (
      'name' => 'animalHealthConcern',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Type of condition that the item is intended to address.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Health Concern',
      'group' => 'Additional Category Attributes',
      'rank' => '63000',
    ),
    'globalBrandLicense' => 
    array (
      'name' => 'globalBrandLicense',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A brand name that is not owned by the product brand, but is licensed for the particular product. (Often character and media tie-ins and promotions.)',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Brand License',
      'group' => 'Additional Category Attributes',
      'rank' => '64000',
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
    'instructions' => 
    array (
      'name' => 'instructions',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Detailed information telling how the product should be operated or assembled.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Instructions',
      'group' => 'Nice to Have',
      'rank' => '71000',
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
                2 => 'countPerPack',
                3 => 'count',
                4 => 'flavor',
                5 => 'assembledProductLength',
                6 => 'assembledProductWidth',
                7 => 'assembledProductHeight',
                8 => 'scent',
                9 => 'capacity',
                10 => 'shape',
                11 => 'sportsTeam',
                12 => 'character',
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
  'AnimalEverythingElse' => 
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
      'rank' => '4000',
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
      'rank' => '5000',
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
      'rank' => '7000',
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
      'rank' => '8000',
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
      'rank' => '9000',
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
      'rank' => '10000',
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
      'rank' => '10625',
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
      'rank' => '10750',
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
      'rank' => '10800',
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
      'rank' => '10825',
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
      'rank' => '11000',
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
      'rank' => '12000',
    ),
    'animalType' => 
    array (
      'name' => 'animalType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The common generic name for the type of animal.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Type',
      'group' => 'Discoverability',
      'rank' => '13000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'animalBreed' => 
    array (
      'name' => 'animalBreed',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The specific breed or species of animal.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Breed',
      'group' => 'Discoverability',
      'rank' => '14000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'animalLifestage' => 
    array (
      'name' => 'animalLifestage',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Age group of animals. Common labels include puppies, kittens, adult, and senior.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Animal Lifestage',
      'group' => 'Discoverability',
      'rank' => '15000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'minimumWeight' => 
    array (
      'name' => 'minimumWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The minimum weight of animal for which this product is intended.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Minimum Animal Weight',
      'group' => 'Discoverability',
      'rank' => '16000',
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
          ),
        ),
      ),
    ),
    'maximumWeight' => 
    array (
      'name' => 'maximumWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The maximum weight of animal for which this product is intended.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Maximum Animal Weight',
      'group' => 'Discoverability',
      'rank' => '17000',
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
          ),
        ),
      ),
    ),
    'petSize' => 
    array (
      'name' => 'petSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Size category of an animal (e.g. Small, Toy, Teacup, Medium, Large). Attribute most commonly used for products for dogs and cats. Size classification is often related to weight. (For dogs: Small = under 25 lbs. Med = 25 to 60 lbs. Large = over 60 lbs.) (For cats: Small = under 6 lbs. Med = 9-13 lbs. Large = over 14 lbs.) For specific weight range, also use Minimum Weight and Maximum Weight attributes. If product is articles of pet clothing, use "Clothing Size".',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Pet Size',
      'group' => 'Discoverability',
      'rank' => '18000',
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
      'rank' => '20000',
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
    'isFoldable' => 
    array (
      'name' => 'isFoldable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that an item can be folded.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Foldable',
      'group' => 'Discoverability',
      'rank' => '24000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
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
    'assembledProductWeight' => 
    array (
      'name' => 'assembledProductWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The weight of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Weight',
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
            0 => 'oz',
            1 => 'lb',
            2 => 'g',
            3 => 'kg',
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
      'rank' => '29000',
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
      'rank' => '30000',
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
            2 => 'countPerPack',
            3 => 'count',
            4 => 'flavor',
            5 => 'assembledProductLength',
            6 => 'assembledProductWidth',
            7 => 'assembledProductHeight',
            8 => 'scent',
            9 => 'capacity',
            10 => 'shape',
            11 => 'sportsTeam',
            12 => 'character',
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
      'rank' => '31000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
      'rank' => '33000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
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
      'rank' => '36000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
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
    'hasBatteries' => 
    array (
      'name' => 'hasBatteries',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => '"Battery or battery containing product" is defined by Company to include any item of Merchandise that is a battery or any component of Merchandise, including reusable packaging intended to stay in use with the item, containing a battery of any chemistry/ type.  Mark Y if this definition applies to your product.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Contains Batteries',
      'group' => 'Compliance',
      'rank' => '39500',
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
      'requiredLevel' => 'Recommended',
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
    'isChemical' => 
    array (
      'name' => 'isChemical',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => ' ‘Chemical’ is defined by Walmart to include any item of Merchandise that contains a powder, gel, paste, or liquid that is not intended for human consumption.  ‘Chemical’ also includes the following types items that ARE intended for human consumption, inhalation, or absorption, or labeled with drug facts:  All over-the-counter medications, including: Lozenges, pills or capsules (e.g. pain relievers; allergy medications; as well as vitamins and supplements that contain metals); Medicated swabs and wipes, acne medication, and sunscreen; Medicated patches (such as nicotine patches); Liquids (e.g. cough medicine, medicated drops, nasal spray and inhalers); Medicated shampoos, gums, ointments and creams; Medicated lip balm, lip creams and petroleum jelly; Contraceptive foam, films, and spermicides; and Product/Equipment sold with chemicals (e.g. vaporizer sold with medication) and electronic cigarettes. If your product meets this definition, Mark Y and ensure that you have obtained a hazardous materials risk assessment through WERCS  before setting up your item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Contains Chemical',
      'group' => 'Compliance',
      'rank' => '44000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'hasPricePerUnit' => 
    array (
      'name' => 'hasPricePerUnit',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Mark as "Y" if your item is any of the following: food used for human or domestic animal consumption; ingredients added to food; napkins; tissues; toilet paper; foil, plastic wrap, wax paper, parchment paper; paper towels; disposable plates, bowls, and cutlery; detergents, soaps, waxes, and other cleansing agents; non-prescription drugs, female hygeine products, and toiletries; automotive fluids and cleaners; rock salt; diapers, pullups and swimmers; fertilizer; kitty litter.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has Price Per Unit',
      'group' => 'Compliance',
      'rank' => '45500',
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
      'rank' => '46000',
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
      'displayName' => 'PPU Unit of Measure',
      'group' => 'Compliance',
      'rank' => '47000',
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
    'isProp65WarningRequired' => 
    array (
      'name' => 'isProp65WarningRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Selecting "Y" indicates the product requires California\'s Proposition 65 special warning. Proposition 65 entitles California consumers to special warnings for products that contain chemicals known to the state of California to cause cancer and birth defects or other reproductive harm if certain criteria are met (such as quantity of chemical contained in the product). See the portions of the California Health and Safety Code related to Proposition 65 for more information.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Prop 65 Warning Required',
      'group' => 'Compliance',
      'rank' => '48000',
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
      'rank' => '49000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '50500',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'USA',
        1 => 'Imported',
        2 => 'USA and Imported',
        3 => 'USA or Imported',
      ),
    ),
    'shelfLife' => 
    array (
      'name' => 'shelfLife',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The length of time that the product can be stored without becoming unfit for consumption or after which the product is no longer at best quality, measured in days.',
      'requiredLevel' => 'Conditionally Required',
      'conditionalAttributes' => 
      array (
        0 => 
        array (
          'name' => 'hasExpiration',
          'value' => 'Yes',
        ),
      ),
      'displayName' => 'Shelf Life',
      'group' => 'Compliance',
      'rank' => '51000',
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
            0 => 'days',
          ),
        ),
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
      'rank' => '53500',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
      'rank' => '54000',
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
      'rank' => '55000',
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
      'rank' => '56000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'instructions' => 
    array (
      'name' => 'instructions',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Detailed information telling how the product should be operated or assembled.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Instructions',
      'group' => 'Additional Category Attributes',
      'rank' => '57000',
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
      'rank' => '58000',
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
      'rank' => '59000',
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
      'group' => 'Nice to Have',
      'rank' => '61000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'globalBrandLicense' => 
    array (
      'name' => 'globalBrandLicense',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A brand name that is not owned by the product brand, but is licensed for the particular product. (Often character and media tie-ins and promotions.)',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Brand License',
      'group' => 'Nice to Have',
      'rank' => '62000',
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
      'rank' => '63000',
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
      'rank' => '64000',
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
                2 => 'countPerPack',
                3 => 'count',
                4 => 'flavor',
                5 => 'assembledProductLength',
                6 => 'assembledProductWidth',
                7 => 'assembledProductHeight',
                8 => 'scent',
                9 => 'capacity',
                10 => 'shape',
                11 => 'sportsTeam',
                12 => 'character',
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