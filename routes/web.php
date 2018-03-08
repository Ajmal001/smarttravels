<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
================================
Front End Routes
================================
*/

Route::get('/', 'FrontEndController@home');

//Tour

Route::get('/tourdetails/{package_id}', 'FrontEndController@tourDetails');

Route::get('/tourpackages', 'FrontEndController@tourPackages');

Route::post('/toursearch', 'FrontEndController@tourSearch');

Route::get('/toursearch', 'FrontEndController@tourPackages');

// Hotels

Route::get('/hotels', 'FrontEndController@hotels');

Route::get('/hoteldetails/{hotel_id}', 'FrontEndController@hotelDetails');

//Route::get('/hotellocation/{location}', 'FrontEndController@hotelSearchLocation');

Route::post('/hotellocation', 'FrontEndController@hotelSearchLocation');

Route::get('/hotellocation', 'FrontEndController@hotelSearchLocation');

Route::post('/hotelratings', 'FrontEndController@hotelSearchRatings');

Route::get('/hotelratings', 'FrontEndController@hotels');

Route::post('/hotelprice', 'FrontEndController@hotelSearchPrice');

Route::get('/hotelprice', 'FrontEndController@hotels');

//Sight

Route::get('/sight', 'FrontEndController@sight');

Route::get('/sightdetails/{sight_id}', 'FrontEndController@sightDetails');

// Transfer

Route::get('/transfer', 'FrontEndController@transfer');

Route::post('/inserttransfer', 'FrontEndController@insertTransfer');

// Attraction Tickets

Route::get('/attractions', 'FrontEndController@attractions');

Route::get('/attractiondetails/{id}', 'FrontEndController@attractionDetails');

// Visa

Route::get('/visa', 'FrontEndController@visa');

Route::get('/visaapply/', 'FrontEndController@visa');

Route::post('/visaapply/', 'FrontEndController@visaApply');

Route::post('/visaapplicationsave/', 'FrontEndController@visaApplicationSave');


// Others pages

Route::get('/about', 'FrontEndController@about');

Route::get('/contact', 'FrontEndController@contact');

// Booking

Route::get('/tourbooking/{package_id}', 'FrontEndController@tourBooking');

Route::post('/tourbookingsave', 'FrontEndController@tourBookingSave');

Route::get('/hotelbooking/{hotel_id}', 'FrontEndController@hotelBooking');

Route::post('/hotelbookingsave', 'FrontEndController@hotelBookingSave');

Route::get('/sightbooking/{hotel_id}', 'FrontEndController@sightBooking');

Route::post('/sightbookingsave', 'FrontEndController@sightBookingSave');

Route::get('/attractionbooking/{hotel_id}', 'FrontEndController@attractionBooking');

Route::post('/attractionbookingsave', 'FrontEndController@attractionBookingSave');

Route::get('/airticketbooking', 'FrontEndController@airTicketBooking');

Route::post('/airticketbookingsave', 'FrontEndController@airTicketBookingSave');

/*
================================
User Routes
================================
*/

Route::get('/userlogin', 'UserController@userLogin');

Route::get('/userregister', 'UserController@userRegister');

Route::get('/userforgetpass', 'UserController@userForgetPassword');

Route::get('/userdashboard', 'UserController@userDashboard');

Route::get('/usertouroperatorcountry', 'UserController@userTourOperatorCountry');

Route::post('/usertouroperatoroptions', 'UserController@userTourOperatorOptions');

Route::get('/usertouroperatorprice', 'UserController@userTourOperatorPrice');



Route::get('/usertouroperatorcost', 'UserController@userTourOperatorCost');
Route::post('/usertouroperatorcostsave', 'UserController@userTourOperatorCostSave');

Route::get('/usertouroperatorcostmultiple', 'UserController@userTourOperatorCostMultiple');
Route::post('/usertouroperatorcostmultiplesave', 'UserController@userTourOperatorCostMultipleSave');

Route::get('/findLocation', 'UserController@findLocation');

/*
================================
Admin Routes
================================
*/

//Prevent back-history start
Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('/admindashboard', 'AdminController@adminDashboard')->middleware('auth');

Route::get('/adminwebsitepages', 'AdminController@adminWebsitePages')->middleware('auth');

Route::get('/adminwebsitehome', 'AdminController@adminWebsiteHome')->middleware('auth');

//Country & Locations

Route::get('/admincountry', 'AdminController@adminCountry')->middleware('auth');

Route::get('/countryedit/{country_id}', 'AdminController@editCountry')->middleware('auth');

Route::post('/countryupdate/{country_id}', 'AdminController@updateCountry')->middleware('auth');

