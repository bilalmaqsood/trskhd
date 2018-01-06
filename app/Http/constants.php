<?php

//DEFINING USER TYPES /////////////
define('ADMIN', 'admin');
define('STAFF', 'staff');
define('AGENT', 'agent');
define('STUDENT', 'student');
define('SCHOOL_REPRESENTATIVE', 'school-representative');
define('PARENT', 'parent');
define('PARENT_SLUG', 'parent');
///////  Quotation Status //////////////////////////////
define('DRAFT', 'Draft');
define('ASSIGNED', 'Assigned');
define('PENDING_APPROVAL', 'Pending Approval');
define('APPROVED', 'Approved');
define('REJECTED', 'Rejected');
define('CONVERTED', 'Converted');
define('UNASSIGNED', 'Unassigned');
define('EXPIRED', 'Expired');
///////////////////// Online Tests Status////////////////////
define('NOT_STARTED', 'Not Started');
define('STARTED', 'Started');
define('GRADED', 'Graded');
define('GRADE_PENDING', 'Grade pending');
define('TYPE_ESSAY', 'Essay');

///////////////////////////////////
define('SPECIAL_OFFER_DISCOUNT_TYPES', json_encode([
	'amount_off' => 'Amount Off ($)',
	'percentage_off' => 'Percentage Off (%)',
	'value_override' => 'Value Override ($)',
]));
///////////////////////////////////
define('LETTER_OF_OFFER_TYPES', json_encode([
	'section' => 'Section ',
	'letter_of_offer' => 'Letter of Offer',
	'invoice' => 'Invoice',
	'acceptance_of_offer' => 'Acceptance of Offer',
	'welfare_agreement' => 'Acceptance of Offer and Welfare Agreement',
	'page_break' => 'Page Break',

]));
define('SPECIAL_OFFER_TRANSPORTATION_DISCOUNT_TYPES', json_encode([
	'amount_off' => 'Amount Off ($)',
	'percentage_off' => 'Percentage Off (%)',
]));
define('GENDER', json_encode([
	'male' => 'Male',
	'female' => 'Female',
]));
define('BOOKING_STATUSES', json_encode([
	'hold' => 'Hold',
	'booking' => 'Booking',
	'confirmed' => 'Confirmed',
]));
define('GUEST_TYPES', json_encode([
	'student' => 'Student',
	'agent' => 'Agent',
	'staff' => 'Staff',
]));
define('CALENDAR_BOOKING_STATUSES', json_encode([
	'admin' => 'Blocked',
	'booking' => 'Booking',
]));
////////// Upload Directories ///////////////////////////////////
define('ACL_PUBLIC', "public");
define('ACL_PRIVATE', "private");

define('UPLOADS_PATH', "uploads/");
define('DOWNLOADS_PATH', "downloads/");

define('PROGRAMS_SPECIAL_OFFER_DIRECTORY', "special-offer-attachments/programs/");

define('ACCOMMODATIONS_SPECIAL_OFFER_DIRECTORY', "special-offer-attachments/accommodations/");

define('STUDENT_FORMS_DIRECTORY', "student-forms/");

define('STUDY_PLAN_DIRECTORY', "studyplan/");

define('DATE_FORMAT', "d-m-Y h:i A");

////////////FIRST DAY FORM PICTURE Types////////////////////////////////////////
const PICTURE_TYPE_STUDENT = 'Student';
const PICTURE_TYPE_PASSPORT = 'Passport';
const PICTURE_TYPE_AGENT = 'Agent';

////////////Media Types////////////////////////////////////////
class MEDIA_TYPES {
	const IMAGE = 'image';
	const VIDEO = 'video';
	const DOCUMENT = 'document';
	const PDF = 'pdf';
}

//////////////Integrations////////////////////////////////////////
class INTEGRATION_TYPES {
	const PARDOT = 'Pardot';
	const PUSHER = 'Pusher';
	const BRILLIUM = 'Brillium';
	const EBACAS = 'eBecas';
	const TWILIO = 'Twilio';
	const PARDOT_VARIABLES = 'PardotVariables';

}
//-----------------------------------------
// Application Form Statuses
//-----------------------------------------
class APPLICATIONFORM_STATUSES {
	const DRAFT = 'Draft';
	const UNDERREVIEW = 'Under Review';
	const INFORMATIONREQUIRED = 'Information Required';
	const PROCESSING = 'Processing';
	const OFFER = 'Offer';
	const ACCEPTED = 'Accepted';
	const ENROLLED = 'Enrolled';
	const CANCELLED = 'Cancelled';
	const EXPIRED = 'Expired';
}
//------------Validation Methods
define('DEFAULT_VALIDATION_METHOD', 'pardot');

//------------Auto Notification Template
define('TYPE_SCHOOL_AVAILABILITY', "SCHOOL_AVAILABILITY");
define('MEDIUM_EMAIL', "EMAIL");

//-----------------------------------------
// Letter Of Offer Condition Types
//-----------------------------------------
class CONDITION_TYPES {
	const ENGLISHLEVEL = 'English Level';
	const GTE = 'Genuine Temporary Entrant';
}

define('TYPE_QUOTE_EXPIRE_REMINDER', "QUOTE_EXPIRE_REMINDER");
define('TYPE_QUOTE_EXPIRED', "QUOTE_EXPIRED");
define('TYPE_APPLICATION_EXPIRE_REMINDER', "APPLICATION_EXPIRE_REMINDER");
define('TYPE_APPLICATION_EXPIRED', "APPLICATION_EXPIRED");
