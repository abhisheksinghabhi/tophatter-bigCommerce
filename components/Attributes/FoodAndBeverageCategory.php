<?php return $arr = array (
  'AlcoholicBeverages' => 
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
    'flavor' => 
    array (
      'name' => 'flavor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The distinctive taste or flavor of the item, as provided by manufacturer. This is used for a wide variety of products, including food and beverages for both animals and humans. This may also apply to non-food items that come in flavors, including dental products, cigars and smoker wood chips.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Flavor',
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
      'rank' => '21000',
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
      'rank' => '23000',
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
      'rank' => '24000',
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
            0 => 'flavor',
            1 => 'size',
            2 => 'sportsTeam',
            3 => 'countPerPack',
            4 => 'count',
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
      'rank' => '25000',
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
      'rank' => '29000',
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
      'rank' => '30000',
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
      'rank' => '31000',
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
      'rank' => '33000',
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
      'rank' => '35000',
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
      'rank' => '35500',
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
      'rank' => '36000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
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
      'rank' => '40500',
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
      'rank' => '41750',
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
      'rank' => '42375',
      'dataType' => 'string',
      'maxLength' => '400',
      'minLength' => '1',
    ),
    'alcoholContentByVolume' => 
    array (
      'name' => 'alcoholContentByVolume',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Percentage of alcohol by volume.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Alcohol Content by Volume',
      'group' => 'Additional Category Attributes',
      'rank' => '43000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'alcoholProof' => 
    array (
      'name' => 'alcoholProof',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measure of ethanol (alcohol), which is twice the Alcohol by Volume.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Alcohol Proof',
      'group' => 'Additional Category Attributes',
      'rank' => '44000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'alcoholClassAndType' => 
    array (
      'name' => 'alcoholClassAndType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Common classification terms for alcoholic beverages. Select all that apply.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Alcohol Class & Type',
      'group' => 'Additional Category Attributes',
      'rank' => '45000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'neutralSpiritsColoringAndFlavoring' => 
    array (
      'name' => 'neutralSpiritsColoringAndFlavoring',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A statement of composition, if an alcoholic beverage has additives.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Neutral Spirits Coloring & Flavoring',
      'group' => 'Additional Category Attributes',
      'rank' => '46000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'wineAppellation' => 
    array (
      'name' => 'wineAppellation',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Legally defined and protected geographical indication used to identify where the grapes for a wine were grown.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Wine Appellation',
      'group' => 'Additional Category Attributes',
      'rank' => '47000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'wineVarietal' => 
    array (
      'name' => 'wineVarietal',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Grape variety that wine is derived from or, in the absence of one varietal, the varietal blend.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Wine Varietal',
      'group' => 'Additional Category Attributes',
      'rank' => '48000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'vintage' => 
    array (
      'name' => 'vintage',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The year the item was created, such as for wine or cheese.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Vintage',
      'group' => 'Additional Category Attributes',
      'rank' => '48500',
      'dataType' => 'integer',
      'totalDigits' => '4',
    ),
    'isNonGrape' => 
    array (
      'name' => 'isNonGrape',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that wine was made from fruit other than grapes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Non-Grape',
      'group' => 'Additional Category Attributes',
      'rank' => '49000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isEstateBottled' => 
    array (
      'name' => 'isEstateBottled',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that 100% of the wine came from grapes grown on land owned or controlled by the winery, which must be located in a viticultural area.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Estate Bottled',
      'group' => 'Additional Category Attributes',
      'rank' => '50000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'containsSulfites' => 
    array (
      'name' => 'containsSulfites',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates whether the beverage contains the level of sulfites required for labeling as such by law.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Contains Sulfites',
      'group' => 'Additional Category Attributes',
      'rank' => '51000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'timeAged' => 
    array (
      'name' => 'timeAged',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Amount of time an item is aged, such as for whiskey or cheese.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Time Aged',
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
            0 => 'months',
            1 => 'years',
          ),
        ),
      ),
    ),
    'ingredients' => 
    array (
      'name' => 'ingredients',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The list of all ingredients contained in an item, as found on the product label mandated by FDA guidelines. The ingredients should be listed in descending order by weight. The label must list the names of any FDA-certified color additives, but some ingredients can be listed collectively as flavors, spices, artificial flavoring or artificial colors. Refer to the FDA Food Labeling Guide for more guidelines.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Ingredients Text',
      'group' => 'Compliance',
      'rank' => '53000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'containerType' => 
    array (
      'name' => 'containerType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The kind of physical package or receptacle that contains the product as presented to the consumer. Also used to describe storage items. Consumers may select different products based on their container preferences. For example, a parent may select juice packaged in boxes rather than bottles for use in childrens\' lunch boxes.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Container Type',
      'group' => 'Additional Category Attributes',
      'rank' => '53500',
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
                0 => 'flavor',
                1 => 'size',
                2 => 'sportsTeam',
                3 => 'countPerPack',
                4 => 'count',
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
  'FoodAndBeverage' => 
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
    'pieceCount' => 
    array (
      'name' => 'pieceCount',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of small pieces, slices, or different items within the product. Piece Count applies to things such as puzzles, building block sets, and products that contain multiple different items (such as tool sets, dinnerware sets, gift baskets, art sets, makeup kits, or shaving kits). EXAMPLE: (1) A 500-piece puzzle has a "Piece Count" of 500. (2) A 105-Piece Socket Wrench set has a piece count of "105." (3) A gift basket of 5 different items has a "Piece Count" of 5.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Pieces',
      'group' => 'Basic',
      'rank' => '17400',
      'dataType' => 'integer',
      'totalDigits' => '20',
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
      'rank' => '19000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isReadyToEat' => 
    array (
      'name' => 'isReadyToEat',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Food that can be consumed without further preparation, according to FDA guidelines. For more information see FDA Food Code 2009: Chapter 1-201.10 Definitions.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Is Ready-to-Eat',
      'group' => 'Discoverability',
      'rank' => '20000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
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
    'meal' => 
    array (
      'name' => 'meal',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A meal that is normally tied to a particular time of day: breakfast, lunch, dinner, tea. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Meal',
      'group' => 'Discoverability',
      'rank' => '23000',
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
            0 => 'flavor',
            1 => 'size',
            2 => 'sportsTeam',
            3 => 'countPerPack',
            4 => 'count',
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
      'rank' => '30000',
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
      'rank' => '31000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isNutritionFactsLabelRequired' => 
    array (
      'name' => 'isNutritionFactsLabelRequired',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates if item requires nutritional facts labeling per FDA guidelines. If yes, please provide the following elements in one or more images 1) The Nutrition Facts and 2) Ingredients. Both attributes are required. If both elements are contained in one image, you may repeat the URL in both attributes. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Nutrition Facts and Ingredient Label Required',
      'group' => 'Compliance',
      'rank' => '33000',
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
      'rank' => '34000',
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
      'rank' => '35000',
      'dataType' => 'string',
      'maxLength' => '400',
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
      'rank' => '38000',
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
      'rank' => '40000',
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
      'rank' => '42000',
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
      'rank' => '42500',
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
      'rank' => '43000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isGmoFree' => 
    array (
      'name' => 'isGmoFree',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Does your product make any claims about containing no Genetically Modified Organisms (GMOs) on its packaging, or in the description on the website?',
      'requiredLevel' => 'Recommended',
      'displayName' => 'GMO-Free Claim',
      'group' => 'Additional Category Attributes',
      'rank' => '50000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'servingSize' => 
    array (
      'name' => 'servingSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement value specifying the amount of the item typically used as a reference on the label of that item to list per serving information (nutrients, calories, total fat). Applicable for a wide variety of products including food, beverages, and nutritional supplements. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Serving Size',
      'group' => 'Additional Category Attributes',
      'rank' => '51000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'servingsPerContainer' => 
    array (
      'name' => 'servingsPerContainer',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of servings contained in the item\'s package (box, bottle, bag).',
      'requiredLevel' => 'Optional',
      'displayName' => 'Servings Per Container',
      'group' => 'Additional Category Attributes',
      'rank' => '52000',
      'dataType' => 'decimal',
      'totalDigits' => '15',
    ),
    'calories' => 
    array (
      'name' => 'calories',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of calories contained in one serving, as found on the food label.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Calories Per Serving',
      'group' => 'Additional Category Attributes',
      'rank' => '53000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'integer',
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
            0 => 'Calories',
          ),
        ),
      ),
    ),
    'caloriesFromFat' => 
    array (
      'name' => 'caloriesFromFat',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Number of calories derived from fat, as found on the food label.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Fat Calories Per Serving',
      'group' => 'Additional Category Attributes',
      'rank' => '54000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'integer',
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
            0 => 'Calories',
          ),
        ),
      ),
    ),
    'totalFat' => 
    array (
      'name' => 'totalFat',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Total number of fat calories per serving, expressed in grams, milligrams, or less than a certain number of grams.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Total Fat Per Serving',
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
            0 => 'g',
          ),
        ),
      ),
    ),
    'totalFatPercentageDailyValue' => 
    array (
      'name' => 'totalFatPercentageDailyValue',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Percent daily value of fat per serving, according to the food label.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Total Fat Percentage Daily Value',
      'group' => 'Additional Category Attributes',
      'rank' => '56000',
      'dataType' => 'decimal',
      'totalDigits' => '16',
    ),
    'fatCaloriesPerGram' => 
    array (
      'name' => 'fatCaloriesPerGram',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of calories in one gram of fat, as may be provided in Nutritional Facts according to FDA guidelines.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Fat Calories Per Gram',
      'group' => 'Additional Category Attributes',
      'rank' => '57000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'integer',
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
            0 => 'Calories',
          ),
        ),
      ),
    ),
    'totalCarbohydrate' => 
    array (
      'name' => 'totalCarbohydrate',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Total number of carbohydrates per serving, expressed in grams or less than a certain number of grams.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Total Carbohydrate',
      'group' => 'Additional Category Attributes',
      'rank' => '58000',
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
            0 => 'g',
          ),
        ),
      ),
    ),
    'totalCarbohydratePercentageDailyValue' => 
    array (
      'name' => 'totalCarbohydratePercentageDailyValue',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Percent daily value of carbohydrates per serving.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Total Carbohydrate Percentage Daily Value',
      'group' => 'Additional Category Attributes',
      'rank' => '59000',
      'dataType' => 'decimal',
      'totalDigits' => '16',
    ),
    'carbohydrateCaloriesPerGram' => 
    array (
      'name' => 'carbohydrateCaloriesPerGram',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of calories in one gram of carbohydrates, as may be provided in Nutritional Facts according to FDA guidelines.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Carbohydrate Calories Per Gram',
      'group' => 'Additional Category Attributes',
      'rank' => '60000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'integer',
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
            0 => 'Calories',
          ),
        ),
      ),
    ),
    'nutrients' => 
    array (
      'name' => 'nutrients',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Additional nutrients, not including total fat or total carbohydrates, which should be entered in "Total Fat" and "Total Carbohydrate" respectively.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Nutrients',
      'group' => 'Additional Category Attributes',
      'rank' => '61000',
    ),
    'proteinCaloriesPerGram' => 
    array (
      'name' => 'proteinCaloriesPerGram',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of calories in one gram of protein, as may be provided in Nutritional Facts according to FDA guidelines.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Protein Calories Per Gram',
      'group' => 'Additional Category Attributes',
      'rank' => '66000',
      'child' => 
      array (
        0 => 
        array (
          'name' => 'measure',
          'maxOccurs' => '1',
          'minOccurs' => '1',
          'dataType' => 'integer',
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
            0 => 'Calories',
          ),
        ),
      ),
    ),
    'totalProteinPercentageDailyValue' => 
    array (
      'name' => 'totalProteinPercentageDailyValue',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Percent daily value of protein per serving.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Total Protein Percentage Daily Value',
      'group' => 'Additional Category Attributes',
      'rank' => '67000',
      'dataType' => 'decimal',
      'totalDigits' => '16',
    ),
    'totalProtein' => 
    array (
      'name' => 'totalProtein',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Total protein per serving, expressed in grams, milligrams, or less than.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Total Protein Per Serving',
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
            0 => 'g',
          ),
        ),
      ),
    ),
    'foodForm' => 
    array (
      'name' => 'foodForm',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes the form of the food if the food is sold in a variety of forms, such as sliced and unsliced, whole or halves, etc.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Food Form',
      'group' => 'Additional Category Attributes',
      'rank' => '69000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'containerType' => 
    array (
      'name' => 'containerType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The kind of physical package or receptacle that contains the product as presented to the consumer. Also used to describe storage items. Consumers may select different products based on their container preferences. For example, a parent may select juice packaged in boxes rather than bottles for use in childrens\' lunch boxes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Container Type',
      'group' => 'Additional Category Attributes',
      'rank' => '70000',
    ),
    'timeAged' => 
    array (
      'name' => 'timeAged',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Amount of time an item is aged, such as for whiskey or cheese.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Time Aged',
      'group' => 'Additional Category Attributes',
      'rank' => '71000',
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
            0 => 'months',
            1 => 'years',
          ),
        ),
      ),
    ),
    'isImitation' => 
    array (
      'name' => 'isImitation',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Generally a new food that resembles a traditional food and is a substitute for the traditional food must be labeled as an imitation, especially if the new food contains less protein or a lesser amount of any essential vitamin or mineral.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Imitation',
      'group' => 'Additional Category Attributes',
      'rank' => '72000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'ingredients' => 
    array (
      'name' => 'ingredients',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The list of all ingredients contained in an item, as found on the product label mandated by FDA guidelines. The ingredients should be listed in descending order by weight. The label must list the names of any FDA-certified color additives, but some ingredients can be listed collectively as flavors, spices, artificial flavoring or artificial colors. Refer to the FDA Food Labeling Guide for more guidelines.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Ingredients Text',
      'group' => 'Compliance',
      'rank' => '73000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'usdaInspected' => 
    array (
      'name' => 'usdaInspected',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Has your product been inspected by the United States Department of Agriculture? There are a number of food products that are under the jurisdiction of the Food Safety and Inspection Service (FSIS), and are thus subject to inspection, including: egg products (liquid, frozen or dried), meat, and poultry. Refer to the FDA / USDA Food Standards and Labeling Policy Book for exceptions and more detailed guidelines.',
      'requiredLevel' => 'Optional',
      'displayName' => 'USDA-Inspected',
      'group' => 'Additional Category Attributes',
      'rank' => '74000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'hasHighFructoseCornSyrup' => 
    array (
      'name' => 'hasHighFructoseCornSyrup',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Select "Y" if High Fructose Corn Syrup is in the ingredient list.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Has High Fructose Corn Syrup',
      'group' => 'Additional Category Attributes',
      'rank' => '75000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'foodAllergenStatements' => 
    array (
      'name' => 'foodAllergenStatements',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Statement regarding any ingredients that may be food allergens, often written as "Contains X" or "Manufactured in a facility which processes Y."',
      'requiredLevel' => 'Optional',
      'displayName' => 'Allergens',
      'group' => 'Additional Category Attributes',
      'rank' => '76000',
    ),
    'instructions' => 
    array (
      'name' => 'instructions',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Detailed information telling how the product should be operated or assembled.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Instructions',
      'group' => 'Additional Category Attributes',
      'rank' => '77000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'caffeineDesignation' => 
    array (
      'name' => 'caffeineDesignation',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Differentiates between items that have no naturally occurring caffeine, caffeine removed by processing, naturally caffeinated, or added caffeine.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Caffeine Designation',
      'group' => 'Additional Category Attributes',
      'rank' => '78000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Naturally Caffeinated',
        1 => 'Caffeine Added',
        2 => 'Naturally Decaffeinated',
        3 => 'Decaffeinated',
      ),
    ),
    'spiceLevel' => 
    array (
      'name' => 'spiceLevel',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Level of spice (i.e. "hotness") in an item, if applicable.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Spice Level',
      'group' => 'Additional Category Attributes',
      'rank' => '79000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'isMadeInHomeKitchen' => 
    array (
      'name' => 'isMadeInHomeKitchen',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates if the item was made for consumption in a home kitchen, as defined by the FDA.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Made in a Home Kitchen',
      'group' => 'Additional Category Attributes',
      'rank' => '80000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'beefCut' => 
    array (
      'name' => 'beefCut',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Retail term describing the portion cut (vs. primal cut) based on the part of the animal the meat is cut from. Important selection criteria because different cuts of beef have different characteristics, uses, and preferred cooking methods. For example, chuck meat is from the cow’s shoulder and is typically tough, but flavorful and used for beef cuts such as ground chuck (hamburger) and stew meat.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Beef Cut',
      'group' => 'Additional Category Attributes',
      'rank' => '81000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'poultryCut' => 
    array (
      'name' => 'poultryCut',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Term identifying the part of the bird (typically chicken, turkey, or goose). Important selection criteria because different cuts of poultry have different flavor and texture. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Poultry Cut',
      'group' => 'Additional Category Attributes',
      'rank' => '82000',
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
      'rank' => '83000',
      'dataType' => 'date',
    ),
    'safeHandlingInstructions' => 
    array (
      'name' => 'safeHandlingInstructions',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Instructions for storage or preparation of potentially hazardous fresh food. NOTE: Required for raw meat products.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Safe Handling Instructions',
      'group' => 'Nice to Have',
      'rank' => '92000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'cuisine' => 
    array (
      'name' => 'cuisine',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates the cooking style, especially regional or cultural cuisines, you might use the food to prepare.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Cuisine',
      'group' => 'Nice to Have',
      'rank' => '93000',
    ),
    'foodPreparationTips' => 
    array (
      'name' => 'foodPreparationTips',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Helpful information related to food preparation.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Food Preparation Tips',
      'group' => 'Nice to Have',
      'rank' => '94000',
    ),
    'foodStorageTips' => 
    array (
      'name' => 'foodStorageTips',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Helpful information related to food storage.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Food Storage Tips',
      'group' => 'Nice to Have',
      'rank' => '95000',
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
                0 => 'flavor',
                1 => 'size',
                2 => 'sportsTeam',
                3 => 'countPerPack',
                4 => 'count',
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