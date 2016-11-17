<?php

/**
 * Created by PhpStorm.
 * User: Mazba
 * Date: 2/28/2016
 * Time: 11:27 AM
 */
return [
    'user_group' => [
        'super_admin' => 1,
        'hq_office' => 2,
        'divisional_office' => 3,
        'district_office' => 4,
        'upazila_office' => 5,
    ],
    'language_options' => [
        'Excellent' => 'Excellent', 'Moderate' => 'Moderate', 'Good' => 'Good', 'Poor' => 'Poor'
    ],
    'blood_groups' => [
        'A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-', 'O+' => 'O+', 'O-' => 'O-'
    ],
    'languages' => [
        'bangla' => 'Bangla', 'english' => 'English', 'hindi' => 'Hindi', 'arabic' => 'Arabic', 'portuguese' => 'Portuguese', 'russian' => 'Russian', 'chinese' => 'Chinese', 'spanish' => 'Spanish'
    ],
    'genders' => [
        1 => 'পুরুষ',
        2 => 'মহিলা'
    ],
    'religions' => [
        1 => 'ইসলাম',
        2 => 'হিন্দু',
        3 => 'বৌদ্ধ',
        4 => 'খ্রিষ্টান',
    ],
    'status_options' => [
        1 => 'হ্যাঁ',
        2 => 'না'
    ],
    'office_level' => [
        'HQ' => 1,
        'Divisional' => 2,
        'District' => 3,
        'Upazila' => 4,
//        'Union'=>4,
    ],
    'application_status' => [
        'Reject' => 0,
        'Pending' => 1,
        'Approved' => 2,
        'Investigating' => 3,
        'Investigated' => 4,
        'Closed' => 5,
    ],
    'inspections_status' => [
        'pending' => 1,
        'done' => 2
    ],
    'party_type' => [
        'appellant' => 1,
        'defendant' => 2
    ],
    'lawyers_type' => [
        'appellant' => 1,
        'defendant' => 2
    ],
    'security' => [
        'salt' => 'fsdfsdLwQGrLgdboMAZBAscakeFS1',
        'min_hash_length' => 8,
        'alphabet' => 'abcdefghijklmnopqrstuvwxyz0123456789'
    ],
    'project_root' => 'cantonment',
    'building_type' => [
        'new' => 'নতুন',
        'rebuild' => 'পুনঃ নির্মাণ',
        'extension' => 'বর্ধিতকরন'
    ],
    'building_status' => [
        'completed' => 'সম্পন্ন',
        'ongoing' => 'নির্মাণাধীন'
    ],
    'roof_type' => [
        'dhalai' => 'ঢালাই',
        'tin-shed' => 'টিন শেড',
        'other' => 'অন্যান্য'
    ],
    'soil_type' => [
        'A' => 'A',
        'B' => 'B',
        'C' => 'C'
    ],
    'apartment_type' => [
        'resident' => 'স্ব-ব্যাবহারকারী',
        'rent' => 'ভাড়া'
    ],
    //not using right now 
    'date_picker' => [
        'CakeDateFormat' => 'Y-M-d',
        'DatePickerFormat' => 'yyyy/mm/dd',
        'CakeDateFormatForView' => 'm/d/Y',
    ],
    'house_type' => [
        'tin_shed' => 'টিন শেড',
        'paka' => 'পাকা',
        'semi_paka' => 'সেমি পাকা',
        'kacha' => 'কাঁচা'
    ],
    'owner_type' => [
        'allotment' => 'বরাদ্দ সূত্রে',
        'purchase' => 'ক্রয় সূত্রে',
        'inheritance' => 'উৎরাধিকার সূত্রে',
        'lease' => 'লিজ',
        'donated' => 'দান সূত্রে'
    ],
    'usage_type' => [
        'own' => 'নিজ',
        'rent' => 'ভাড়া'
    ],
    'property_type' => [
        'Buildings'=>'ভবন',
        'Plots' => 'প্লট',
        'Houses' => 'বাড়ি',
        'Apartments' => 'এপার্টমেন্ট',
        'Shops' => 'দোকান'
    ],
    'file_type' => [
        'soil' => 'Soil',
        'plan' => 'Plan',
        'fire_clearance' => 'Fire Clearance',
        'environment_clearance' => 'Environment Clearance',
        'air' => 'Air',
        'legal_clearance' => 'Legal Clearance'
    ],
    'submission_type' => [
        'revised' => 'Revised',
        'new' => 'New',
        'again' => 'Again',
        'corrected' => 'Corrected'
    ],
    'building_ownership_type' => [
        'civilian' => 'বেসামরিক',
        'non_civilian' => 'সামরিক',
        'freedom_fighter' => 'মুক্তিযোদ্ধা'
    ],
    'tax_collection_location'=>[
      'dohs'=>'ডিওএইচএস',
       'non_dohs'=>'ক্যান্টনমেন্ট এলাকা'
    ],
    'build_purpose' => [
        'residential' => 'আবাসিক',
        'commercial' => 'বাণিজ্যিক',
        'residential_commercial' => 'আবাসিক এবং বাণিজ্যিক'
    ],
    'shop_type' => [
        1 => 'Type 1',
        2 => 'Type 2',
        3 => 'Type 3'
    ],

    'current_condition' => [
        'blank' => 'খালি',
        'owner_using' => 'মালিক ব্যাবহার ',
        'rent' => 'ভাড়া'
    ],
    'tax_related_parameters' =>[
        '10'=>'Duration In Month',
        '12.5'=>'Percentage Imposed',
        '40'=>'Deduction of Percentage For Non Dohs'
    ],
    'economic_year' =>[
        '2016-2017'=>'2016-2017',
        '2017-2018'=>'2017-2018',
        '2018-2019'=>'2018-2019'
    ],
    'assess_type'=>[
        'new'=>'নতুন',
        'revised'=>'সংশোধিত'
    ]
];