Route::delete('/countrydelete/{country_id}', 'AdminController@deleteCountry')->middleware('auth');

// Locations

Route::get('/adminlocation', 'AdminController@adminLocation')->middleware('auth');

Route::get('/locationedit/{location_id}', 'AdminController@editLocation')->middleware('auth');

Route::post('/locationupdate/{location_id}', 'AdminController@updateLocation')->middleware('auth');

Route::delete('/locationdelete/{location_id}', 'AdminController@deleteLocation')->middleware('auth');



//Tour Package

Route::get('/adminwebsitetourpackages', 'TourPackagesController@showTourPackages')->middleware('auth');

Route::post('/adminwebsiteinserttourpackages', 'TourPackagesController@insertTourPackage')->middleware('auth');

Route::get('/adminwebsiteviewtourpackages/{package_id}', 'TourPackagesController@viewTourPackage')->middleware('auth');

Route::get('/adminwebsiteedittourpackages/{package_id}', 'TourPackagesController@editTourPackage')->middleware('auth');

Route::post('/adminwebsiteedittourpackagessave', 'TourPackagesController@editTourPackageSave')->middleware('auth');

Route::delete('/adminwebsitedeletetourpackages/{package_id}', 'TourPackagesController@deleteTourPackage')->middleware('auth');

Route::post('/adminwebsiteinsertcountry', 'TourPackagesController@insertCountry')->middleware('auth');

Route::post('/adminwebsiteinsertlocation', 'TourPackagesController@insertLocation')->middleware('auth');

Route::post('/adminwebsiteinsertexin', 'TourPackagesController@insertExIn')->middleware('auth');

Route::get('travelcountrylocationname-json', 'TourPackagesController@getLocationsByMultipleCountry');



// Hotels

Route::get('/adminwebsitehotels', 'HotelsController@showHotels')->middleware('auth');

Route::post('/adminwebsiteinserthotel', 'HotelsController@insertHotel')->middleware('auth');

Route::post('/adminwebsiteinserthotelcountry', 'HotelsController@insertCountry')->middleware('auth');

Route::post('/adminwebsiteinserthotellocation', 'HotelsController@insertLocation')->middleware('auth');

Route::post('/adminwebsiteinserthotelfeature', 'HotelsController@insertFeature')->middleware('auth');

Route::get('/adminwebsiteshowedithotel/{hotel_id}', 'HotelsController@showEditHotel')->middleware('auth');

Route::get('/adminwebsiteviewhotel/{hotel_id}', 'HotelsController@viewHotel')->middleware('auth');

Route::post('/adminwebsiteedithotel', 'HotelsController@editHotel')->middleware('auth');

Route::delete('/adminwebsitedeletehotel/{hotel_id}', 'HotelsController@deleteHotel')->middleware('auth');

// Sight Seeing

Route::get('/adminwebsitesights', 'SightController@showSigth')->middleware('auth');

Route::post('/adminwebsiteinsertsight', 'SightController@insertSights')->middleware('auth');

Route::delete('/adminwebsitedeletesights/{sight_id}', 'SightController@deleteSigth')->middleware('auth');

Route::get('/adminwebsiteeditsights/{sight_id}', 'SightController@editSight')->middleware('auth');

Route::get('/adminwebsiteviewsights/{sight_id}', 'SightController@viewSight')->middleware('auth');

Route::post('/adminwebsiteeditsightsave', 'SightController@editSightSave')->middleware('auth');

// Transfer

Route::get('/adminwebsitetransfer', 'TransferController@showTransfer')->middleware('auth');

Route::get('/adminwebsitepicdetails/{transfer_id}', 'TransferController@picDetails')->middleware('auth');

Route::get('/adminwebsitedropdetails/{transfer_id}', 'TransferController@dropDetails')->middleware('auth');

// Attraction Tickets

Route::get('/adminwebsiteattractions', 'AttractionsController@showAttractions')->middleware('auth');

Route::post('/adminwebsiteinsertattractions', 'AttractionsController@insertAttractions')->middleware('auth');

Route::get('/adminwebsiteattractionsdelete/{id}', 'AttractionsController@deleteAttractions')->middleware('auth');

Route::get('/adminwebsiteattractionsedit/{id}', 'AttractionsController@editAttractions')->middleware('auth');

Route::post('/adminwebsiteattractionseditsave', 'AttractionsController@editAttractionsSave')->middleware('auth');

// Visa Apply

Route::get('/adminwebsitevisarequirements', 'VisaController@visaRequirements')->middleware('auth');

