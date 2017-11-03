<?php return $arr = array (
  'Jewelry' => 
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
      'documentation' => 'Material for general jewelry items. Enter precious metals and purities under "Metal Type" and "Metal Stamp."',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Material',
      'group' => 'Discoverability',
      'rank' => '19000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'jewelryStyle' => 
    array (
      'name' => 'jewelryStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Fine jewelry indicates a high-quality of material, workmanship, and durability. Fashion (sometimes called "costume" or "cosmetic") jewelry is made from inexpensive materials, is usually mass-produced, and has a generally lower level of quality.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Fine or Fashion',
      'group' => 'Discoverability',
      'rank' => '20000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Fine',
        1 => 'Fashion',
      ),
    ),
    'metal' => 
    array (
      'name' => 'metal',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'For items made primarily of metal, or where the metal component plays an important part in the makeup of the item and purchasing decision.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Metal',
      'group' => 'Discoverability',
      'rank' => '21000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'metalStamp' => 
    array (
      'name' => 'metalStamp',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Most jewelry items made of precious metal are stamped with information about the purity level of the metal content. Generally the stamp is placed in an inconspicuous place on the item so it does not detract from the design. Stamps will usually be located on the inside of the band on a ring, on the post or basket setting on a pair of earrings, on the bail (the part that the chain slides through) on a pendant, and on the connecting ring or the clasp on a necklace or bracelet. All jewelry stamps adhere to strict guidelines set by the Federal Trade Commission.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Metal Stamp',
      'group' => 'Discoverability',
      'rank' => '22000',
    ),
    'karats' => 
    array (
      'name' => 'karats',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measure of the purity or fineness of gold in an alloy, 100% pure gold being 24 Karats.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Gold Purity - Karats',
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
            0 => 'K',
          ),
        ),
      ),
    ),
    'plating' => 
    array (
      'name' => 'plating',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Metal plating. Use for items where the plating is a central feature, or important to the buying decision. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Plating',
      'group' => 'Discoverability',
      'rank' => '24000',
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
      'rank' => '25000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Male',
        1 => 'Female',
        2 => 'Unisex',
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
      'rank' => '26000',
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
            3 => 'Tween',
            4 => 'Teen',
            5 => 'Adult',
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
      'rank' => '27000',
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
      'rank' => '28000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Occasion',
      'group' => 'Discoverability',
      'rank' => '29000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'style' => 
    array (
      'name' => 'style',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'General description of qualities that represent a particular aesthetic.',
      'requiredLevel' => 'Optional',
      'displayName' => 
      array (
      ),
      'group' => 'Discoverability',
      'rank' => '29500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'personalRelationship' => 
    array (
      'name' => 'personalRelationship',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Descriptive terms for the roles people have in each other\'s lives, commonly centered on family or romance.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Personal Relationship',
      'group' => 'Discoverability',
      'rank' => '30000',
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
            0 => 'metal',
            1 => 'size',
            2 => 'ringSize',
            3 => 'color',
            4 => 'karats',
            5 => 'carats',
            6 => 'gemstone',
            7 => 'birthstone',
            8 => 'chainLength',
            9 => 'shape',
            10 => 'diameter',
            11 => 'sportsTeam',
            12 => 'countPerPack',
            13 => 'count',
            14 => 'style',
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
    'smallPartsWarnings' => 
    array (
      'name' => 'smallPartsWarnings',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'To determine if any choking warnings are applicable, check current product packaging for choking warning message(s). Please indicate the warning number (0-6). 0 - No warning applicable; 1 - Choking hazard is a small ball; 2 - Choking hazard contains small ball; 3 - Choking hazard contains small parts; 4 - Choking hazard balloon; 5 - Choking hazard is a marble; 6 - Choking hazard contains a marble.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Small Parts Warning Code',
      'group' => 'Compliance',
      'rank' => '41000',
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
    'certificateNumber' => 
    array (
      'name' => 'certificateNumber',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If the item has a certificate, enter the certificate number here. Separate multiple values by semicolons.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Certificate Number',
      'group' => 'Additional Category Attributes',
      'rank' => '53000',
    ),
    'birthstone' => 
    array (
      'name' => 'birthstone',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Name of month associated with this gemstone as a birthstone. The format used is: Month- Stone',
      'requiredLevel' => 'Optional',
      'displayName' => 'Birthstone',
      'group' => 'Additional Category Attributes',
      'rank' => '54000',
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
      'requiredLevel' => 'Optional',
      'displayName' => 'Pattern',
      'group' => 'Additional Category Attributes',
      'rank' => '55000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'claspType' => 
    array (
      'name' => 'claspType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If your item has a clasp, then choose a clasp type from the example values. If your value does not exist, enter one of your own. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Clasp Type',
      'group' => 'Additional Category Attributes',
      'rank' => '56000',
    ),
    'backFinding' => 
    array (
      'name' => 'backFinding',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Kind of hardware used in the "back" of the jewelry, as in the earring back that helps to fasten the earring to the ear. This may be, for example, the earring finding or jewelry backing style.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Back Finding',
      'group' => 'Additional Category Attributes',
      'rank' => '57000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'jewelrySetting' => 
    array (
      'name' => 'jewelrySetting',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Method or style in which stones are attached to a piece of jewelry.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Jewelry Setting',
      'group' => 'Additional Category Attributes',
      'rank' => '58000',
    ),
    'earringStyle' => 
    array (
      'name' => 'earringStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Style of earring, as represented by fashion or form. Select from example values; if your value does not exist, enter your own.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Earring Style',
      'group' => 'Additional Category Attributes',
      'rank' => '59000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'earringFeature' => 
    array (
      'name' => 'earringFeature',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Features distinct to earring jewelry.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Earring Feature',
      'group' => 'Additional Category Attributes',
      'rank' => '60000',
    ),
    'braceletStyle' => 
    array (
      'name' => 'braceletStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Style of bracelet as expressed by its fashion or form. Choose a value from the example values; if your value does not exist, then enter your own value.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Bracelet Style',
      'group' => 'Additional Category Attributes',
      'rank' => '61000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'necklaceStyle' => 
    array (
      'name' => 'necklaceStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Style of necklace as expressed by fashion or form. Select from the example values; if your value does not exist, enter your own.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Necklace Style',
      'group' => 'Additional Category Attributes',
      'rank' => '62000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'chainLength' => 
    array (
      'name' => 'chainLength',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Enter length of jewelry chain, in inches or feet.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Chain Length',
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
            0 => 'in',
            1 => 'ft',
          ),
        ),
      ),
    ),
    'chainPattern' => 
    array (
      'name' => 'chainPattern',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If pertinent, choose a pattern from the example values; if your value does not exist, then enter one of your own. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Chain Pattern',
      'group' => 'Additional Category Attributes',
      'rank' => '64000',
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
      'rank' => '65000',
    ),
    'diamondClarity' => 
    array (
      'name' => 'diamondClarity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Diamond clarity is a quality of diamonds relating to the existence and visual appearance of internal characteristics of a diamond called inclusions, and surface defects called blemishes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Diamond Clarity',
      'group' => 'Additional Category Attributes',
      'rank' => '67000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'diamondCut' => 
    array (
      'name' => 'diamondCut',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The style or design followed when cutting a diamond. This does not refer to the shape of the diamond, but the pattern of the cut itself.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Diamond Cut',
      'group' => 'Additional Category Attributes',
      'rank' => '68000',
      'dataType' => 'string',
      'maxLength' => '100',
      'minLength' => '1',
    ),
    'carats' => 
    array (
      'name' => 'carats',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measure of the weight (mass) of gemstones and pearls. One carat (ct) is equal to 200 mg.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Gemstone Weight - Carats',
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
            0 => 'ct',
          ),
        ),
      ),
    ),
    'totalDiamondWeight' => 
    array (
      'name' => 'totalDiamondWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Total diamond weight is the combined carat weight of all the diamonds in a piece of jewelry.  Paired earrings would be considered a single piece, therefore if each earring contained a diamond with a carat weight of 1/2, the value entered would be 1 ct (2 x 1/2 ct). ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Total Diamond Weight',
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
            0 => 'ct',
          ),
        ),
      ),
    ),
    'totalGemWeight' => 
    array (
      'name' => 'totalGemWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Total gemstone weight is the combined carat weight of all of the gemstones in a piece of jewelry. Paired earrings would be considered a single piece, therefore if each earring contained a gemstone with a carat weight of 1/2, the value entered would be 1 ct (2 x 1/2 ct).  This is a useful indication of gemstone sizes, provided the stones in question are of the same type.  Differing types have differing densities so the carat weight will not necessarily provide an accurate indication of size for comparison purposes.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Total Gemstone Weight',
      'group' => 'Additional Category Attributes',
      'rank' => '71000',
      'dataType' => 'decimal',
      'totalDigits' => '16',
    ),
    'gemstoneCut' => 
    array (
      'name' => 'gemstoneCut',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Type of gemstone cut, as distinct from shape',
      'requiredLevel' => 'Optional',
      'displayName' => 'Gemstone Cut',
      'group' => 'Additional Category Attributes',
      'rank' => '72000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'gemstone' => 
    array (
      'name' => 'gemstone',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The gemstone trade name (i.e., amethyst, not purple quartz).',
      'requiredLevel' => 'Optional',
      'displayName' => 'Gemstone',
      'group' => 'Additional Category Attributes',
      'rank' => '73000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'gemstoneColor' => 
    array (
      'name' => 'gemstoneColor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The color of the gemstone including factors of hue, tone and saturation. Expressed as a color grade, or descriptors (light rose). ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Gemstone Color',
      'group' => 'Additional Category Attributes',
      'rank' => '74000',
      'dataType' => 'string',
      'maxLength' => '100',
      'minLength' => '1',
    ),
    'gemstoneClarity' => 
    array (
      'name' => 'gemstoneClarity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Note that while the clarity rating scale (VVS, VS, etc.) is the same for colored gems as it is for diamonds, the meaning is different: Rating definitions vary based on the type of colored gem. Please refer to the specific ratings definitions for Type 1, Type 2, or Type 3 gems.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Gemstone Clarity',
      'group' => 'Additional Category Attributes',
      'rank' => '75000',
      'dataType' => 'string',
      'maxLength' => '3',
      'minLength' => '1',
    ),
    'stoneCreationMethod' => 
    array (
      'name' => 'stoneCreationMethod',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Whether the stone was created by nature or humans',
      'requiredLevel' => 'Optional',
      'displayName' => 'Stone Creation Method',
      'group' => 'Additional Category Attributes',
      'rank' => '76000',
      'dataType' => 'string',
      'maxLength' => '400',
      'minLength' => '1',
    ),
    'stoneTreatment' => 
    array (
      'name' => 'stoneTreatment',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes the process a gemstone has undergone to produce changes in the durability, color, and/or clarity that are beyond the typical gemstone conditioning.	',
      'requiredLevel' => 'Optional',
      'displayName' => 'Stone Treatment',
      'group' => 'Additional Category Attributes',
      'rank' => '77000',
      'dataType' => 'string',
      'maxLength' => '400',
      'minLength' => '1',
    ),
    'stoneHeight' => 
    array (
      'name' => 'stoneHeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The measurement of the height of the stone (vs. the setting) as measured the from the table (top of the stone) to the culet (bottom of the stone).',
      'requiredLevel' => 'Optional',
      'displayName' => 'Stone Height',
      'group' => 'Additional Category Attributes',
      'rank' => '78000',
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
            0 => 'mm',
          ),
        ),
      ),
    ),
    'stoneLength' => 
    array (
      'name' => 'stoneLength',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The measure of the largest dimensional side of a gemstone with the face pointing towards the observer.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Stone Length',
      'group' => 'Additional Category Attributes',
      'rank' => '79000',
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
            0 => 'mm',
          ),
        ),
      ),
    ),
    'stoneWidth' => 
    array (
      'name' => 'stoneWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The measure of the narrower dimensional side of a gemstone with the face pointing towards the observer.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Stone Width',
      'group' => 'Additional Category Attributes',
      'rank' => '80000',
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
            0 => 'mm',
          ),
        ),
      ),
    ),
    'stoneDepthPercentage' => 
    array (
      'name' => 'stoneDepthPercentage',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'This is calculated by the following formula: depth / width. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Stone Depth Percentage',
      'group' => 'Additional Category Attributes',
      'rank' => '81000',
      'dataType' => 'decimal',
      'totalDigits' => '16',
    ),
    'stoneTablePercentage' => 
    array (
      'name' => 'stoneTablePercentage',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'In a grading report, table percentage is calculated based on the size of the table divided by the average girdle diameter of the gem. So, a 60 percent table means that the table is 60 percent wide as the gem\'s outline.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Stone Table Percentage',
      'group' => 'Additional Category Attributes',
      'rank' => '82000',
      'dataType' => 'decimal',
      'totalDigits' => '16',
    ),
    'stoneSymmetry' => 
    array (
      'name' => 'stoneSymmetry',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Symmetry refers to the exactness of the shape and placement of the facets. The GIA grades both polish and symmetry and lists it on the certificate using the scale: Excellent, Very Good, Good, Fair and Poor.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Stone Symmetry',
      'group' => 'Additional Category Attributes',
      'rank' => '83000',
      'dataType' => 'string',
      'maxLength' => '100',
      'minLength' => '1',
    ),
    'stonePolish' => 
    array (
      'name' => 'stonePolish',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Polish refers to the degree of smoothness of each facet of a gem as measured by a gemologist. When a gem is cut and polished, microscopic surface defects may be created by the polishing wheel as it drags tiny dislodged crystals across the gem\'s surface.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Stone Polish',
      'group' => 'Additional Category Attributes',
      'rank' => '84000',
      'dataType' => 'string',
      'maxLength' => '100',
      'minLength' => '1',
    ),
    'stoneGirdle' => 
    array (
      'name' => 'stoneGirdle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The girdle is the thin perimeter of a stone, dividing the crown above from the pavilion below. When viewing a stone in its setting or from a profile view, the girdle is the widest part (or the circumference) of the polished stone - the portion of the stone that makes contact with the setting itself.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Stone Girdle',
      'group' => 'Additional Category Attributes',
      'rank' => '85000',
      'dataType' => 'string',
      'maxLength' => '100',
      'minLength' => '1',
    ),
    'stoneCulet' => 
    array (
      'name' => 'stoneCulet',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The culet (pronounced cue-let) is the small area at the bottom of a diamond\'s pavilion. The culet can be a point or a very small facet sitting parallel to the table.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Stone Culet',
      'group' => 'Additional Category Attributes',
      'rank' => '86000',
      'dataType' => 'string',
      'maxLength' => '100',
      'minLength' => '1',
    ),
    'stoneFluoresence' => 
    array (
      'name' => 'stoneFluoresence',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Used to describe the color and strength of the UV light reflected off some diamonds.	',
      'requiredLevel' => 'Optional',
      'displayName' => 'Stone Fluorescence',
      'group' => 'Additional Category Attributes',
      'rank' => '87000',
      'dataType' => 'string',
      'maxLength' => '100',
      'minLength' => '1',
    ),
    'pearlType' => 
    array (
      'name' => 'pearlType',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes the method for growing pearls and information about the origin of the pearl.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Pearl Type',
      'group' => 'Additional Category Attributes',
      'rank' => '89000',
    ),
    'pearlBodyColor' => 
    array (
      'name' => 'pearlBodyColor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The color of the pearl\'s body, vs. the overtone.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Pearl Body Color',
      'group' => 'Additional Category Attributes',
      'rank' => '90000',
    ),
    'pearlLustre' => 
    array (
      'name' => 'pearlLustre',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measure of the quality and quantity of light that reflects off a pearl.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Pearl Lustre',
      'group' => 'Additional Category Attributes',
      'rank' => '91000',
    ),
    'pearlShape' => 
    array (
      'name' => 'pearlShape',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The shape of the pearl, defined in part by how regular and smooth the surface of the pearl is.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Pearl Shape',
      'group' => 'Additional Category Attributes',
      'rank' => '92000',
    ),
    'pearlUniformity' => 
    array (
      'name' => 'pearlUniformity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes how well the individual pearls have been matched within a piece of pearl jewelry. Selection factor for quality and appearance, typically applied to pearl-strand necklaces. Values range from Excellent to Poor, depending on the degree of noticeable variations.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Pearl Uniformity',
      'group' => 'Additional Category Attributes',
      'rank' => '93000',
    ),
    'pearlSurfaceBlemishes' => 
    array (
      'name' => 'pearlSurfaceBlemishes',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Evaluation of pearls based on the blemishes or irregularities in the pearl’s surface, based on size, number, nature, location, visibility and type of surface characteristics. Values range from Clean to Heavily Spotted.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Pearl Surface Blemishes',
      'group' => 'Additional Category Attributes',
      'rank' => '94000',
    ),
    'pearlNacreThickness' => 
    array (
      'name' => 'pearlNacreThickness',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Thickness of the nacre, or iridescent layers which are produced by the mollusk to coat the nucleus of the pearl.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Pearl Nacre Thickness',
      'group' => 'Additional Category Attributes',
      'rank' => '95000',
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
            0 => 'mm',
          ),
        ),
      ),
    ),
    'pearlStringingMethod' => 
    array (
      'name' => 'pearlStringingMethod',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes the knotting method and material used in constructing the string of pearls.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Pearl Stringing Method',
      'group' => 'Additional Category Attributes',
      'rank' => '96000',
    ),
    'sizePerPearl' => 
    array (
      'name' => 'sizePerPearl',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Diameter of each pearl in millimeters.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Size Per Pearl',
      'group' => 'Additional Category Attributes',
      'rank' => '97000',
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
            0 => 'mm',
          ),
        ),
      ),
    ),
    'numberOfPearls' => 
    array (
      'name' => 'numberOfPearls',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Please provide a count of individual pearls on a single item.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Number of Pearls',
      'group' => 'Additional Category Attributes',
      'rank' => '98000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'inscription' => 
    array (
      'name' => 'inscription',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'If the item is engraved with an inscription, put the inscription text here.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Inscription',
      'group' => 'Additional Category Attributes',
      'rank' => '99000',
      'dataType' => 'string',
      'maxLength' => '100',
      'minLength' => '1',
    ),
    'isResizable' => 
    array (
      'name' => 'isResizable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that the item is resizable.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Resizable',
      'group' => 'Additional Category Attributes',
      'rank' => '100000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'ringSizingLowerRange' => 
    array (
      'name' => 'ringSizingLowerRange',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates the smallest size this ring can become if resized. Used with Ring Sizing Upper Range provides total size range if ring is resizable.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Ring Sizing Lower Range',
      'group' => 'Additional Category Attributes',
      'rank' => '101000',
      'dataType' => 'decimal',
      'totalDigits' => '16',
    ),
    'ringSizingUpperRange' => 
    array (
      'name' => 'ringSizingUpperRange',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates the largest size this ring can become if resized. Used with Ring Sizing Lower Range provides total size range if ring is resizable.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Ring Sizing Upper Range',
      'group' => 'Additional Category Attributes',
      'rank' => '102000',
      'dataType' => 'decimal',
      'totalDigits' => '16',
    ),
    'ringStyle' => 
    array (
      'name' => 'ringStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Form or design of a ring',
      'requiredLevel' => 'Optional',
      'displayName' => 'Ring Style',
      'group' => 'Additional Category Attributes',
      'rank' => '103000',
    ),
    'ringSize' => 
    array (
      'name' => 'ringSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Standardized numerical sizing of a jewelry ring (based on circumference), as utilized in the United States, Canada and Mexico. Can include quarter and half sizes, depending on which standard is used.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Ring Size',
      'group' => 'Additional Category Attributes',
      'rank' => '104000',
      'dataType' => 'decimal',
      'totalDigits' => '16',
    ),
    'circumference' => 
    array (
      'name' => 'circumference',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Measurement of a circular object around its perimeter. NOTE: for rings, measurement is taken from the inside of the ring. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Circumference',
      'group' => 'Additional Category Attributes',
      'rank' => '105000',
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
            1 => 'mm',
            2 => 'ft',
          ),
        ),
      ),
    ),
    'diameter' => 
    array (
      'name' => 'diameter',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The measurement from one side of a circle to the other, through the middle. NOTE: For rings, the measurement is taken from the inside of the ring.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Diameter',
      'group' => 'Additional Category Attributes',
      'rank' => '106000',
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
    'ringSizeStandard' => 
    array (
      'name' => 'ringSizeStandard',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'One of five major ring-sizing standards. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Ring Size Standard',
      'group' => 'Additional Category Attributes',
      'rank' => '107000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'U.S., Canada, Mexico',
        1 => 'U.K., Ireland, Australia',
        2 => 'China, Japan, South America',
        3 => 'India',
        4 => 'Italy, Spain, Netherlands, Switzerland',
        5 => 'ISO 8653: 1986',
      ),
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
      'rank' => '108000',
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
      'rank' => '109000',
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
      'requiredLevel' => 'Recommended',
      'displayName' => 'Theme',
      'group' => 'Additional Category Attributes',
      'rank' => '114000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'americanWireGuage' => 
    array (
      'name' => 'americanWireGuage',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'AWG indicates wire diameter. Both electrical wiring and jewelry piercing industries use AWG to describe product diameters. In the jewelry industry, AWG is used to describe both metallic and non-metallic products.',
      'requiredLevel' => 'Optional',
      'displayName' => 'American Wire Gauge',
      'group' => 'Additional Category Attributes',
      'rank' => '114500',
      'dataType' => 'integer',
      'optionValues' => 
      array (
        0 => '0000',
        1 => '000',
        2 => '00',
        3 => '0',
        4 => '1',
        5 => '2',
        6 => '3',
        7 => '4',
        8 => '5',
        9 => '6',
        10 => '7',
        11 => '8',
        12 => '9',
        13 => '10',
        14 => '11',
        15 => '12',
        16 => '13',
        17 => '14',
        18 => '15',
        19 => '16',
        20 => '17',
        21 => '18',
        22 => '19',
        23 => '20',
      ),
      'totalDigits' => '4',
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
      'rank' => '115000',
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
      'rank' => '120000',
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
      'rank' => '121000',
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
      'rank' => '122000',
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
      'rank' => '123000',
    ),
    'colorCategory' => 
    array (
      'name' => 'colorCategory',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Select the color from a short list that best describes the general color of the item. This improves searchability as it allows customers to view items by color from the left navigation when they perform a search.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Color Category',
      'group' => 'Nice to Have',
      'rank' => '126000',
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
    'character' => 
    array (
      'name' => 'character',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A person or entity portrayed in print or visual media. A character might be a fictional personality or an actual living person.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Character',
      'group' => 'Nice to Have',
      'rank' => '127000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'bodyParts' => 
    array (
      'name' => 'bodyParts',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The body part/s for which the item is intended.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Body Part',
      'group' => 'Nice to Have',
      'rank' => '128000',
    ),
    'designer' => 
    array (
      'name' => 'designer',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Name of the person who planned the form, look, or workings of the product to be made or built.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Designer',
      'group' => 'Nice to Have',
      'rank' => '129000',
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
                0 => 'metal',
                1 => 'size',
                2 => 'ringSize',
                3 => 'color',
                4 => 'karats',
                5 => 'carats',
                6 => 'gemstone',
                7 => 'birthstone',
                8 => 'chainLength',
                9 => 'shape',
                10 => 'diameter',
                11 => 'sportsTeam',
                12 => 'countPerPack',
                13 => 'count',
                14 => 'style',
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