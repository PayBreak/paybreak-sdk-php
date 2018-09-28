# Unreleased
### Added
- Added `pre_approval` to Feature Entity (#160613522)
- perform PreApproval Customer Intelligence action (#160613620)
- ListPreApprovals call (#160613696)

### Changed
- Refactored getCustomerIntelligence to listLeadScores (#160613696)

# 4.20.0
2018-09-18

### Added
- CustomerIntelligenceGateway with LeadScore support (#160168488)
- getLeadScore api endpoint (#160168479)
- Customer Intelligence (160168501)
- Added `lead_score` to Feature Entity (#160168389)

# 4.19.1
2018-07-12

### Added
- Added feature flag for upload documents (#159017282)

# 4.19.0
2018-07-12

## Added
- Added API call support for adding an uploaded document from a retailer (#158623202)
- Added API call support for retrieving a dictionary of document types (#158623202)

## Changed
- Features entity `collect_fulfilment` accessor methods

# 4.18.0
2018-07-12

## Added
- `getAggregateSettlementReports` call to the settlement gateway (#157183787)

## Changes
- Fixed code standards (#156436834)

# 4.17.0
2018-06-26

## Added
- hold_reasons order property (#157963651)
## Changed
- Scrutinizer config (#154392323) (#153057789)

# 4.16.0
2017-11-01

## Added
- Added field to **MerchantFeesEntity** to allow `clawback_subsidy_refund_percentage` to pass through (#152104370)

# 4.15.1
2017-08-11

## Bug Fixes
- Added exception handling on `getAvailableDocuments` (#150168401)

# 4.15.0
2017-07-20

## Features
- Add `getAvailableDocuments` and `getAdequateExplanation` to the **DocumentGateway**

# 4.14.1
2017-06-15

## Features
- Added `Liability` concept on `Application` and `Installation` entity (147092245)

# 4.14.0
2017-05-03

## Features
- Use `PayBreak\ApiClient` instead of `Wnowicki\Generic\ApiClient` (143560655)

# 4.13.0
2017-04-03

## Features
- Added document gateway to enable downloading the agreement and pre-agreement of an application

# 4.12.0
2016-12-22

## Features 
- Added `listProducts` API (132143811)
- Added `orderProducts ` API (132143811)
- Added `hold` field on `OrderEntity` (131613483)

# 4.11.0
2016-12-15

## Features
- Added *Fulfilment Reference* to fulfilment call (135529307)

# 4.10.0
2016-12-12

## Features
- Added API call pass-throughs for `show`, `add` and `remove` addresses (134691997)
- Removed `setAddress` pass-through (134691997)

# 4.9.0
2016-11-30

### Features
- Including *Aggregate Settlement Report* `csv` API call (134525555)

# 4.8.0
2016-11-07

## Features
- Added `Entities` for profile updates (133243285)
- Added `Gateways` to get dictionaries (133243285)

# 4.7.0
2016-10-12

## Features
- Adding *Aggregate Settlement* api call (130356905)
- Added `FeaturesEntity` (131806137)

# 4.6.0
2016-08-15

## Features
- Add 'Get Application History' method to `ApplicationGateway` (126577079)
- Add method to get *Products* by *Group*

# 4.5.0
2016-08-11

## Features
- Added `GroupEntity:: setProducts(array)` (127177411)

# 4.4.1
2016-07-20

## Features
- Changed `Merchant Payments` URL's

# 4.4.0
2016-07-15

## Features
- Add gateway calls for *Merchant Payments* (125524631)
- Added `getApplicationCreditInfo` call on `ApplicationGateway` (126121685)

# 4.3.0
2016-07-06

## Features
- Get `Credit Info` call for a Product

# 4.2.1
2015-11-18

## Bug Fixes
- Removed types from all abstract entities

# 4.2.0
2015-11-18

## Features
- Added Commission Entity
- Added Commission to Finance Entity

# 4.1.1
2015-11-03

## Bug Fixes
- Removed entity types due to wrong api types

# 4.1.0
2015-11-03

## Features
- Added `GroupEntity` and `ProductEntity`
- Changed call for `getProductGroupsWithProducts` to return a `GroupEntity`
- Added *Cancellation* object to *Application*
- Random standards fixes
- Added product functionality for an installation to `InstallationGateway`