Route::post('/adminwebsitevisarequirementssave', 'VisaController@visaRequirementsSave')->middleware('auth');

Route::get('/adminwebsitevisarequirementsedit/{id}', 'VisaController@visaRequirementsEdit')->middleware('auth');

Route::get('/adminwebsitevisarequirementsview/{id}', 'VisaController@visaRequirementsView')->middleware('auth');

Route::post('/adminwebsitevisarequirementseditsave', 'VisaController@visaRequirementsEditSave')->middleware('auth');

Route::delete('/adminwebsitevisarequirementsdelete/{id}', 'VisaController@visaRequirementsDelete')->middleware('auth');

// Booking

Route::get('/adminwebsitetourbooking', 'BookingController@bookingTour')->middleware('auth');

Route::get('/adminwebsitehotelbooking', 'BookingController@bookingHotel')->middleware('auth');

Route::get('/adminwebsitesightbooking', 'BookingController@bookingSight')->middleware('auth');

Route::get('/adminwebsiteattractionbooking', 'BookingController@bookingAttraction')->middleware('auth');

Route::get('/adminwebsitebookingdelete/{booking_id}', 'BookingController@deleteBooking')->middleware('auth');

Route::get('/adminwebsiteairticketbooking', 'BookingController@bookingAirTicket')->middleware('auth');

Route::get('/adminwebsitevisabooking', 'VisaController@bookingVisa')->middleware('auth');

Route::get('/adminwebsitevisabookingdelete/{id}', 'VisaController@bookingVisaDelete')->middleware('auth');

// Options

Route::get('/adminwebsiteoptionslogo', 'AdminController@logoOptions')->middleware('auth');

Route::post('/adminwebsiteoptionslogosave', 'AdminController@logoOptionsSave')->middleware('auth');

Route::get('/adminwebsiteoptionsfavicon', 'AdminController@faviconOptions')->middleware('auth');

Route::post('/adminwebsiteoptionsfaviconsave', 'AdminController@faviconOptionsSave')->middleware('auth');

Route::get('/adminwebsiteoptionsemail', 'AdminController@emailOptions')->middleware('auth');

Route::post('/adminwebsiteoptionsemailsave', 'AdminController@emailOptionsSave')->middleware('auth');

Route::get('/adminwebsiteoptionsaddress', 'AdminController@addressOptions')->middleware('auth');

Route::post('/adminwebsiteoptionsaddresssave', 'AdminController@addressOptionsSave')->middleware('auth');

Route::get('/adminwebsiteoptionsmobile', 'AdminController@mobileOptions')->middleware('auth');

Route::post('/adminwebsiteoptionsmobilesave', 'AdminController@mobileOptionsSave')->middleware('auth');

Route::get('/adminwebsiteoptionssocial', 'AdminController@socialOptions')->middleware('auth');

Route::post('/adminwebsiteoptionssocialsave', 'AdminController@socialOptionsSave')->middleware('auth');

Route::get('/adminwebsiteoptionssocial', 'AdminController@socialOptions')->middleware('auth');

Route::post('/adminwebsiteoptionssocialsave', 'AdminController@socialOptionsSave')->middleware('auth');

Route::get('/adminwebsiteoptionscopyright', 'AdminController@copyrightOptions')->middleware('auth');

Route::post('/adminwebsiteoptionscopyrightsave', 'AdminController@copyrightOptionsSave')->middleware('auth');

// Admin Monthly Expense

Route::get('/adminmonthlyexpanse', 'AdminController@adminMonthlyExpanse')->middleware('auth');
Route::get('/adminweeklyexpanse', 'AdminController@adminWeeklyExpanse')->middleware('auth');

// Operator


Route::get('/adminwebsiteoperatorlocation', 'OperatorController@OperatorLocation')->middleware('auth');

Route::post('/adminwebsiteoperatorlocationsave', 'OperatorController@OperatorLocationSave')->middleware('auth');

Route::get('/adminwebsiteoperatorlocationdelete/{id}', 'OperatorController@OperatorLocationDelete')->middleware('auth');

Route::get('/adminwebsiteoperatorhotel', 'OperatorController@OperatorHotel')->middleware('auth');

Route::post('/adminwebsiteoperatorhotelsave', 'OperatorController@OperatorHotelSave')->middleware('auth');

Route::get('/adminwebsiteoperatorhoteldelete/{id}', 'OperatorController@OperatorHotelDelete')->middleware('auth');

Route::get('/adminwebsiteoperatorpicdrop', 'OperatorController@OperatorPicDrop')->middleware('auth');

Route::post('/adminwebsiteoperatorpicdropsave', 'OperatorController@OperatorPicDropSave')->middleware('auth');

