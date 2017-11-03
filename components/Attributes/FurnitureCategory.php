<?php return $arr = array (
  'Furniture' => 
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
      'minOccurs' => '1',
      'documentation' => 'MPN uniquely identifies the product to its manufacturer. For many products this will be identical to the model number. Some manufacturers distinguish part number from model number. Having this information allows customers to search for items on the site and informs product matching.',
      'requiredLevel' => 'Required',
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
    'pattern' => 
    array (
      'name' => 'pattern',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Decorative design or visual ornamentation, often with a thematic, recurring motif.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Pattern',
      'group' => 'Discoverability',
      'rank' => '23000',
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
      'requiredLevel' => 'Optional',
      'displayName' => 'Gender',
      'group' => 'Discoverability',
      'rank' => '24000',
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
    'bedSize' => 
    array (
      'name' => 'bedSize',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Denotes the size of a bed, a bed\'s parts, mattress or bed linens in standard sizes.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Bed Size',
      'group' => 'Discoverability',
      'rank' => '27000',
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
      'rank' => '28000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'seatingCapacity' => 
    array (
      'name' => 'seatingCapacity',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of people that can be accommodated by the available seats of an item.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Seating Capacity',
      'group' => 'Discoverability',
      'rank' => '29000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'numberOfDrawers' => 
    array (
      'name' => 'numberOfDrawers',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of drawers included the furniture or storage unit.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Drawers',
      'group' => 'Discoverability',
      'rank' => '30000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'numberOfShelves' => 
    array (
      'name' => 'numberOfShelves',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of shelves included in the furniture or storage unit.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Shelves',
      'group' => 'Discoverability',
      'rank' => '31000',
      'dataType' => 'integer',
      'totalDigits' => '7',
    ),
    'collection' => 
    array (
      'name' => 'collection',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'A collection is a particular group of items that have the same visual style, made by the same brand.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Collection',
      'group' => 'Discoverability',
      'rank' => '32000',
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
      'rank' => '33000',
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
      'rank' => '34000',
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
      'rank' => '34500',
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
    'bedStyle' => 
    array (
      'name' => 'bedStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes the bed\'s shape and appearance according to its design features.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Bed Style',
      'group' => 'Discoverability',
      'rank' => '35000',
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
      'requiredLevel' => 'Optional',
      'displayName' => 'Mount Type',
      'group' => 'Discoverability',
      'rank' => '36000',
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
    'assembledProductWidth' => 
    array (
      'name' => 'assembledProductWidth',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The width of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Width',
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
    'assembledProductHeight' => 
    array (
      'name' => 'assembledProductHeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The height of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Height',
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
    'assembledProductWeight' => 
    array (
      'name' => 'assembledProductWeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The weight of the fully assembled product. NOTE: This information is shown on the item page.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Assembled Product Weight',
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
      'rank' => '44000',
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
      'rank' => '45000',
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
            1 => 'material',
            2 => 'bedSize',
            3 => 'finish',
            4 => 'pattern',
            5 => 'frameColor',
            6 => 'cushionColor',
            7 => 'shape',
            8 => 'diameter',
            9 => 'mountType',
            10 => 'baseColor',
            11 => 'baseFinish',
            12 => 'sportsTeam',
            13 => 'countPerPack',
            14 => 'count',
            15 => 'character',
            16 => 'assembledProductWidth',
            17 => 'size',
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
      'rank' => '46000',
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
      'rank' => '50000',
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
      'rank' => '51000',
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
      'rank' => '55000',
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
      'rank' => '56000',
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
      'rank' => '59000',
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
      'rank' => '60000',
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
      'rank' => '61000',
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
      'rank' => '65500',
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
      'rank' => '66750',
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
      'rank' => '68000',
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
      'rank' => '69000',
      'dataType' => 'anyURI',
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
    'fabricCareInstructions' => 
    array (
      'name' => 'fabricCareInstructions',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes how the fabric should be cleaned. Enter details of the fabric care label found on the item. (For garments, typically located inside on the top of the back or the lower left side.)',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Fabric Care Instructions',
      'group' => 'Additional Category Attributes',
      'rank' => '73000',
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
      'rank' => '73500',
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
      'rank' => '73625',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'cushionColor' => 
    array (
      'name' => 'cushionColor',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Color of the cushion portion of an item, as distinguished from the main color of the rest of the item. ',
      'requiredLevel' => 'Optional',
      'displayName' => 'Cushion Color',
      'group' => 'Additional Category Attributes',
      'rank' => '73750',
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
    'recommendedLocations' => 
    array (
      'name' => 'recommendedLocations',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The primary location recommended for the item\'s use.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Recommended Location',
      'group' => 'Additional Category Attributes',
      'rank' => '76000',
    ),
    'mattressFirmness' => 
    array (
      'name' => 'mattressFirmness',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The mattresses level of firmness.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Mattress Firmness',
      'group' => 'Additional Category Attributes',
      'rank' => '77000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'mattressThickness' => 
    array (
      'name' => 'mattressThickness',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The mattresses thickness/height in inches.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Mattress Thickness',
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
            0 => 'in',
          ),
        ),
      ),
    ),
    'pumpIncluded' => 
    array (
      'name' => 'pumpIncluded',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Is a pump included with the mattress?',
      'requiredLevel' => 'Optional',
      'displayName' => 'Pump Included',
      'group' => 'Additional Category Attributes',
      'rank' => '79000',
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
      'group' => 'Additional Category Attributes',
      'rank' => '80000',
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
      'rank' => '81000',
    ),
    'seatMaterial' => 
    array (
      'name' => 'seatMaterial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The seat material if different than the item\'s main material makeup, which is described using the "Material" attribute.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Seat Material',
      'group' => 'Additional Category Attributes',
      'rank' => '82000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'seatHeight' => 
    array (
      'name' => 'seatHeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The height from the floor to the top of the seat, in inches.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Seat Height',
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
            0 => 'in',
          ),
        ),
      ),
    ),
    'seatBackHeight' => 
    array (
      'name' => 'seatBackHeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The seat back height from the base of the seat to the top of the back, in inches.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Seat Back Height',
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
            0 => 'in',
          ),
        ),
      ),
    ),
    'tableHeight' => 
    array (
      'name' => 'tableHeight',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Height of a table, if it needs to be distinguished from other items in a set. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Table Height',
      'group' => 'Additional Category Attributes',
      'rank' => '84250',
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
    'topMaterial' => 
    array (
      'name' => 'topMaterial',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Material of a top component of an item, if it needs to be distinguished from the rest of the components. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Top Material',
      'group' => 'Additional Category Attributes',
      'rank' => '84500',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'topDimensions' => 
    array (
      'name' => 'topDimensions',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Dimensions of the top component of an item, such as a table. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Top Dimensions',
      'group' => 'Additional Category Attributes',
      'rank' => '84562',
      'dataType' => 'string',
      'maxLength' => '40',
      'minLength' => '1',
    ),
    'topFinish' => 
    array (
      'name' => 'topFinish',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Finish of the top of a table, if it needs to be distinguished from other components. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Top Finish',
      'group' => 'Additional Category Attributes',
      'rank' => '84625',
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
      'rank' => '84656',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '84687',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '84718',
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
      'rank' => '84734',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '84750',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
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
      'rank' => '84765',
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
      'rank' => '84773',
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
    'numberOfHooks' => 
    array (
      'name' => 'numberOfHooks',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of hooks on a coat & hat rack.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Hooks',
      'group' => 'Additional Category Attributes',
      'rank' => '84781',
      'dataType' => 'decimal',
      'totalDigits' => '40',
    ),
    'headboardStyle' => 
    array (
      'name' => 'headboardStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Describes the design, overall style, and major features of a bed\'s headboard.',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Headboard Style',
      'group' => 'Additional Category Attributes',
      'rank' => '84812',
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
      'rank' => '84875',
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
      'rank' => '85000',
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
      'rank' => '86000',
      'dataType' => 'string',
      'optionValues' => 
      array (
        0 => 'Yes',
        1 => 'No',
      ),
    ),
    'isInflatable' => 
    array (
      'name' => 'isInflatable',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Indicates that an item can be inflated.',
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Inflatable',
      'group' => 'Additional Category Attributes',
      'rank' => '87000',
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
      'rank' => '88000',
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
      'rank' => '89000',
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
      'requiredLevel' => 'Optional',
      'displayName' => 'Is Powered',
      'group' => 'Additional Category Attributes',
      'rank' => '90000',
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
      'rank' => '91000',
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
      'group' => 'Additional Category Attributes',
      'rank' => '92000',
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
      'rank' => '93000',
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
      'rank' => '94000',
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
      'rank' => '95000',
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
      'rank' => '96000',
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
      'rank' => '97000',
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
      'rank' => '102000',
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
      'rank' => '103000',
      'dataType' => 'string',
      'maxLength' => '4000',
      'minLength' => '1',
    ),
    'numberOfPanels' => 
    array (
      'name' => 'numberOfPanels',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'The number of panels the product has as in room dividers and fireplace screens. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Number of Panels',
      'group' => 'Additional Category Attributes ',
      'rank' => '105000',
      'dataType' => 'decimal',
      'totalDigits' => '40',
    ),
    'seatBackStyle' => 
    array (
      'name' => 'seatBackStyle',
      'maxOccurs' => '1',
      'minOccurs' => '0',
      'documentation' => 'Descriptive term for the pattern or form of a seat back component. ',
      'requiredLevel' => 'Recommended',
      'displayName' => 'Seat Back Style',
      'group' => 'Additional Category Attributes',
      'rank' => '106000',
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
                1 => 'material',
                2 => 'bedSize',
                3 => 'finish',
                4 => 'pattern',
                5 => 'frameColor',
                6 => 'cushionColor',
                7 => 'shape',
                8 => 'diameter',
                9 => 'mountType',
                10 => 'baseColor',
                11 => 'baseFinish',
                12 => 'sportsTeam',
                13 => 'countPerPack',
                14 => 'count',
                15 => 'character',
                16 => 'assembledProductWidth',
                17 => 'size',
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