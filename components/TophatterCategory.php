<?php
namespace frontend\modules\tophatter\components;

use Yii;
use yii\base\Component;
use frontend\modules\tophatter\components\Tophatterapi;
use frontend\modules\tophatter\components\Data;

class TophatterCategory extends Component
{

    public static function getCategoryOrder($category = null)
    {
        $categoryOrder = [];

        switch ($category) {
            case 'Animal': {
                $categoryOrder = [
                    'animalBreed', 'swatchImages/swatchImage/swatchImageUrl',
                    'swatchImages/swatchImage/swatchVariantAttribute', 'animalLifestage', 'minimumWeight/unit',
                    'variantAttributeNames/variantAttributeName', 'variantGroupId',
                    'isPrimaryVariant', 'fabricContent/fabricContentValue',
                    'fabricCareInstructions/fabricCareInstruction', 'brand', 'manufacturer', 'modelNumber',
                    'manufacturerPartNumber', 'color/colorValue', 'animalType', 'material/materialValue',
                    'pattern/patternValue', 'isPortable', 'isFoldable', 'maximumWeight/unit', 'maximumWeight/measure',
                    'petSize'
                ];
                break;
            }
            case 'AnimalHealthAndGrooming': {
                $categoryOrder = [
                    'condition', 'isDisposable', 'powerType', 'animalHealthConcern', 'hairLength/hairLengthValue',
                    'scent', 'isDrugFactsLabelRequired', 'drugFactsLabel',
                    'activeIngredients/activeIngredient/activeIngredientName',
                    'activeIngredients/activeIngredient/activeIngredientPercentage',
                    'inactiveIngredients/inactiveIngredient', 'form', 'instructions', 'dosage',
                    'stopUseIndications/stopUseIndication', 'petSize'
                ];
                break;
            }
            case 'AnimalAccessories': {
                $categoryOrder = [
                    'condition', 'minimumTemperature/unit', 'minimumTemperature/measure', 'clothingSize',
                    'batteriesRequired', 'batterySize', 'character/characterValue', 'isRetractable', 'isReflective',
                    'makesNoise', 'maximumTemperature/unit', 'maximumTemperature/measure', 'capacity', 'shape'
                ];
                break;
            }
            case 'AnimalFood': {
                $categoryOrder = [
                    'flavor', 'petFoodForm', 'nutrientContentClaims/nutrientContentClaim', 'isGrainFree',
                    'feedingInstructions', 'animalHealthConcern', 'ingredients'
                ];
                break;
            }

            case 'ArtAndCraft': {
                $categoryOrder = [
                    'metal', 'isRefillable', 'plating', 'swatchImages/swatchImage/swatchImageUrl',
                    'swatchImages/swatchImage/swatchVariantAttribute', 'ageRange',
                    'variantAttributeNames/variantAttributeName', 'variantGroupId', 'isPrimaryVariant',
                    'fabricContent/fabricContentValue', 'finish', 'isRecyclable', 'culturalStyle', 'chainLength/unit',
                    'chainLength/unit', 'fabricCareInstructions/fabricCareInstruction', 'brand', 'condition',
                    'manufacturer', 'theme/themeValue', 'modelNumber', 'manufacturerPartNumber', 'gender',
                    'color/colorValue', 'ageGroup', 'isBulk', 'isReusable', 'isDisposable', 'isAntique',
                    'pattern/patternValue', 'material/materialValue', 'isAntitarnish', 'numberOfPieces',
                    'character/characterValue', 'isPowered', 'powerType', 'occasion/occasionValue',
                    'isPersonalizable', 'artPaintType', 'isPortable', 'isMadeFromRecycledMaterial',
                    'recommendedUses/recommendedUse',
                    'recycledMaterialContent/recycledMaterialContentValue/recycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/percentageOfRecycledMaterial',
                    'isRetractable', 'gotsCertification', 'isFoldable', 'isCollectible', 'isHandmade', 'diameter/unit',
                    'diameter/measure', 'skillLevel', 'isSelfAdhesive', 'recommendedSurfaces/recommendedSurface',
                    'capacity', 'subject', 'scent', 'form', 'organicCertifications/organicCertification', 'shape'
                ];
                break;
            }

            case 'Baby': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl', 'swatchImages/swatchImage/swatchVariantAttribute',
                    'ageRange', 'minimumWeight/measure', 'variantAttributeNames/variantAttributeName', 'variantGroupId',
                    'isPrimaryVariant', 'fabricContent/fabricContentValue',
                    'fabricCareInstructions/fabricCareInstruction', 'brand', 'condition', 'manufacturer', 'modelNumber',
                    'manufacturerPartNumber', 'gender', 'color/colorValue', 'ageGroup', 'isReusable', 'isDisposable',
                    'pattern/patternValue', 'material/materialValue', 'numberOfPieces', 'character/characterValue',
                    'occasion/occasionValue', 'isPersonalizable', 'isPortable', 'isMadeFromRecycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/recycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/percentageOfRecycledMaterial',
                    'recommendedUses/recommendedUse', 'numberOfChannels', 'isFairTrade', 'maximumRecommendedAge/unit',
                    'maximumRecommendedAge/measure', 'minimumRecommendedAge/unit', 'minimumRecommendedAge/measure',
                    'sport/sportValue', 'maximumWeight/unit', 'maximumWeight/measure',
                    'diaposableBabyDiaperType/diaposableBabyDiaperTypeValue', 'capacity', 'scent',
                    'organicCertifications/organicCertification', 'screenSize/unit', 'screenSize/measure',
                    'displayTechnology'
                ];
                break;
            }
            case 'ChildCarSeats': {
                $categoryOrder = [
                    'childCarSeatType', 'facingDirection', 'forwardFacingMinimumWeight/unit',
                    'forwardFacingMinimumWeight/measure', 'forwardFacingMaximumWeight/unit',
                    'forwardFacingMaximumWeight/measure', 'rearFacingMinimumWeight/unit',
                    'rearFacingMinimumWeight/measure', 'rearFacingMaximumWeight/unit',
                    'rearFacingMaximumWeight/measure', 'hasLatchSystem'
                ];
                break;
            }
            case 'BabyClothing': {
                $categoryOrder = [
                    'color/colorValue', 'apparelCategory', 'season/seasonValue', 'babyClothingSize'
                ];
                break;
            }
            case 'BabyFootwear': {
                $categoryOrder = [
                    'shoeCategory', 'shoeSize', 'shoeWidth', 'shoeStyle', 'shoeClosure'
                ];
                break;
            }
            case 'Strollers': {
                $categoryOrder = [
                    'seatingCapacity', 'strollerType'
                ];
                break;
            }
            case 'BabyFurniture': {
                $categoryOrder = [
                    'collection', 'finish', 'homeDecorStyle', 'isWheeled', 'isFoldable', 'isAssemblyRequired',
                    'assemblyInstructions', 'mattressFirmness', 'fillMaterial/fillMaterialValue', 'bedSize', 'shape'
                ];
                break;
            }
            case 'BabyToys': {
                $categoryOrder = [
                    'animalBreed', 'ageRange', 'theme/themeValue', 'batteriesRequired', 'batterySize',
                    'awardsWon/awardsWonValue', 'animalType', 'isPowered', 'powerType', 'isRemoteControlIncluded',
                    'makesNoise', 'fillMaterial/fillMaterialValue', 'educationalFocus/educationalFocus'
                ];
                break;
            }
            case 'BabyFood': {
                $categoryOrder = [
                    'flavor', 'nutrientContentClaims/nutrientContentClaim', 'servingSize', 'servingsPerContainer',
                    'isBabyFormulaLabelRequired', 'babyFormulaLabel', 'isChildrenUnder2LabelRequired',
                    'childrenUnder2Label', 'isChildrenUnder4LabelRequired', 'childrenUnder4Label',
                    'fluidOuncesSupplying100Calories', 'calories', 'caloriesFromFat/unit', 'caloriesFromFat/measure',
                    'totalFat/unit', 'totalFat/measure', 'totalFatPercentageDailyValue/unit',
                    'totalFatPercentageDailyValue/measure', 'totalCarbohydrate/unit', 'totalCarbohydrate/measure',
                    'totalCarbohydratePercentageDailyValue/value', 'totalCarbohydratePercentageDailyValue/measure',
                    'nutrients/nutrient/nutrientName', 'nutrients/nutrient/nutrientAmount',
                    'nutrients/nutrient/nutrientPercentageDailyValue'
                ];
                break;
            }