Route::get('/adminwebsiteoperatorpicdropdelete/{id}', 'OperatorController@OperatorPicDropDelete')->middleware('auth');

Route::get('/adminwebsiteoperatorfood', 'OperatorController@OperatorFood')->middleware('auth');

Route::post('/adminwebsiteoperatorfoodsave', 'OperatorController@OperatorFoodSave')->middleware('auth');

Route::get('/adminwebsiteoperatorfooddelete/{id}', 'OperatorController@OperatorFoodDelete')->middleware('auth');

Route::get('/adminwebsiteoperatorairticket', 'OperatorController@OperatorAirTicket')->middleware('auth');

Route::post('/adminwebsiteoperatorairticketsave', 'OperatorController@OperatorAirTicketSave')->middleware('auth');

Route::get('/adminwebsiteoperatorairticketdelete/{id}', 'OperatorController@OperatorAirTicketDelete')->middleware('auth');

Route::get('/adminwebsiteoperatorsight', 'OperatorController@OperatorSight')->middleware('auth');

Route::post('/adminwebsiteoperatorsightsave', 'OperatorController@OperatorSightSave')->middleware('auth');

Route::get('/adminwebsiteoperatorsightdelete/{id}', 'OperatorController@OperatorSightDelete')->middleware('auth');


//---------- ERP Start ---------------//

// Customer
Route::get('/adminerpcustomer', 'ErpCustomerController@showCustomerBox')->middleware('auth');
//Route::get('/adminerpcustomer', 'ErpCustomerController@showCustomer')->middleware('auth');
Route::post('/adminerpcustomercreate', 'ErpCustomerController@createCustomer')->middleware('auth');
Route::get('/adminerpcustomeredit/{id}', 'ErpCustomerController@editCustomer')->middleware('auth');
Route::get('/adminerpcustomershow/{id}', 'ErpCustomerController@detailsCustomer')->middleware('auth');
Route::put('/adminerpcustomerupdate/{id}', 'ErpCustomerController@updateCustomer')->middleware('auth');
//Route::delete('/adminerpcustomerdelete/{id}', 'ErpCustomerController@deleteCustomer')->middleware('auth');
Route::post('/adminerpcustomerdelete/{customer_id}', 'ErpCustomerController@deleteCustomer')->middleware('auth');

// Sales
Route::get('/adminerpsales', 'ErpSalesController@showSales')->middleware('auth');
Route::post('/adminerpsalesadd', 'ErpSalesController@addSales')->middleware('auth');
Route::get('/adminerpsalesview/{sales_id}', 'ErpSalesController@detailsSales')->middleware('auth');
Route::get('/adminerpsalesedit/{sales_id}', 'ErpSalesController@editSales')->middleware('auth');
Route::put('/adminerpsalesupdate/{sales_id}', 'ErpSalesController@updateSales')->middleware('auth');
Route::post('/adminerpsalesdelete/{sales_id}', 'ErpSalesController@deleteSales')->middleware('auth');

Route::get('/adminerpsellertype-json', 'ErpSalesController@sellerTypeName')->middleware('auth');

// Task
Route::get('/adminerptask', 'ErpTaskController@showTask')->middleware('auth');
Route::post('/adminerpaddtask', 'ErpTaskController@addTask')->middleware('auth');
Route::get('/adminerpedittask/{id}', 'ErpTaskController@editTask')->middleware('auth');
Route::put('/adminerptaskupdate/{task_id}', 'ErpTaskController@updateTask')->middleware('auth');
Route::get('/adminerptaskview/{task_id}', 'ErpTaskController@detailsTask')->middleware('auth');
Route::post('/adminerptaskdelete/{task_id}', 'ErpTaskController@deleteTask')->middleware('auth');

// Employee
Route::get('/adminerpemployee', 'ErpEmployeeController@showEmployee');
Route::post('/adminerpemployeeadd', 'ErpEmployeeController@createEmployee');
Route::get('/adminerpemployeeview/{id}', 'ErpEmployeeController@viewEmployee');
Route::get('/adminerpemployeeedit/{id}', 'ErpEmployeeController@editEmployee');
Route::put('/adminerpemployeeupdate/{id}', 'ErpEmployeeController@updateEmployee');
Route::delete('/adminerpemployeedelete/{id}', 'ErpEmployeeController@deleteEmployee');

// Employee Attendence
Route::get('/adminerpemployeeattendence', 'ErpEmployeeAttendenceController@showEmployeeAttendence');
Route::post('/adminerpemployeeattendenceadd', 'ErpEmployeeAttendenceController@createEmployeeAttendence');
Route::get('/adminerpemployeeattendenceedit/{id}', 'ErpEmployeeAttendenceController@editEmployeeAttendence');
Route::put('/adminerpemployeeattendenceupdate/{id}', 'ErpEmployeeAttendenceController@updateEmployeeAttendence');
Route::delete('/adminerpemployeeattendencedelete/{id}', 'ErpEmployeeAttendenceController@deleteEmployeeAttendence');


// Accounts
Route::get('/adminerpexpenses', 'ErpAccountsController@showExpenses');
Route::post('/adminerpexpensesadd', 'ErpAccountsController@addExpenses');
Route::get('/adminerpexpensesedit/{expense_id}', 'ErpAccountsController@editExpenses');
Route::put('/adminerpexpensesupdate/{expense_id}', 'ErpAccountsController@updateExpenses');
Route::delete('/adminerpexpensesdelete/{expense_id}', 'ErpAccountsController@deleteExpenses');
Route::get('/adminerpincome', 'ErpAccountsController@showIncome')->middleware('auth');
Route::get('/adminerpinexreport', 'ErpAccountsController@inExReport')->middleware('auth');

// Agent
Route::get('/adminerpagent', 'ErpAgentController@showAgent');
Route::post('/adminerpagentadd', 'ErpAgentController@createAgent');
Route::get('/adminerpagentview/{id}', 'ErpAgentController@viewAgent');
Route::get('/adminerpagentedit/{id}', 'ErpAgentController@editAgent');
Route::put('/adminerpagentupdate/{id}', 'ErpAgentController@updateAgent');
Route::delete('/adminerpagentdelete/{id}', 'ErpAgentController@deleteAgent');


// Employee Announcement
Route::get('/adminerpemployeeannouncement', 'ErpEmployeeAnnouncementController@showEmployeeAnnouncement');
Route::post('/adminerpemployeeannouncementadd', 'ErpEmployeeAnnouncementController@createEmployeeAnnouncement');
Route::get('/adminerpemployeeannouncementview/{id}', 'ErpEmployeeAnnouncementController@viewEmployeeAnnouncement');
Route::get('/adminerpemployeeannouncementedit/{id}', 'ErpEmployeeAnnouncementController@editEmployeeAnnouncement');
Route::put('/adminerpemployeeannouncementupdate/{id}', 'ErpEmployeeAnnouncementController@updateEmployeeAnnouncement');
Route::delete('/adminerpemployeeannouncementdelete/{id}', 'ErpEmployeeAnnouncementController@deleteEmployeeAnnouncement');


// Income


//---------- ERP End ---------------//


// Clear Cache
Route::get('/clear-cache', function() {
	$exitCode = Artisan::call('cache:clear');
	// return what you want
});

});
//Prevet back-history remove

/*
================================
Login Routes
================================
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@adminLogin');

// Admin Auth Routes
Route::get('/adminhome', 'AdminLogin\LoginController@adminHome');
Route::get('/adminlogin', 'AdminLogin\LoginController@showLoginForm');
Route::post('/adminlogin', 'AdminLogin\LoginController@login');
Route::get('/adminregister', 'AdminLogin\LoginController@register');
Route::post('/adminregister', 'AdminLogin\LoginController@register');

//================================= Frondend Account Login ============================//

// Login page
Route::get('/accountlogin', 'FrontEndController@accountLogin');

//Employee Auth
Route::get('/employeehome', 'EmployeeProfileController@employeeHome');
Route::get('/employeelogin', 'Employee\LoginController@showLoginForm');
Route::post('/employeelogin', 'Employee\LoginController@login');
Route::get('/employeeregister', 'Employee\LoginController@register');
Route::post('/employeeregister', 'Employee\RegisterController@register');
Route::post('/employeelogout', 'Employee\LoginController@logout');
Route::get('/employeelogout', 'Employee\LoginController@logout');

// Front End Employee Profile
Route::get('/employeeprofileedit','EmployeeProfileController@employeeProfileEdit');
Route::post('/employeeprofileupdate','EmployeeProfileController@employeeProfileUpdate');

// Front End Employee Task
Route::get('/employeetasks','EmployeeProfileController@employeeTasks');
Route::get('/employeeattendences','EmployeeProfileController@employeeAttendences');

// Front End Employee Expense
Route::get('/employeeexpense','EmployeeProfileController@employeeExpense');
Route::get('/employeeexpenseadd','EmployeeProfileController@employeeExpenseAdd');
Route::post('/employeeexpensecreate','EmployeeProfileController@employeeExpenseCreate');