            case 'CarriersAndAccessories': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl', 'swatchImages/swatchImage/swatchVariantAttribute',
                    'variantAttributeNames/variantAttributeName', 'variantGroupId', 'isPrimaryVariant',
                    'fabricContent/fabricContentValue', 'isWeatherResistant', 'fabricCareInstructions/fabricCareInstruction',
                    'brand', 'dimensions', 'condition', 'isLined', 'manufacturer', 'numberOfWheels', 'modelNumber',
                    'handleMaterial/handleMaterialValue', 'manufacturerPartNumber', 'gender', 'color/colorValue', 'handleType',
                    'ageGroup/ageGroupValue', 'designer', 'leatherGrade', 'material/materialValue', 'pattern/patternValue',
                    'character/characterValue', 'monogramLetter', 'numberOfPieces', 'zipperMaterial', 'isPersonalizable',
                    'lockingMechanism', 'hardOrSoftCase', 'isMadeFromRecycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/recycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/percentageOfRecycledMaterial',
                    'isWheeled', 'isFairTrade', 'capacity', 'isWaterproof'
                ];
                break;
            }
            case 'CasesAndBags': {
                $categoryOrder = [
                    'finish', 'isReusable', 'occasion/occasionValue', 'recommendedUses/recommendedUse', 'bagStyle', 'isFoldable',
                    'fastenerType', 'numberOfCompartments', 'hasRemovableStrap', 'isTsaApproved', 'sport/sportValue',
                    'maximumWeight/unit', 'maximumWeight/value', 'shape', 'screenSize/unit', 'screenSize/value',
                    'compatibleBrands/compatibleBrand', 'compatibleDevices/compatibleDevice'
                ];
                break;
            }

            case 'Clothing': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl',
                    'swatchImages/swatchImage/swatchVariantAttribute', 'variantAttributeNames/variantAttributeName', 'variantGroupId', 'isPrimaryVariant',
                    'fabricContent/fabricContentValue/materialName', 'fabricCareInstructions/fabricCareInstruction', 'brand',
                    'manufacturer', 'modelNumber', 'clothingSize', 'gender', 'color/colorValue', 'ageGroup/ageGroupValue',
                    'clothingSizeType', 'isMaternity', 'pattern/patternValue', 'character/characterValue',
                    'occasion/occasionValue', 'apparelCategory', 'isPersonalizable', 'isMadeFromRecycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/recycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/percentageOfRecycledMaterial',
                    'gotsCertification', 'season/seasonValue', 'sport/sportValue'
                ];
                break;
            }
            case 'ShirtsAndTops': {
                $categoryOrder = [
                    //'shirtSize/unit', 'shirtSize/measure', 'shirtNeckStyle', 'sleeveStyle'
                    'shirtSize', 'shirtNeckStyle', 'sleeveStyle'
                ];
                break;
            }
            case 'WomensSwimsuits': {
                $categoryOrder = [
                    'braSize', 'swimsuitStyle'
                ];
                break;
            }
            case 'Bras': {
                $categoryOrder = [
                    'braSize', 'swimsuitStyle'
                ];
                break;
            }
            case 'Skirts': {
                $categoryOrder = [
                    'waistSize/unit', 'waistSize/measure', 'skirtAndDressCut'
                ];
                break;
            }
            case 'PantsAndShorts': {
                $categoryOrder = [
                    'pantSize/inseam', 'pantSize/waistSize', 'pantRise', 'pantStyle', 'pantPanelStyle'
                ];
                break;
            }
            case 'ClothingAccessories': {
                $categoryOrder = [
                    'material/materialValue'
                ];
                break;
            }
            case 'Dresses': {
                $categoryOrder = [
                    'skirtAndDressCut', 'dressStyle', 'sleeveStyle'
                ];
                break;
            }
            case 'DressShirts': {
                $categoryOrder = [
                    'dressShirtSize/neckSize', 'dressShirtSize/sleeveLength', 'collarType', 'sleeveStyle'
                ];
                break;
            }
            case 'Socks': {
                $categoryOrder = [
                    'sockSize', 'sockStyle'
                ];
                break;
            }
            case 'Panties': {
                $categoryOrder = [
                    'pantySize', 'pantyStyle'
                ];
                break;
            }

            case 'Electronics': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl', 'swatchImages/swatchImage/swatchVariantAttribute',
                    'variantAttributeNames/variantAttributeName', 'variantGroupId', 'isPrimaryVariant',
                    'isEnergyGuideLabelRequired', 'energyGuideLabel', 'hasSignalBooster', 'hasWirelessMicrophone',
                    'brand', 'manufacturer', 'modelNumber', 'manufacturerPartNumber', 'color/colorValue', 'ageGroup',
                    'batteriesRequired', 'batterySize', 'isEnergyStarCertified', 'connections/connection',
                    'material/materialValue', 'numberOfPieces', 'isRemoteControlIncluded', 'isPersonalizable',
                    'isPortable', 'isCordless', 'recommendedUses/recommendedUse',
                    'recommendedLocations/recommendedLocation', 'audioPowerOutput', 'peakAudioPowerCapacity/unit',
                    'peakAudioPowerCapacity/measure', 'audioFeatures/audioFeature', 'numberOfChannels', 'resolution',
                    'platform'
                ];
                break;
            }
            case 'VideoProjectors': {
                $categoryOrder = [
                    'aspectRatio', 'brightness/unit', 'brightness/measure', 'nativeResolution', 'maximumContrastRatio',
                    'throwRatio', 'lampLife/unit', 'lampLife/measure', 'has3dCapabilities',
                    'inputsAndOutputs/inputsAndOutput', 'hasIntegratedSpeakers', 'screenSize/unit',
                    'screenSize/measure', 'displayTechnology', 'wirelessTechnologies/wirelessTechnology'
                ];
                break;
            }
            case 'Computers': {
                $categoryOrder = [
                    'operatingSystem/operatingSystemValue', 'hasFrontFacingCamera', 'graphicsInformation',
                    'opticalDrive', 'formFactor', 'hasTouchscreen', 'resolution', 'screenSize/unit',
                    'screenSize/measure', 'displayTechnology', 'hasBluetooth', 'batteryLife/unit',
                    'batteryLife/measure', 'frontFacingCameraMegapixels/unit', 'frontFacingCameraMegapixels/measure',
                    'rearCameraMegapixels/unit', 'rearCameraMegapixels/measure', 'hardDriveCapacity/unit',
                    'hardDriveCapacity/measure', 'maximumRamSupported/unit', 'maximumRamSupported/measure',
                    'processorSpeed/unit', 'processorSpeed/measure', 'processorType/processorTypeValue',
                    'ramMemory/unit', 'ramMemory/measure', 'wirelessTechnologies/wirelessTechnology'
                ];
                break;
            }
            case 'ElectronicsAccessories': {
                $categoryOrder = [
                    'recordableMediaFormats/recordableMediaFormat', 'compatibleBrands/compatibleBrand',
                    'compatibleDevices/compatibleDevice', 'wirelessTechnologies/wirelessTechnology',
                    'tvAndMonitorMountType', 'minimumScreenSize/unit', 'minimumScreenSize/measure',
                    'maximumScreenSize/unit', 'maximumScreenSize/measure', 'maximumLoadWeight/unit',
                    'maximumLoadWeight/measure', 'headphoneFeatures/headphoneFeature'
                ];
                break;
            }
            case 'ComputerComponents': {
                $categoryOrder = [
                    'internalExternal', 'hardDriveCapacity/unit', 'hardDriveCapacity/measure', 'cpuSocketType/unit',
                    'cpuSocketType/measure', 'motherboardFormFactor/motherboardFormFactorValue',
                    'maximumRamSupported/unit', 'maximumRamSupported/measure', 'processorSpeed/unit',
                    'processorSpeed/measure', 'processorType/processorTypeValue', 'ramMemory/unit', 'ramMemory/measure',
                    'wirelessTechnologies/wirelessTechnology'
                ];
                break;
            }
            case 'Software': {
                $categoryOrder = [
                    'softwareCategory/softwareCategoryValue', 'systemRequirements/systemRequirement', 'version',
                    'numberOfUsers', 'softwareFormat', 'requiredPeripherals', 'educationalFocus/educationalFocus',
                    'operatingSystem/operatingSystemValue'
                ];
                break;
            }
            case 'VideoGames': {
                $categoryOrder = [
                    'videoGameGenre', 'esrbRating', 'sport/sportValue', 'targetAudience/targetAudienceValue',
                    'isOnlineMultiplayerAvailable', 'isDownloadableContentAvailable', 'edition', 'videoGameCollection',
                    'requiredPeripherals', 'platform'
                ];
                break;
            }
            case 'PrintersScannersAndImaging': {
                $categoryOrder = [
                    'hasAutomaticDocumentFeeder', 'hasAutomaticTwoSidedPrinting', 'colorPagesPerMinute',
                    'maximumDocumentSize', 'maximumPrintResolution/unit', 'maximumPrintResolution/measure',
                    'maximumScannerResolution/unit', 'maximumScannerResolution/measure', 'monochromeColor',
                    'printingTechnology', 'monochromePagesPerMinute', 'wirelessTechnologies/wirelessTechnology'
                ];
                break;
            }
            case 'ElectronicsCables': {
                $categoryOrder = [
                    'connectorFinish', 'cableLength/unit', 'cableLength/measure', 'numberOfTwistedPairsPerCable',
                    'compatibleDevices/compatibleDevice'
                ];
                break;
            }
            case 'TVsAndVideoDisplays': {
                $categoryOrder = [
                    'televisionType/televisionTypeValue', 'hasTouchscreen', 'backlightType', 'refreshRate/unit',
                    'refreshRate/measure', 'responseTime/unit', 'responseTime/measure', 'aspectRatio',
                    'nativeResolution', 'maximumContrastRatio', 'inputsAndOutputs/inputsAndOutput',
                    'hasIntegratedSpeakers', 'resolution', 'screenSize/unit', 'screenSize/measure', 'displayTechnology',
                    'wirelessTechnologies/wirelessTechnology'
                ];
                break;
            }
            case 'CellPhones': {
                $categoryOrder = [
                    'cellPhoneType', 'resolution', 'screenSize/unit', 'screenSize/measure',
                    'mobileOperatingSystem/mobileOperatingSystemValue', 'modelName', 'displayTechnology', 'hasBluetooth',
                    'batteryLife/unit', 'batteryLife/measure', 'cellPhoneServiceProvider', 'cellularNetworkTechnology',
                    'frontFacingCameraMegapixels/unit', 'frontFacingCameraMegapixels/measure', 'hasFlash',
                    'standbyTime/unit', 'standbyTime/measure', 'talkTime/unit', 'talkTime/measure',
                    'rearCameraMegapixels/unit', 'rearCameraMegapixels/measure', 'maximumRamSupported/unit',
                    'maximumRamSupported/measure', 'processorSpeed/unit', 'processorSpeed/measure',
                    'processorType/processorTypeValue', 'ramMemory/unit', 'ramMemory/measure',
                    'wirelessTechnologies/wirelessTechnology'
                ];
                break;
            }

            case 'FoodAndBeverage': {
                $categoryOrder = [
                    'isNutritionFactsLabelRequired', 'nutritionFactsLabel', 'nutritionFactsLabel',
                    'foodForm', 'isImitation', 'foodAllergenStatements/foodAllergenStatement', 'usdaInspected',
                    'vintage', 'timeAged/unit', 'timeAged/measure', 'variantAttributeNames/variantAttributeName',
                    'isGmoFree', 'variantGroupId', 'isPrimaryVariant', 'isBpaFree', 'isPotentiallyHazardousFood',
                    'isReadyToEat', 'caffeineDesignation', 'brand', 'manufacturer', 'spiceLevel', 'flavor', 'beefCut',
                    'poultryCut', 'color/colorValue', 'isMadeInHomeKitchen', 'nutrientContentClaims/nutrientContentClaim',
                    'safeHandlingInstructions', 'character/characterValue', 'occasion/occasionValue', 'isPersonalizable',
                    'fatCaloriesPerGram', 'recommendedUses/recommendedUse', 'carbohydrateCaloriesPerGram',
                    'totalProtein/unit', 'totalProtein/measure', 'totalProteinPercentageDailyValue/unit',
                    'totalProteinPercentageDailyValue/measure', 'proteinCaloriesPerGram', 'isFairTrade', 'isIndustrial',
                    'ingredients', 'releaseDate', 'servingSize', 'servingsPerContainer',
                    'organicCertifications/organicCertification', 'instructions', 'calories', 'caloriesFromFat/unit',
                    'caloriesFromFat/measure', 'totalFat/unit', 'totalFat/measure', 'totalFatPercentageDailyValue/unit',
                    'totalFatPercentageDailyValue/measure', 'totalCarbohydrate/unit', 'totalCarbohydrate/measure',
                    'totalCarbohydratePercentageDailyValue/unit', 'totalCarbohydratePercentageDailyValue/measure',
                    'nutrients/nutrient'
                ];
                break;
            }
            case 'AlcoholicBeverages': {
                $categoryOrder = [
                    'alcoholContentByVolume', 'alcoholProof', 'alcoholClassAndType', 'neutralSpiritsColoringAndFlavoring',
                    'whiskeyPercentage', 'isEstateBottled', 'wineAppellation', 'wineVarietal', 'containsSulfites', 'isNonGrape'
                ];
                break;
            }

            case 'Footwear': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl', 'swatchImages/swatchImage/swatchVariantAttribute',
                    'systemOfMeasurement', 'variantAttributeNames/variantAttributeName', 'variantGroupId',
                    'isPrimaryVariant', 'fabricContent/fabricContentValue', 'finish',
                    'fabricCareInstructions/fabricCareInstruction', 'brand', 'manufacturer', 'modelNumber',
                    'manufacturerPartNumber', 'gender', 'color/colorValue', 'ageGroup', 'material/materialValue',
                    'pattern/patternValue', 'isPowered', 'character/characterValue', 'occasion/occasionValue',
                    'isMadeFromRecycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/recycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/percentageOfRecycledMaterial',
                    'recommendedLocations/recommendedLocation', 'sport/sportValue'
                ];
                break;
            }
            case 'Shoes': {
                $categoryOrder = [
                    'shoeCategory', 'shoeSize', 'shoeWidth', 'heelHeight/unit', 'heelHeight/measure',
                    'shoeStyle', 'casualAndDressShoeType', 'shoeClosure', 'isWaterResistant', 'isOrthopedic'
                ];
                break;
            }

            case 'Furniture': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl', 'swatchImages/swatchImage/swatchVariantAttribute',
                    'collection', 'variantAttributeNames/variantAttributeName', 'variantGroupId', 'isPrimaryVariant',
                    'fabricContent/fabricContentValue', 'finish', 'homeDecorStyle',
                    'fabricCareInstructions/fabricCareInstruction', 'brand', 'manufacturer', 'theme/themeValue',
                    'modelNumber', 'manufacturerPartNumber', 'gender', 'color/colorValue', 'ageGroup',
                    'recommendedRooms/recommendedRoom', 'mountTypeValue', 'isAntique', 'pattern/patternValue',
                    'material/materialValue', 'isPowered', 'numberOfPieces', 'character/characterValue', 'powerType',
                    'isMadeFromRecycledMaterial', 'recommendedUses/recommendedUse',
                    'recycledMaterialContent/recycledMaterialContentValue/recycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/percentageOfRecycledMaterial',
                    'recommendedLocations/recommendedLocation', 'seatingCapacity', 'isInflatable', 'isWheeled',
                    'numberOfDrawers', 'numberOfShelves', 'isFoldable', 'isIndustrial', 'isAssemblyRequired',
                    'assemblyInstructions', 'fillMaterial/fillMaterialValue', 'shape'
                ];
                break;
            }
            case 'Seating': {
                $categoryOrder = [
                    'seatBackHeight/unit', 'seatBackHeight/measure', 'seatMaterial', 'seatHeight/unit',
                    'seatHeight/measure', 'frameMaterial'
                ];
                break;
            }
            case 'TVFurniture': {
                $categoryOrder = [
                    'maximumScreenSize/unit', 'maximumScreenSize/measure'
                ];
                break;
            }
            case 'Beds': {
                $categoryOrder = [
                    'bedStyle', 'bedSize'
                ];
                break;
            }
            case 'Mattresses': {
                $categoryOrder = [
                    'mattressFirmness', 'mattressThickness', 'pumpIncluded', 'bedSize',
                ];
                break;
            }

            case 'GardenAndPatio': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl', 'swatchImages/swatchImage/swatchVariantAttribute',
                    'variantAttributeNames/variantAttributeName', 'variantGroupId', 'isPrimaryVariant',
                    'fabricContent/fabricContentValue', 'isWeatherResistant', 'finish', 'homeDecorStyle', 'plantCategory',
                    'fabricCareInstructions/fabricCareInstruction', 'brand', 'condition', 'manufacturer', 'theme/themeValue',
                    'minimumTemperature/unit', 'minimumTemperature/measure', 'modelNumber', 'manufacturerPartNumber',
                    'color/colorValue', 'isBulk', 'ageGroup/ageGroupValue', 'batteriesRequired', 'batterySize',
                    'isEnergyStarCertified', 'isAntique', 'material/materialValue', 'pattern/patternValue', 'numberOfPieces',
                    'character/characterValue', 'isPowered', 'powerType', 'occasion/occasionValue', 'coverageArea/unit',
                    'coverageArea/measure', 'cleaningCareAndMaintenance', 'isMadeFromRecycledMaterial',
                    'recommendedUses/recommendedUse',
                    'recycledMaterialContent/recycledMaterialContentValue/recycledMaterial', 'flowRate/unit',
                    'flowRate/measure', 'recommendedLocations/recommendedLocation', 'hasRadiantHeat', 'season/seasonValue',
                    'isWheeled', 'isFoldable', 'isIndustrial', 'maximumWeight/unit', 'maximumWeight/measure',
                    'isTearResistant', 'installationType', 'capacity', 'fuelType', 'volts/unit', 'volts/measure',
                    'watts/unit', 'watts/measure', 'btu', 'isWaterproof', 'hasAutomaticShutoff',
                    'frameMaterial/frameMaterialValue', 'shape', 'displayTechnology', 'lightBulbType'
                ];
                break;
            }
            case 'GrillsAndOutdoorCooking': {
                $categoryOrder = [
                    'flavor', 'numberOfBurners', 'hasSideShelf', 'hasCharcoalBasket', 'totalCookingArea/unit',
                    'totalCookingArea/measure', 'sideBurnerSize/unit', 'sideBurnerSize/measure', 'hasTankTray',
                    'lifespan'
                ];
                break;
            }

            case 'HealthAndBeauty': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl', 'swatchImages/swatchImage/swatchVariantAttribute',
                    'collection', 'variantAttributeNames/variantAttributeName', 'flexibleSpendingAccountEligible',
                    'variantGroupId', 'isPrimaryVariant', 'fabricContent/fabricContentValue', 'isAdultProduct',
                    'fabricCareInstructions/fabricCareInstruction', 'brand', 'manufacturer', 'modelNumber',
                    'manufacturerPartNumber', 'gender', 'color/colorValue', 'ageGroup/ageGroupValue', 'isReusable',
                    'isDisposable', 'material/materialValue', 'isPowered', 'numberOfPieces', 'character/characterValue',
                    'powerType', 'isPersonalizable', 'bodyParts/bodyPart', 'isPortable', 'cleaningCareAndMaintenance',
                    'isSet', 'isTravelSize', 'recommendedUses', 'recommendedUses/recommendedUse', 'shape',
                    'compatibleBrands/compatibleBrand'
                ];
                break;
            }
            case 'HealthAndBeautyElectronics': {
                $categoryOrder = [
                    'batteriesRequired', 'batterySize', 'connections/connection', 'isCordless', 'hasAutomaticShutoff',
                    'screenSize/unit', 'screenSize/measure', 'displayTechnology'
                ];
                break;
            }
            case 'Optical': {
                $categoryOrder = [
                    'frameMaterial/frameMaterialValue', 'shape', 'eyewearFrameStyle', 'lensMaterial', 'eyewearFrameSize',
                    'uvRating', 'isPolarized', 'lensTint', 'isScratchResistant', 'hasAdaptiveLenses',
                    'lensType/lensTypeValue'
                ];
                break;
            }
            case 'MedicalAids': {
                $categoryOrder = [
                    'isInflatable', 'isWheeled', 'isFoldable', 'isIndustrial', 'diameter/unit',
                    'diameter/measure', 'isAssemblyRequired', 'assemblyInstructions', 'maximumWeight/unit', 'maximumWeight/unit',
                    'isLatexFree', 'isAntiAging', 'isHypoallergenic', 'isOilFree', 'isParabenFree', 'isNoncomodegenic', 'scent',
                    'isUnscented', 'isVegan', 'isWaterproof', 'isWaterproof', 'healthConcerns/healthConcern'
                ];
                break;
            }
            case 'PersonalCare': {
                $categoryOrder = [
                    'ingredientClaim/ingredientClaimValue', 'isLatexFree', 'absorbency', 'resultTime/unit',
                    'resultTime/measure', 'skinCareConcern', 'skinType', 'hairType', 'skinTone', 'spfValue', 'isAntiAging',
                    'isHypoallergenic', 'isOilFree', 'isParabenFree', 'isNoncomodegenic', 'scent', 'isUnscented', 'isVegan',
                    'isWaterproof', 'isTinted', 'isSelfTanning', 'isDrugFactsLabelRequired', 'drugFactsLabel',
                    'activeIngredients/activeIngredient/activeIngredientName',
                    'activeIngredients/activeIngredient/activeIngredientPercentage', 'inactiveIngredients/inactiveIngredient',
                    'form', 'organicCertifications/organicCertification', 'instructions',
                    'stopUseIndications/stopUseIndication'
                ];
                break;
            }
            case 'MedicineAndSupplements': {
                $categoryOrder = [
                    'isDrugFactsLabelRequired', 'drugFactsLabel', 'isSupplementFactsLabelRequired', 'supplementFactsLabel',
                    'servingSize', 'servingsPerContainer', 'activeIngredients/activeIngredient/activeIngredientName',
                    'activeIngredients/activeIngredient/activeIngredientPercentage', 'inactiveIngredients/inactiveIngredient',
                    'healthConcerns/healthConcern', 'form', 'organicCertifications/organicCertification', 'instructions', 'dosage',
                    'stopUseIndications/stopUseIndication'
                ];
                break;
            }

            case 'Home': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl',
                    'swatchImages/swatchImage/swatchVariantAttribute', 'collection',
                    'variantAttributeNames/variantAttributeName', 'variantGroupId', 'isPrimaryVariant',
                    'fabricContent/fabricContentValue', 'finish', 'homeDecorStyle',
                    'fabricCareInstructions/fabricCareInstruction', 'brand', 'manufacturer', 'theme/themeValue',
                    'modelNumber', 'manufacturerPartNumber', 'gender', 'color/colorValue', 'ageGroup/ageGroupValue',
                    'recommendedRooms/recommendedRoom', 'batteriesRequired', 'batterySize', 'isReusable',
                    'isDisposable', 'isAntique', 'material/materialValue', 'pattern/patternValue', 'isPowered',
                    'numberOfPieces', 'character/characterValue', 'powerType', 'occasion/occasionValue',
                    'isPersonalizable', 'isPortable', 'cleaningCareAndMaintenance', 'isCordless',
                    'isMadeFromRecycledMaterial', 'isSet', 'recommendedUses/recommendedUse',
                    'recycledMaterialContent/recycledMaterialContentValue/recycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/percentageOfRecycledMaterial',
                    'isRetractable', 'isWheeled', 'isFoldable', 'isIndustrial', 'isAssemblyRequired',
                    'assemblyInstructions', 'shape'
                ];
                break;
            }
            case 'LargeAppliances': {
                $categoryOrder = [
                    'isEnergyGuideLabelRequired', 'energyGuideLabel',
                    'isEnergyStarCertified', 'isRemoteControlIncluded', 'hasCfl', 'isLightingFactsLabelRequired',
                    'lightingFactsLabel', 'capacity', 'volumeCapacity/unit', 'volumeCapacity/measure', 'fuelType',
                    'loadPosition', 'volts/unit', 'volts/measure', 'watts/unit', 'watts/measure', 'btu',
                    'maximumRoomSize/unit', 'maximumRoomSize/measure', 'runTime/unit', 'runTime/measure',
                    'cordLength/unit', 'cordLength/measure', 'isSmart', 'hasAutomaticShutoff'
                ];
                break;
            }
            case 'Bedding': {
                $categoryOrder = [
                    'fabricContent/fabricContentValue',
                    'fabricCareInstructions/fabricCareInstruction', 'bedSize', 'threadCount'
                ];
                break;
            }
            case 'HomeDecor': {
                $categoryOrder = [
                    'rugSize', 'clockNumberType', 'curtainPanelStyle',
                    'fillMaterial/fillMaterialValue', 'scent', 'threadCount', 'displayTechnology'
                ];
                break;
            }

            case 'Jewelry': {
                $categoryOrder = [
                    'size', 'jewelryStyle', 'metal', 'plating', 'swatchImages/swatchImage/swatchImageUrl',
                    'swatchImages/swatchImage/swatchVariantAttribute', 'karats', 'gemstone/gemstoneValue',
                    'variantAttributeNames/variantAttributeName', 'birthstone', 'variantGroupId', 'gemstoneShape',
                    'isPrimaryVariant', 'carats/unit', 'carats/value', 'diamondClarity', 'gemstoneCut', 'chainLength/unit',
                    'chainLength/measure', 'brand', 'manufacturer', 'modelNumber',
                    'manufacturerPartNumber', 'gender', 'color/colorValue', 'ageGroup/ageGroupValue',
                    'material/materialValue', 'pattern/patternValue',
                    'character/characterValue', 'occasion/occasionValue',
                    'isPersonalizable', 'bodyParts', 'isPersonalizable',
                    'bodyParts/bodyPart', 'recycledMaterialContent/recycledMaterialContentValue/recycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/percentageOfRecycledMaterial',

                ];
                break;
            }
            case 'Rings': {
                $categoryOrder = [
                    'ringStyle/ringStyleValue'
                ];
                break;
            }

            case 'Media': {
                $categoryOrder = [
                    'title', 'originalLanguages', 'variantGroupId', 'variantAttributeNames/variantAttributeName',
                    'isPrimaryVariant', 'isAdultProduct', 'awardsWon/awardsWonValue',
                    'character/characterValue', 'targetAudience/targetAudienceValue', 'isDownloadableContentAvailable'
                ];
                break;
            }
            case 'TVShows': {
                $categoryOrder = [
                    'digitalVideoFormats', 'tvRating', 'tvShowGenre', 'tvShowSubgenre', 'tvNetwork', 'tvShowSeason',
                    'numberOfEpisodes', 'episode', 'director', 'actors/actor', 'screenwriter', 'studioProductionCompany',
                    'videoStreamingQuality', 'audioTrackCodec', 'duration/unit', 'duration/measure', 'dvdReleaseDate',
                    'isDubbed', 'dubbedLanguages/dubbedLanguage', 'hasSubtitles', 'subtitledLanguages/subtitledLanguage',
                    'seriesTitle', 'numberInSeries', 'aspectRatio'
                ];
                break;
            }
            case 'Music': {
                $categoryOrder = [
                    'musicGenre', 'musicSubGenre', 'performer/performerValue', 'songwriter', 'musicMediaFormat',
                    'musicProducer', 'recordLabel', 'numberOfDiscs', 'numberOfTracks', 'releaseDate', 'musicReleaseType',
                    'hasParentalAdvisoryLabel', 'trackListings/trackListing', 'seriesTitle', 'numberInSeries'
                ];
                break;
            }
            case 'BooksAndMagazines': {
                $categoryOrder = [
                    'condition', 'gender', 'color/colorValue', 'material/materialValue', 'pattern/patternValue', 'edition',
                    'subject', 'bookFormat', 'genre', 'subgenre', 'author/authorValue', 'editor', 'illustrator',
                    'publisher', 'translator', 'translatedFrom', 'fictionNonfiction', 'isUnabridged', 'originalPublicationDate',
                    'publicationDate', 'readingLevel', 'numberOfPages', 'issue', 'seriesTitle', 'numberInSeries', 'title',
                    'variantGroupId', 'isPrimaryVariant', 'isAdultProduct', 'isDownloadableContentAvailable'
                ];
                break;
            }
            case 'Movies': {
                $categoryOrder = [
                    'mpaaRating', 'movieGenre', 'movieSubgenre', 'theatricalReleaseDate', 'digitalVideoFormats', 'director',
                    'actors/actor', 'screenwriter', 'studioProductionCompany', 'videoStreamingQuality', 'audioTrackCodec',
                    'duration/unit', 'duration/measure', 'dvdReleaseDate', 'isDubbed', 'hasSubtitles', 'seriesTitle',
                    'numberInSeries', 'aspectRatio', 'title', 'variantGroupId', 'isPrimaryVariant', 'isAdultProduct',
                    'isDownloadableContentAvailable'
                ];
                break;
            }

            case 'MusicalInstrument': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl',
                    'swatchImages/swatchImage/swatchVariantAttribute', 'variantGroupId',
                    'variantAttributeNames/variantAttributeName', 'isPrimaryVariant', 'brand', 'condition', 'manufacturer',
                    'modelNumber', 'manufacturerPartNumber', 'color/colorValue', 'material/materialValue',
                    'numberOfPieces', 'isPersonalizable', 'isPortable', 'recommendedUses/recommendedUse',
                    'recommendedLocations/recommendedLocation'
                ];
                break;
            }
            case 'SoundAndRecording': {
                $categoryOrder = [
                    'hasSignalBooster', 'hasWirelessMicrophone', 'batteriesRequired', 'batterySize', 'isPowered', 'powerType',
                    'isRemoteControlIncluded', 'audioPowerOutput', 'equalizerControl',
                    'inputsAndOutputs/inputsAndOutput/inputOutputType',
                    'inputsAndOutputs/inputsAndOutput/inputOutputQuantity', 'hasIntegratedSpeakers', 'hasBluetooth',
                    'batteryLife/unit', 'batteryLife/measure', 'wirelessTechnologies/wirelessTechnology'
                ];
                break;
            }
            case 'InstrumentAccessories': {
                $categoryOrder = [
                    'hasSignalBooster', 'hasWirelessMicrophone', 'batteriesRequired',
                    'pattern/patternValue',
                    'batterySize', 'isRemoteControlIncluded', 'instrument/instrumentValue',
                    'inputsAndOutputs/inputsAndOutput/inputOutputType',
                    'inputsAndOutputs/inputsAndOutput/inputOutputQuantity',
                    'displayTechnology', 'hasBluetooth', 'batteryLife/unit', 'batteryLife/measure',
                    'wirelessTechnologies/wirelessTechnology'
                ];
                break;
            }
            case 'MusicalInstruments': {
                $categoryOrder = [
                    'finish', 'hasSignalBooster', 'hasWirelessMicrophone', 'ageGroup/ageGroupValue', 'batteriesRequired',
                    'batterySize', 'powerType', 'isPortable', 'recommendedUses/recommendedUse',
                    'recommendedLocations/recommendedLocation',
                    'audioPowerOutput', 'isCollectible', 'musicalInstrumentFamily', 'isAcoustic', 'isElectric', 'isFretted',
                    'instrument/instrumentValue', 'shape', 'inputsAndOutputs/inputsAndOutput/inputOutputType',
                    'inputsAndOutputs/inputsAndOutput/inputOutputQuantity',
                    'hasIntegratedSpeakers', 'displayTechnology', 'hasBluetooth', 'batteryLife/unit', 'batteryLife/measure'
                ];
                break;
            }
            case 'MusicCasesAndBags': {
                $categoryOrder = [
                    'fabricContent/fabricContentValue', 'fabricCareInstructions/fabricCareInstruction', 'hardOrSoftCase',
                    'isWheeled', 'instrument/instrumentValue', 'shape'
                ];
                break;
            }

            case 'OccasionAndSeasonal': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl', 'swatchImages/swatchImage/swatchVariantAttribute',
                    'variantAttributeNames/variantAttributeName', 'variantGroupId', 'isPrimaryVariant',
                    'holidayLightingStyle/holidayLightingStyleValue', 'fabricCareInstructions/fabricCareInstruction',
                    'brand', 'manufacturer', 'modelNumber', 'manufacturerPartNumber', 'color/colorValue',
                    'pattern/patternValue', 'material/materialValue', 'numberOfPieces', 'powerType',
                    'occasion/occasionValue', 'recommendedUses/recommendedUse', 'isAssemblyRequired',
                    'assemblyInstructions', 'watts/unit', 'watts/measure', 'lightBulbType'
                ];
                break;
            }
            case 'DecorationsAndFavors': {
                $categoryOrder = [
                    'fabricContent/fabricContentValue', 'isAdultProduct', 'finish', 'isRecyclable', 'theme/themeValue',
                    'gender', 'ageGroup/ageGroupValue', 'numberOfPieces', 'character/characterValue', 'isPowered',
                    'powerType', 'isPersonalizable', 'isMadeFromRecycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/recycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/percentageOfRecycledMaterial', 'isInflatable',
                    'isAnimated', 'targetAudience/targetAudienceValue', 'makesNoise', 'shape'
                ];
                break;
            }
            case 'Funeral': {
                $categoryOrder = [
                    'finish', 'fillMaterial/fillMaterialValue'
                ];
                break;
            }
            case 'CeremonialClothingAndAccessories': {
                $categoryOrder = [
                    'fabricContent/fabricContentValue', 'clothingSize', 'gender', 'clothingSizeType',
                    'pattern/patternValue', 'apparelCategory'
                ];
                break;
            }
            case 'Costumes': {
                $categoryOrder = [
                    'fabricContent/fabricContentValue', 'theme/themeValue', 'clothingSize', 'gender', 'ageGroup',
                    'clothingSizeType', 'animalType', 'character/characterValue', 'targetAudience/targetAudienceValue'
                ];
                break;
            }

            case 'Office': {
                $categoryOrder = [
                    'inkColor/inkColorValue', 'numberOfSheets', 'isRefillable', 'swatchImages/swatchImage/swatchImageUrl',
                    'swatchImages/swatchImage/swatchVariantAttribute', 'systemOfMeasurement',
                    'variantAttributeNames/variantAttributeName', 'variantGroupId', 'isAntiglare',
                    'isPrimaryVariant', 'fabricContent/fabricContentValue', 'finish', 'isRecyclable', 'isMagnetic', 'brand',
                    'envelopeSize', 'condition', 'holeSize/unit', 'holeSize/unit', 'manufacturer', 'theme/themeValue', 'paperSize/paperSizeValue',
                    'year', 'modelNumber', 'manufacturerPartNumber', 'calendarFormat/unit', 'calendarTerm/value',
                    'color/colorValue', 'batteriesRequired', 'ageGroup/ageGroupValue', 'dexterity', 'batterySize',
                    'material/materialValue', 'pattern/patternValue', 'isPowered',
                    'character/characterValue', 'powerType', 'occasion/occasionValue', 'isMadeFromRecycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/recycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/percentageOfRecycledMaterial',
                    'recommendedUses/recommendedUse', 'isRetractable', 'isIndustrial', 'isTearResistant', 'capacity',
                    'brightness/unit', 'brightness/measure', 'shape', 'compatibleDevices/compatibleDevice'
                ];
                break;
            }
            case 'Other': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl', 'swatchImages/swatchImage/swatchVariantAttribute',
                    'systemOfMeasurement', 'variantAttributeNames/variantAttributeName', 'variantGroupId', 'isPrimaryVariant',
                    'fabricContent/fabricContentValue', 'finish', 'fabricCareInstructions/fabricCareInstruction', 'brand',
                    'manufacturer', 'modelNumber', 'manufacturerPartNumber', 'gender', 'color/colorValue',
                    'recommendedRooms/recommendedRoom', 'connections/connection', 'material/materialValue',
                    'pattern/patternValue', 'isPowered', 'character/characterValue', 'powerType', 'isPortable',
                    'recommendedLocations/recommendedLocation', 'isRetractable', 'isFoldable', 'isCollectible', 'isIndustrial',
                    'isAssemblyRequired', 'assemblyInstructions', 'recommendedSurfaces/recommendedSurface', 'volts/unit',
                    'volts/measure', 'shape', 'displayTechnology'
                ];
                break;
            }

            case 'Storage': {
                $categoryOrder = [
                    'collection', 'shelfDepth/unit', 'shelfDepth/measure', 'shelfStyle', 'recommendedUses/recommendedUse',
                    'drawerPosition', 'drawerDimensions', 'numberOfDrawers', 'numberOfShelves', 'maximumWeight/unit',
                    'maximumWeight/measure', 'capacity'
                ];
                break;
            }
            case 'CleaningAndChemical': {
                $categoryOrder = [
                    'isRecyclable', 'isBiodegradable', 'isEnergyStarCertified', 'isCombustible', 'isMadeFromRecycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue', 'isFlammable', 'ingredients', 'handleLength/unit',
                    'handleLength/measure', 'fluidOunces/unit', 'fluidOunces/measure', 'scent',
                    'activeIngredients/activeIngredient/activeIngredientName',
                    'activeIngredients/activeIngredient/activeIngredientPercentage', 'inactiveIngredients/inactiveIngredient',
                    'form', 'instructions'
                ];
                break;
            }

            case 'Photography': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl',
                    'swatchImages/swatchImage/swatchVariantAttribute', 'accessoriesIncluded/accessoriesIncludedValue',
                    'variantAttributeNames/variantAttributeName', 'variantGroupId', 'isPrimaryVariant', 'isWeatherResistant',
                    'hasSignalBooster', 'hasWirelessMicrophone', 'brand', 'manufacturer', 'modelNumber',
                    'manufacturerPartNumber', 'gender', 'color/colorValue', 'batteriesRequired', 'batterySize',
                    'memoryCardType/memoryCardTypeValue', 'connections/connection', 'material/materialValue', 'numberOfPieces',
                    'isPortable', 'cleaningCareAndMaintenance', 'recommendedLocations/recommendedLocation',
                    'isAssemblyRequired', 'assemblyInstructions', 'isWaterproof',
                    'hasTouchscreen', 'recordableMediaFormats/recordableMediaFormat', 'compatibleBrands/compatibleBrand',
                    'compatibleDevices/compatibleDevice', 'wirelessTechnologies/wirelessTechnology'
                ];
                break;
            }
            case 'PhotoAccessories': {
                $categoryOrder = [
                    'fabricContent/fabricContentValue', 'condition', 'pattern/patternValue', 'isRemoteControlIncluded',
                    'isMadeFromRecycledMaterial', 'occasion/occasionValue', 'hardOrSoftCase', 'isCordless', 'lightOutput/unit',
                    'lightOutput/measure', 'maximumWeight/unit', 'maximumWeight/measure', 'capacity', 'volts/unit', 'volts/measure',
                    'watts/unit', 'watts/measure', 'shape', 'inputsAndOutputs/inputsAndOutput/inputOutputType',
                    'inputsAndOutputs/inputsAndOutput/inputOutputQuantity', 'displayTechnology', 'hasBluetooth', 'lightBulbType',
                    'wirelessTechnologies/wirelessTechnologie'
                ];
                break;
            }
            case 'CamerasAndLenses': {
                $categoryOrder = [
                    'ageGroup/ageGroupValue', 'powerType', 'diameter/unit', 'diameter/measure', 'numberOfMegapixels/unit',
                    'numberOfMegapixels/measure', 'focalLength/measure', 'focalLength/unit', 'hasShoulderStrap', 'hasHandle',
                    'magnification', 'fieldOfView', 'isFogResistant', 'lensDiameter/unit', 'lensDiameter/measure', 'isMulticoated',
                    'shootingPrograms', 'shootingMode', 'opticalZoom', 'selfTimerDelay/unit', 'selfTimerDelay/measure',
                    'hasSelfTimer', 'hasRemovableFlash', 'digitalZoom', 'focusType/focusTypeValue', 'hasRedEyeReduction',
                    'minimumShutterSpeed/unit', 'minimumShutterSpeed/unit', 'lockType', 'maximumShutterSpeed/unit',
                    'maximumShutterSpeed/measure', 'sensorResolution/unit', 'sensorResolution/measure', 'maximumShootingSpeed',
                    'minimumAperture', 'hasDovetailBarSystem', 'hasLcdScreen', 'maximumAperture', 'hasMemoryCardSlot',
                    'microphoneIncluded', 'hasNightVision', 'lensFilterType', 'isParfocal', 'flashType', 'filmCameraType',
                    'attachmentStyle', 'exposureModes/exposureMode', 'cameraLensType', 'displayResolution/unit',
                    'displayResolution/measure', 'focalRatio', 'lensCoating', 'operatingTemperature/unit',
                    'operatingTemperature/measure', 'isLockable', 'lensType/lensTypeValue', 'screenSize/unit', 'screenSize/measure',
                    'displayTechnology', 'hasFlash', 'standbyTime/unit', 'standbyTime/measure',
                    'activeIngredients/activeIngredient/activeIngredientPercentage', 'inactiveIngredients/inactiveIngredient',
                    'form', 'instructions'
                ];
                break;
            }

            case 'SportAndRecreation': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl',
                    'swatchImages/swatchImage/swatchVariantAttribute',
                    'variantAttributeNames/variantAttributeName', 'variantGroupId', 'isPrimaryVariant',
                    'fabricContent/fabricContentValue/materialName', 'isWeatherResistant', 'finish',
                    'fabricCareInstructions/fabricCareInstruction',
                    'brand', 'condition', 'manufacturer', 'modelNumber', 'manufacturerPartNumber', 'clothingSize',
                    'gender', 'color/colorValue',
                    'ageGroup/ageGroupValue', 'batteriesRequired', 'dexterity', 'batterySize',
                    'fishingLinePoundTest', 'fishingLocation', 'animalType', 'material/materialValue',
                    'pattern/patternValue', 'isPowered', 'numberOfPieces', 'character/characterValue', 'fitnessGoal',
                    'powerType', 'maximumIncline/unit', 'maximumIncline/measure', 'isPortable',
                    'cleaningCareAndMaintenance', 'bladeType', 'recommendedUses/recommendedUse', 'tentType',
                    'recommendedLocations/recommendedLocation', 'seatingCapacity', 'tireDiameter/unit',
                    'tireDiameter/measure', 'season/seasonValue', 'isWheeled', 'isMemorabilia', 'isFoldable',
                    'isCollectible', 'isAssemblyRequired', 'maximumRecommendedAge/unit',
                    'maximumRecommendedAge/measure', 'assemblyInstructions', 'minimumRecommendedAge/unit',
                    'minimumRecommendedAge/measure', 'ballCoreMaterial/ballCoreMaterialValue',
                    'footballSize', 'sport', 'basketballSize', 'maximumWeight/unit', 'maximumWeight/measure',
                    'soccerBallSize', 'batDrop', 'isTearResistant', 'isSpaceSaving', 'capacity', 'velocity/unit',
                    'velocity/measure', 'isWaterproof', 'hasAutomaticShutoff', 'shape',
                    'wirelessTechnologies/wirelessTechnologie', 'horsepower/unit', 'horsepower/measure'
                ];
                break;
            }
            case 'Cycling': {
                $categoryOrder = [
                    'bicycleFrameSize/unit', 'bicycleFrameSize/measure', 'bicycleWheelDiameter/unit',
                    'bicycleWheelDiameter/measure', 'bicycleTireSize',
                    'numberOfSpeeds', 'lightBulbType'
                ];
                break;
            }
            case 'Optics': {
                $categoryOrder = [
                    'powerType', 'magnification', 'fieldOfView', 'isFogResistant', 'lensDiameter/unit', 'lensDiameter/measure',
                    'isMulticoated', 'opticalZoom', 'digitalZoom', 'focusType/focusTypeValue',
                    'lockType', 'sensorResolution/unit', 'sensorResolution/measure', 'hasDovetailBarSystem', 'hasLcdScreen',
                    'hasMemoryCardSlot', 'hasNightVision', 'isParfocal',
                    'attachmentStyle', 'displayResolution/unit', 'displayResolution/measure', 'focalRatio', 'lensCoating',
                    'operatingTemperature/unit', 'operatingTemperature/measure', 'isLockable', 'screenSize/unit',
                    'screenSize\measure', 'displayTechnology'
                ];
                break;
            }
            case 'Weapons': {
                $categoryOrder = [
                    'shotgunGauge', 'velocity/unit', 'velocity/measure', 'firearmAction', 'caliber/unit',
                    'caliber/measure', 'ammunitionType', 'firearmChamberLength'
                ];
                break;
            }

            case 'ToolsAndHardware': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl',
                    'swatchImages/swatchImage/swatchVariantAttribute', 'accessoriesIncluded/accessoriesIncludedValue',
                    'variantGroupId', 'variantAttributeNames/variantAttributeName', 'isPrimaryVariant', 'isWeatherResistant',
                    'isFireResistant', 'brand', 'manufacturer', 'color/colorValue', 'material/materialValue', 'numberOfPieces',
                    'cleaningCareAndMaintenance', 'recommendedUses/recommendedUse',
                    'isIndustrial', 'isWaterproof', 'shape'
                ];
                break;
            }
            case 'PlumbingAndHVAC': {
                $categoryOrder = [
                    'isEnergyGuideLabelRequired', 'energyGuideLabel', 'finish', 'homeDecorStyle',
                    'mountType/mountTypeValue', 'powerType', 'isRemoteControlIncluded', 'seatingCapacity',
                    'volumeCapacity/unit', 'volumeCapacity/measure', 'fuelType', 'volts/unit', 'volts/measure',
                    'watts/unit', 'watts/measure', 'btu', 'maximumRoomSize/unit', 'maximumRoomSize/measure',
                    'hasAutomaticShutoff', 'hasCeeCertification', 'ceeTier', 'drainConfiguration', 'faucetDrillings',
                    'gallonsPerFlush/unit', 'gallonsPerFlush/measure', 'gallonsPerMinute/unit',
                    'gallonsPerMinute/measure', 'humidificationOutputPerDay', 'inletDiameter/unit',
                    'inletDiameter/measure', 'mervRating', 'outletDiameter/unit', 'outletDiameter/measure',
                    'pintsOfMoistureRemovedPerDay', 'spoutHeight/unit', 'spoutHeight/measure', 'spoutReach/unit',
                    'spoutReach/measure', 'spudInletSize/unit', 'spudInletSize/measure', 'threadStandard',
                    'toiletBowlSize', 'tripLeverPlacement', 'isVented', 'ventingRequired', 'humidificationMethod',
                    'horsepower/unit', 'horsepower/measure'
                ];
                break;
            }
            case 'Hardware': {
                $categoryOrder = [
                    'finish', 'homeDecorStyle', 'mountType/mountTypeValue', 'maximumWeight/unit', 'maximumWeight/measure',
                    'backsetSize/unit', 'backsetSize/measure', 'liftHeight/unit', 'liftHeight/measure', 'isLockable',
                    'maximumForceResisted/unit', 'maximumForceResisted/measure', 'petSize', 'threadStandard'
                ];
                break;
            }
            case 'BuildingSupply': {
                $categoryOrder = [
                    'homeDecorStyle',
                    'acRating', 'batteriesRequired', 'batterySize', 'isBiodegradable', 'isEnergyStarCertified',
                    'carpetStyle', 'pattern/patternValue', 'isPowered', 'powerType', 'isCombustible',
                    'compatibleSurfaces/compatibleSurface', 'coverageArea/unit', 'coverageArea/measure',
                    'isMadeFromRecycledMaterial', 'dryTime/unit', 'dryTime/measure',
                    'recycledMaterialContent/recycledMaterialContentValue/recycledMaterial',
                    'recycledMaterialContent/recycledMaterialContentValue/percentageOfRecycledMaterial',
                    'isFastSetting', 'fineness', 'isFlammable', 'grade', 'hasLowEmissivity',
                    'isMadeFromReclaimedMaterials', 'isMadeFromSustainableMaterials', 'isMoldResistant', 'isOdorless',
                    'paintFinish', 'peiRating', 'pileHeight/unit', 'pileHeight/measure', 'isPrefinished',
                    'isReadyToUse', 'recommendedSurfaces/recommendedSurface', 'rollLength/unit', 'rollLength/measure',
                    'snowLoadRating/unit', 'snowLoadRating/measure', 'vocLevel/unit', 'vocLevel/measure',
                    'isWaterSoluble', 'subject', 'activeIngredients/activeIngredient/activeIngredientName',
                    'activeIngredients/activeIngredient/activeIngredientPercentage',
                    'inactiveIngredients/inactiveIngredient', 'form', 'hasCeeCertification', 'ceeTier'
                ];
                break;
            }
            case 'Tools': {
                $categoryOrder = [
                    'finish',
                    'batteriesRequired', 'batterySize', 'powerType', 'isPortable', 'hasCfl',
                    'isLightingFactsLabelRequired', 'lightingFactsLabel', 'volumeCapacity/unit',
                    'volumeCapacity/measure', 'fuelType', 'volts/unit', 'volts/measure', 'cordLength/unit',
                    'cordLength/measure', 'lightBulbType', 'handing', 'caseIncluded', 'amps/unit', 'amps/measure',
                    'isBareTool', 'batteryCapacity/unit', 'batteryCapacity/measure', 'chargerIncluded',
                    'chargingTime/unit', 'chargingTime/measure', 'hasElectricBrake', 'isVariableSpeed',
                    'toolFreeBladeChanging', 'bladeDiameter/unit', 'bladeDiameter/measure', 'bladeLength/unit',
                    'bladeLength/measure', 'bladeShank', 'teethPerInch', 'discSize/unit', 'discSize/measure',
                    'chuckSize/unit', 'chuckSize/measure', 'chuckType', 'colletSize/unit', 'colletSize/measure',
                    'sandingBeltSize', 'arborDiameter/unit', 'arborDiameter/measure', 'spindleThread', 'shankSize/unit',
                    'shankSize/measure', 'shankShape', 'maximumJawOpening/unit', 'maximumJawOpening/measure',
                    'decibelRating/unit', 'decibelRating/measure', 'impactEnergy/unit', 'impactEnergy/measure',
                    'blowsPerMinute', 'strokeLength/unit', 'strokeLength/measure', 'strokesPerMinute',
                    'maximumWattsOut/unit', 'maximumWattsOut/measure', 'noLoadSpeed/unit', 'noLoadSpeed/measure',
                    'torque', 'sandingSpeed/unit', 'sandingSpeed/measure', 'airInlet/unit', 'airInlet/measure',
                    'averageAirConsumptionAt90PSI/unit', 'averageAirConsumptionAt90PSI/measure', 'cfmAt40Psi/unit',
                    'cfmAt40Psi/measure', 'cfmAt90Psi/unit', 'cfmAt90Psi/measure', 'workingPressure/unit',
                    'workingPressure/measure', 'maximumAirPressure/unit', 'maximumAirPressure/measure',
                    'tankConfiguration', 'tankSize/unit', 'tankSize/measure', 'isCarbCompliant',
                    'engineDisplacement/unit', 'engineDisplacement/measure', 'horsepower/measure', 'engineStarter',
                    'hasAutomaticTransferSwitch', 'clearingWidth', 'loadCapacity'
                ];
                break;
            }
            case 'Electrical': {
                $categoryOrder = [
                    'finish',
                    'homeDecorStyle', 'batteriesRequired', 'mountType', 'batterySize', 'isEnergyStarCertified',
                    'pattern/patternValue', 'character/characterValue', 'powerType', 'diameter/unit',
                    'diameter/measure', 'hasCfl', 'isLightingFactsLabelRequired', 'lightingFactsLabel', 'volts/unit',
                    'volts/measure', 'watts/unit', 'watts/measure', 'estimatedEnergyCostPerYear/unit',
                    'estimatedEnergyCostPerYear/measure', 'colorTemperature/unit', 'colorTemperature/measure',
                    'numberOfLightBulbs', 'lightBulbBaseType', 'lightBulbDiameter/unit', 'lightBulbDiameter/measure',
                    'isLightBulbIncluded', 'beamAngle/unit', 'beamAngle/measure', 'beamSpread/unit',
                    'beamSpread/measure', 'compatibleConduitSizes/unit', 'compatibleConduitSizes/measure',
                    'isDarkSkyCompliant', 'electricalBallastFactor', 'isRatedForOutdoorUse', 'maximumEnergySurgeRating',
                    'maximumRange/unit', 'maximumRange/measure', 'responseTime/unit', 'responseTime/measure',
                    'numberOfGangs', 'numberOfPoles', 'americanWireGauge/unit', 'americanWireGauge/measure',
                    'brightness/unit', 'brightness/measure', 'lifespan', 'hasCeeCertification', 'ceeTier', 'amps/unit',
                    'amps/measure', 'decibelRating/unit', 'decibelRating/measure', 'horsepower/unit',
                    'horsepower/measure'
                ];
                break;
            }

            case 'Toy': {
                $categoryOrder = [
                    'animalBreed', 'swatchImages/swatchImage/swatchImageUrl',
                    'swatchImages/swatchImage/swatchVariantAttribute', 'ageRange', 'minimumWeight/unit',
                    'minimumWeight/measure', 'variantAttributeNames/variantAttributeName', 'variantGroupId', 'isPrimaryVariant',
                    'fabricContent/fabricContentValue/materialName', 'isAdultProduct', 'finish', 'isRecyclable',
                    'fabricCareInstructions/fabricCareInstruction', 'brand',
                    'manufacturer', 'theme/themeValue', 'modelNumber', 'manufacturerPartNumber', 'gender', 'color/colorValue',
                    'ageGroup/ageGroupValue', 'awardsWon/awardsWonValue', 'isEnergyStarCertified', 'animalType',
                    'material/materialValue', 'isPowered',
                    'numberOfPieces', 'characterValue', 'powerType', 'isRemoteControlIncluded', 'occasion/occasionValue',
                    'isPersonalizable', 'isMadeFromRecycledMaterial',
                    'isTravelSize', 'recycledMaterialContent/recycledMaterialContentValue/recycledMaterial',
                    'seatingCapacity', 'isInflatable', 'isAssemblyRequired', 'maximumRecommendedAge/unit',
                    'maximumRecommendedAge/measure', 'assemblyInstructions', 'minimumRecommendedAge/unit',
                    'minimumRecommendedAge/measure', 'sport/sportValue', 'skillLevel', 'maximumWeight/unit',
                    'maximumWeight/measure', 'targetAudience/targetAudienceValue', 'maximumSpeed/unit',
                    'maximumSpeed/measure', 'educationalFocus/educationalFocus',
                    'capacity', 'skinTone', 'volts/unit', 'volts/measure', 'vehicleType', 'shape', 'screenSize/unit',
                    'screenSize/measure', 'displayTechnology'
                ];
                break;
            }
            case 'Puzzles': {
                $categoryOrder = [
                    'numberOfPieces'
                ];
                break;
            }
            case 'Games': {
                $categoryOrder = [
                    'batteriesRequired', 'batterySize', 'makesNoise', 'numberOfPlayers/minimumNumberOfPlayers',
                    'numberOfPlayers/minimumNumberOfPlayers', 'numberOfPlayers/maximumNumberOfPlayers'
                ];
                break;
            }
            case 'Toys': {
                $categoryOrder = [
                    'batteriesRequired', 'batterySize', 'makesNoise', 'fillMaterial/fillMaterialValue'
                ];
                break;
            }

            case 'Vehicle': {
                $categoryOrder = [
                    'swatchImages/swatchImage/swatchImageUrl', 'swatchImages/swatchImage/swatchVariantAttribute',
                    'variantGroupId', 'variantAttributeNames/variantAttributeName', 'isPrimaryVariant', 'brand',
                    'condition', 'manufacturer', 'modelNumber', 'manufacturerPartNumber', 'color/colorValue',
                    'material/materialValue'
                ];
                break;
            }
            case 'WheelsAndWheelComponents': {
                $categoryOrder = [
                    'finish', 'diameter/unit', 'diameter/measure', 'compatibleTireSize', 'numberOfSpokes',
                    'hasWearSensor'
                ];
                break;
            }
            case 'LandVehicles': {
                $categoryOrder = [
                    'landVehicleCategory', 'powertrain', 'drivetrain', 'transmissionDesignation', 'acceleration',
                    'frontSuspension', 'rearSuspension', 'frontBrakes', 'rearBrakes', 'seatingCapacity', 'frontWheels',
                    'rearWheels', 'frontTires', 'rearTires', 'wheelbase/unit', 'wheelbase/measure', 'curbWeight/unit',
                    'curbWeight/measure', 'towingCapacity/unit', 'towingCapacity/measure', 'submodel', 'seatHeight/unit',
                    'seatHeight/measure', 'engineModel', 'compressionRatio', 'boreStroke', 'inductionSystem',
                    'coolingSystem', 'maximumEnginePower', 'topSpeed', 'fuelRequirement', 'fuelSystem',
                    'fuelCapacity/unit', 'fuelCapacity/measure', 'averageFuelConsumption/unit',
                    'averageFuelConsumption/measure', 'vehicleMake', 'vehicleModel', 'vehicleType', 'vehicleYear',
                    'torque', 'engineDisplacement/unit', 'engineDisplacement/measure'
                ];
                break;
            }
            case 'VehiclePartsAndAccessories': {
                $categoryOrder = [
                    'fabricContent/fabricContentValue', 'isWeatherResistant', 'finish', 'chainLength/unit',
                    'chainLength/measure', 'fabricCareInstructions/fabricCareInstruction', 'batteriesRequired',
                    'batterySize', 'isReusable', 'connections/connection', 'character/characterValue', 'powerType',
                    'tireDiameter/unit', 'tireDiameter/measure', 'fillMaterial/fillMaterialValue', 'fluidOunces/unit',
                    'fluidOunces/measure', 'maximumTemperature/unit', 'maximumTemperature/measure',
                    'volumeCapacity/unit', 'volumeCapacity/measure', 'fuelType', 'volts/unit', 'volts/measure',
                    'watts/unit', 'watts/measure', 'isLightBulbIncluded', 'vehicleMake', 'beamAngle/unit',
                    'beamAngle/measure', 'beamSpread/unit', 'beamSpread/measure', 'vehicleModel', 'vehicleType',
                    'vehicleYear', 'automotiveWindowShadeFit', 'breakingStrength/unit', 'breakingStrength/measure',
                    'candlePower', 'displayResolution/unit', 'displayResolution/measure', 'form', 'coldCrankAmp',
                    'compatibleCars', 'dropDistance/unit', 'dropDistance/measure', 'shape', 'fastenerHeadType',
                    'isLockable', 'filterLife/unit', 'filterLife/measure', 'flashPoint', 'fullyIncinerable',
                    'hitchClass', 'inDashSystem', 'interfaceType/interfaceTypeValue', 'displayTechnology',
                    'maximumMotorSpeed', 'numberOfOutlets', 'numberOfPhases', 'receiverCompatibility/unit',
                    'receiverCompatibility/measure', 'reserveCapacity/unit', 'reserveCapacity/measure', 'saeDotCompliant',
                    'shackleClearance/unit', 'shackleClearance/measure', 'shackleDiameter/unit',
                    'shackleDiameter/measure', 'shackleLength/unit', 'shackleLength/measure', 'shankLength/unit',
                    'shankLength/measure', 'shearStrength/unit', 'shearStrength/measure',
                    'hasShortCircuitProtection/unit', 'hasShortCircuitProtection/measure',
                    'thickness/unit', 'thickness/measure', 'threadSize/unit', 'threadSize/measure', 'towingMirrorSide',
                    'lightBulbType', 'cableLength/unit', 'cableLength/measure', 'compatibleBrands/compatibleBrand',
                    'compatibleDevices/compatibleDevice', 'wirelessTechnologies/wirelessTechnology', 'amps/unit',
                    'amps/measure', 'maximumLoadWeight/unit', 'maximumLoadWeight/measure', 'horsepower/unit',
                    'horsepower/measure', 'loadCapacity/unit', 'loadCapacity/measure'
                ];
                break;
            }
            case 'Tires': {
                $categoryOrder = [
                    'tireDiameter/unit', 'tireDiameter/measure', 'tireSize', 'tireWidth', 'tireSeason', 'tireLoadIndex',
                    'tireSpeedRating', 'tireTreadwearRating', 'isRunFlat', 'tireTractionRating', 'tireTemperatureRating',
                    'constructionType', 'tireSidewallStyle', 'tireType', 'maximumInflationPressure/unit',
                    'maximumInflationPressure/measure', 'treadDepth', 'treadWidth', 'uniformTireQualityGrade',
                    'overallDiameter/unit', 'overallDiameter/measure'
                ];
                break;
            }
            case 'Watercraft': {
                $categoryOrder = [
                    'seatingCapacity', 'watercraftCategory', 'submodel', 'engineLocation', 'propulsionSystem',
                    'engineModel', 'compressionRatio', 'boreStroke', 'inductionSystem', 'coolingSystem',
                    'maximumEnginePower', 'thrust/unit', 'thrust/measure', 'impellerPropeller', 'topSpeed',
                    'fuelRequirement', 'fuelSystem', 'fuelCapacity/unit', 'fuelCapacity/measure',
                    'averageFuelConsumption/unit', 'averageFuelConsumption/measure', 'hullLength/unit',
                    'hullLength/measure', 'beam/unit', 'beam/measure', 'airDraft/unit', 'airDraft/measure', 'draft/unit',
                    'draft/measure', 'waterCapacity/unit', 'waterCapacity/measure', 'dryWeight/unit', 'dryWeight/measure',
                    'vehicleMake', 'vehicleModel', 'vehicleType', 'vehicleYear', 'engineDisplacement'
                ];
                break;
            }

            case 'Watches': {
                $categoryOrder = [
                    'watchBandMaterial/watchBandMaterialValue', 'metal', 'watchCaseShape', 'plating',
                    'swatchImages/swatchImage/swatchImageUrl', 'swatchImages/swatchImage/swatchVariantAttribute',
                    'watchStyle/watchStyleValue', 'gemstone/gemstoneValue', 'variantAttributeNames/variantAttributeName',
                    'variantGroupId', 'gemstoneShape', 'isPrimaryVariant', 'carats/unit', 'carats/value',
                    'fabricContent/fabricContentValue', 'isWeatherResistant', 'finish', 'brand', 'manufacturer',
                    'theme/themeValue', 'modelNumber', 'manufacturerPartNumber', 'gender', 'color/colorValue',
                    'ageGroup/ageGroupValue', 'batteriesRequired', 'batterySize', 'material/materialValue',
                    'pattern/patternValue', 'character/characterValue', 'powerType', 'occasion/occasionValue',
                    'isPersonalizable', 'isWaterproof', 'displayTechnology'
                ];
                break;
            }
        }
        return $categoryOrder;
    }
   
    public static function getrootcategory()
    {
        $rootcategory = ['Animal', 'ArtAndCraftCategory' , 'Baby' , 'CarriersAndAccessoriesCategory', 'ClothingCategory', 'Electronics',
            'FurnitureCategory',  'FoodAndBeverageCategory',  'FootwearCategory', 'GardenAndPatioCategory', 'HealthAndBeauty', 'Home', 'JewelryCategory',
            'Media','MusicalInstrument', 'OfficeCategory', 'OtherCategory', 'OccasionAndSeasonal','Photography',
            'SportAndRecreation','ToolsAndHardware', 'ToysCategory', 'Vehicle', 'WatchesCategory'
             ];

        return $rootcategory;
    }

    public static function getchildcategory($rootcategory = null)
    {
        $childcategory = [];

        switch ($rootcategory) {
            case 'HealthAndBeauty' : {
                $childcategory = [
                    'MedicalAids', 'Optical', 'MedicineAndSupplements', 'HealthAndBeautyElectronics', 'PersonalCare'
                ];
                break;
            }
            case 'Home' : {
                $childcategory = [
                    'Bedding', 'LargeAppliances', 'HomeOther'
                ];
                break;
            }
            case 'FurnitureCategory' : {
                $childcategory = [
                    'Furniture'
                ];
                break;
            }
            case 'ArtAndCraftCategory' : {
                $childcategory = [
                    'ArtAndCraft'
                ];
                break;
            }
            case 'FoodAndBeverageCategory' : {
                $childcategory = [
                    'AlcoholicBeverages', 'FoodAndBeverage'
                ];
                break;
            }
            case 'ToolsAndHardware' : {
                $childcategory = [
                    'BuildingSupply', 'Electrical', 'Hardware', 'PlumbingAndHVAC', 'Tools', 'ToolsAndHardwareOther'
                ];
                break;
            }
            case 'SportAndRecreation' : {
                $childcategory = [
                    'Cycling', 'Weapons', 'Optics', 'SportAndRecreationOther'
                ];
                break;
            }
            case 'Photography' : {
                $childcategory = [
                    'CamerasAndLenses', 'PhotoAccessories'
                ];
                break;
            }
            case 'Animal' : {
                $childcategory = [
                    'AnimalHealthAndGrooming', 'AnimalAccessories', 'AnimalFood', 'AnimalEverythingElse'
                ];
                break;
            }
            case 'OccasionAndSeasonal' : {
                $childcategory = [
                    'Funeral', 'DecorationsAndFavors', 'CeremonialClothingAndAccessories', 'Costumes', 'GiftSupplyAndAwards'
                ];
                break;
            }
            case 'GardenAndPatioCategory' : {
                $childcategory = [
                    'GrillsAndOutdoorCooking', 'GardenAndPatio'
                ];
                break;
            }
            case 'FootwearCategory' : {
                $childcategory = [
                    'Footwear'
                ];
                break;
            }
            case 'Baby' : {
                $childcategory = [
                    'BabyFood', 'BabyOther', 'ChildCarSeats', 'BabyFurniture', 'BabyToys', 'BabyClothing'
                ];
                break;
            }
            case 'CarriersAndAccessoriesCategory' : {
                $childcategory = [
                    'CasesAndBags', 'CarriersAndAccessories'
                ];
                break;
            }
            case 'Media' : {
                $childcategory = [
                    'Movies', 'TVShows', 'Music', 'BooksAndMagazines'
                ];
                break;
            }
            case 'MusicalInstrument' : {
                $childcategory = [
                    'MusicCasesAndBags', 'SoundAndRecording', 'MusicalInstruments', 'InstrumentAccessories'
                ];
                break;
            }
            case 'OfficeCategory' : {
                $childcategory = [
                    'Office'
                ];
                break;
            }
            case 'OtherCategory' : {
                $childcategory = [
                    'Storage', 'giftCards', 'CleaningAndChemical', 'safetyAndEmergency', 'fuelsAndLubricants', 'Other'
                ];
                break;
            }
            case 'ToysCategory' : {
                $childcategory = [
                    'Toys'
                ];
                break;
            }
            case 'WatchesCategory' : {
                $childcategory = [
                    'Watches'
                ];
                break;
            }
            case 'Vehicle' : {
                $childcategory = [
                    'Tires', 'LandVehicles', 'VehiclePartsAndAccessories', 'WheelsAndWheelComponents', 'VehicleOther', 'Watercraft'
                ];
                break;
            }
            case 'ClothingCategory' : {
                $childcategory = [
                    'Clothing'
                ];
                break;
            }
            case 'JewelryCategory' : {
                $childcategory = [
                    'Jewelry'
                ];
                break;
            }
            case 'Electronics' : {
                $childcategory = [
                    'VideoGames', 'VideoProjectors', 'ElectronicsAccessories', 'ComputerComponents', 'ElectronicsCables', 'Software', 'Computers', 'TVsAndVideoDisplays', 'CellPhones', 'PrintersScannersAndImaging', 'ElectronicsOther'
                ];
                break;
            }
        }

        return $childcategory;
    }

    public static function getcategorytree()
    {

        $categorytree = [];
        $categorydetail = [];
        $root = self::getrootcategory();

        foreach ($root as $cat){

            $sub_category = self::getchildcategory($cat);
            foreach ($sub_category as $sub){

                $categorytree[$cat][$sub] =[];

                $categorydetail[$sub]=$sub;

            }

        }
        $return_arr[]=$categorytree;
        $return_arr[]=$categorydetail;
        return $return_arr;
    }

    /**
     * Get Variant Attributes for Given Category
     *
     * @param $category string
     * @return array
     */
    public static function getCategoryVariantAttributes($category)
    {
        
        /*$session = Yii::$app->session;
        $index = self::getVariantAttrSessionIdx($category);
        if (!isset($session[$index])) {*/
            $nonVariantAttributes = [];
            $unitTypeAttributes = ['unit'];

            //new changes
            $additionalCategoryVariantAttrs = [
                "Animal" => ["size", "count"],
                "ArtAndCraft" => ["size"],
                "Baby" => ["size", "count"],
                "CarriersAndAccessories" => ["size"],
                "Clothing" => ["material/materialValue", "inseam", "hatSize", "count"],
                "Electronics" => ["digitalFileFormat", "physicalMediaFormat"],
                "FoodAndBeverage" => ["size"],
                "HealthAndBeauty" => ["size", "count", "flavor"],
                "Home" => ["size", "count"],
                "Jewelry" => ["ringSize"],
                "Media" => ["physicalMediaFormat"],
                "OccasionAndSeasonal" => ["count"],
                "Office" => ["count"],
                "SportAndRecreation" => ["size", "shoeSize", "sportsTeam", "sportsLeague"],
                "ToolsAndHardware" => ["count", "workingLoadLimit", "size"],
                "Toy" => ["size", "count", "flavor"]
            ];
            //end

            $variantAttributes = [];
            $unitAttributes = [];
            $commonAttributes = [];
            if ($category != '') {
                $allCategoryAttrAndValues = self::getAllCategoryAttributes($category);

                $variantAttributes['required_attributes'] = $allCategoryAttrAndValues['required_attrs'];

                $parent_id = $category;
                if (isset($allCategoryAttrAndValues['parent_id']) && $allCategoryAttrAndValues['parent_id'] != '0')
                    $parent_id = $allCategoryAttrAndValues['parent_id'];

                $attrs = Tophatterapi::isValidateVariant($parent_id);
                if (count($attrs)) {
                    $allCategoryAttr = isset($allCategoryAttrAndValues['attributes']) ? $allCategoryAttrAndValues['attributes'] : [];

                    foreach ($attrs as $attr) {
                        foreach ($allCategoryAttr as $key => $value) {
                            $keys = explode('->', $key);
                            if (in_array($attr, $keys)) {
                                if (count($nonVariantAttributes)) {
                                    foreach ($nonVariantAttributes as $nonVarAttr) {
                                        if (in_array($nonVarAttr, $keys))
                                            $commonAttributes[] = [$key => $value];
                                        else
                                            $variantAttributes[$key] = $value;
                                    }
                                } elseif (count($unitTypeAttributes)) {
                                    foreach ($unitTypeAttributes as $unitTypeAttr) {
                                        if (in_array($unitTypeAttr, $keys))
                                            $unitAttributes[$keys[0]] = $value;
                                        else
                                            $variantAttributes[$key] = $value;
                                    }
                                } else {
                                    $variantAttributes[$key] = $value;
                                }
                                unset($allCategoryAttr[$key]);
                            }//new changes
                            elseif (isset($additionalCategoryVariantAttrs[$parent_id]) && in_array($attr, $additionalCategoryVariantAttrs[$parent_id])) {
                                if (!isset($variantAttributes[$attr]))
                                    $variantAttributes[$attr] = $attr;
                            }
                            //end
                        }
                    }
                }
            }

            if (count($commonAttributes))
                $variantAttributes['common_attributes'] = $commonAttributes;

            if (isset($allCategoryAttrAndValues['attribute_values']) && count($allCategoryAttrAndValues['attribute_values']))
                $variantAttributes['attribute_values'] = $allCategoryAttrAndValues['attribute_values'];

            if (count($unitAttributes))
                $variantAttributes['unit_attributes'] = $unitAttributes;

            self::addUnitAttributeValues($variantAttributes);

            /*$session->set($index, $variantAttributes);
            $session->close();*/

//            print_r($variantAttributes);die;

            return $variantAttributes;
       /* } else {
            unset($session[$index]);
            return $session[$index];
        }*/
    }

    /**
     * Get All Attributes for Given Category
     *
     * @param $category_id string
     * @return array
     */
    public static function getAllCategoryAttributes($category_id)
    {
        $query = 'SELECT `title`,`parent_id`,`attributes`,`attribute_values`,`tophatter_attributes`,`tophatter_attribute_values` FROM `tophatter_category` WHERE `category_id`="' . $category_id . '" LIMIT 0,1';
        $records = Data::sqlRecords($query, 'one');

        if ($records) {
            $attributes = [];
            $required = [];
            if ($records['attributes'] != '') {
                $_attributes = json_decode($records['attributes'], true);

                foreach ($_attributes as $_value) {
                    if (is_array($_value)) {
                        $key = key($_value);

                        $attr_id = $key;
                        $sub_attr = reset($_value);
                        if (is_array($sub_attr)) {
                            foreach ($sub_attr as $wal_attr_code) {
                                if ($wal_attr_code != $key) {
                                    $attr_id .= '->' . $wal_attr_code;
                                }
                            }
                        }

                        $attributes[$attr_id] = $_value[$key];
                        $required[] = $attr_id;
                    } else {
                        $attributes[$_value] = $_value;
                        $required[] = $_value;
                    }
                }
            }
            if ($records['tophatter_attributes'] != '') {
                $optionalAttrs = explode(',', $records['tophatter_attributes']);
                foreach ($optionalAttrs as $optionalAttr) {
                    $key = trim(str_replace('/', '->', $optionalAttr));
                    if (!isset($attributes[$key])) {
                        $subAttr = explode('/', $optionalAttr);
                        if (count($subAttr) == 1)
                            $attributes[$key] = $subAttr[0];
                        else
                            $attributes[$key] = $subAttr;
                    }
                }
            }


            $attribute_values = [];
            if ($records['attribute_values'] != '') {
                $_attributeValues = json_decode($records['attribute_values'], true);

                foreach ($_attributeValues as $_attrValue) {
                    if (is_array($_attrValue)) {
                        $key = key($_attrValue);
                        $attribute_values[$key] = $_attrValue[$key];
                    } else {
                        $attribute_values[$_attrValue] = $_attrValue;
                    }
                }
            }
            if ($records['tophatter_attribute_values'] != '') {
                $_attributeValues = json_decode($records['tophatter_attribute_values'], true);
                foreach ($_attributeValues as $_attrValue) {
                    if (is_array($_attrValue)) {
                        $key = key($_attrValue);
                        $attribute_values[$key] = $_attrValue[$key];
                    } else {
                        $attribute_values[$_attrValue] = $_attrValue;
                    }
                }
            }

            if ($records['parent_id'] != '0') {
                $parentCatAttr = self::getAllCategoryAttributes($records['parent_id']);

                if (isset($parentCatAttr['attributes']))
                    $attributes = array_merge($attributes, $parentCatAttr['attributes']);

                if (isset($parentCatAttr['attribute_values']))
                    $attribute_values = array_merge($attribute_values, $parentCatAttr['attribute_values']);
            }
            return ['attributes' => $attributes, 'attribute_values' => $attribute_values, 'required_attrs' => $required, 'parent_id' => $records['parent_id']];
        } else {
            return [];
        }
    }

    /**
     * Add Attribute Values For Unit Type Attributes
     *
     * @param &$attributeValues
     */
    private static function addUnitAttributeValues(&$attributeValues)
    {
        $attributeValues['attribute_values'] = [
            'chainLength->unit' => 'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
            'pantSize->waistSize->unit' => 'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
            'waistSize->unit' => 'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
            'screenSize->unit' => 'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
            'ramMemory->unit' => 'Terabytes,Kibibytes,Mebibytes,Gibibytes,Kilobytes,Gigabytes,Tebibytes,Megabyte',
            'hardDriveCapacity->unit' => 'Terabytes,Kibibytes,Mebibytes,Gibibytes,Kilobytes,Gigabytes,Tebibytes,Megabyte',
            'cableLength->unit' => 'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
            'heelHeight->unit' => 'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
            'carats->unit' => 'Carat',
            'focalLength->unit' => 'Inches,Micrometers,Feet,Millimeters,Centimeters,Meters,Yards,French,Miles,Mil',
            'displayResolution->unit' => 'Dots Per Square Inch,Pixels Per Inch,Volumetric Pixels,Megapixels,Resolution Element,Surface Element,Dots Per Inch,Texels',
            'volts->unit' => 'Volts',
            'amps->unit' => 'Amps',
            'gallonsPerMinute->unit' => '',
            'minimumWeight->unit' => 'Kilograms Per Meter,Kilograms,Milligrams,Ounces,Pounds,Grams,Carat',
            'maximumWeight->unit' => 'Kilograms Per Meter,Kilograms,Milligrams,Ounces,Pounds,Grams,Carat'
        ];
    }

     public static function getTophatterCategory($category)
    {
        $session = Yii::$app->session;
        $index = self::getWalCategorySessionIdx($category);
        if (!isset($session[$index])) {
            $query = "SELECT * FROM `tophatter_category` WHERE `category_id`='" . $category . "' LIMIT 0,1";
            $catCollection = Data::sqlRecords($query, "one", "select");

            $session->set($index, $catCollection);
            $session->close();

            return $catCollection;
        } else {
            return $session[$index];
        }
    }

    public static function getWalCategorySessionIdx($category)
    {
        $index = 'tophatter_category_' . addslashes($category);
        return $index;
    }

}