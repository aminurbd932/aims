<?php


    /**
     * gender list
     */
     if (! function_exists('gender')) {
     	
	    function gender($is_selct = 0) {
            
            $gender = [
                '1' => 'Male',
                '2' => 'Female',
                '3' => 'Common'
            ];
            if ($is_selct) :
                $gender =  ['' => 'Select'] + $gender;
            endif;
            return $gender;
	    }
    }

    /**
     * religion list
     */
     if (! function_exists('religion')) {
        
        function religion($is_selct = 0) {
            
            $religion = [
                '1' => 'Islam',
                '2' => 'Hindu',
                '3' => 'Christian',
                '4' => 'Buddha',
                '5' => 'Others'
            ];
            if ($is_selct) :
                $religion =  ['' => 'Select'] + $religion;
            endif;
            return $religion;
        }
    }

    /**
     * religion list
     */
     if (! function_exists('bloodGroup')) {
        
        function bloodGroup($is_selct = 0) {
            
            $blood_group = [
                '1' => 'A+',
                '2' => 'O+',
                '3' => 'B+',
                '4' => 'AB+',
                '5' => 'A-',
                '6' => 'O-',
                '7' => 'B-',
                '8' => 'AB-',
            ];
            if ($is_selct) :
                $blood_group =  ['' => 'Select'] + $blood_group;
            endif;
            return $blood_group;
        }
    }

    /**
     * religion list
     */
     if (! function_exists('profession')) {
        
        function profession($is_selct = 0) {
            
            $profession = [
                '1' => 'Business',
                '2' => 'Doctor',
                '3' => 'Economist',
                '4' => 'Engineer',
                '5' => 'Farmer',
                '6' => 'Govt. Service',
                '7' => 'Journalist',
                '8' => 'Lawyer',
                '9' => 'Pharmacists',
                '10' => 'Public Service',
                '11' => 'Scientists',
                '12' => 'Social Worker',
                '13' => 'Teacher',
                '14' => 'Self Employee',
                '15' => 'House Wife',
                '16' => 'Others'
            ];
            if ($is_selct) :
                $profession =  ['' => 'Select'] + $profession;
            endif;
            return $profession;
        }
    }

    /**
     * examination list
     */
     if (! function_exists('examination')) {
        
        function examination($is_selct = 0, $type = 0) {
            
            $examination = [
                '1' => 'P.S.C',
                '2' => 'J.S.C',
                '3' => 'S.S.C'
            ];
            if ($type) {
                $examination = [
                    '1' => 'P.S.C',
                    '2' => 'J.S.C',
                    '3' => 'S.S.C',
                    '4' => 'H.S.C',
                    '5' => 'BA(Pass)'
                ];
            }
            if ($is_selct) :
                $examination =  ['' => 'Select'] + $examination;
            endif;
            return $examination;
        }
    }

    /**
     * qualification year list
     */
     if (! function_exists('qualificationYear')) {
        
        function qualificationYear($is_selct = 0) {
            $q_year = [];
            for($i = 1980; $i < 2015; $i++) :
                $q_year[$i] = $i;
            endfor;
            if ($is_selct) :
                $q_year =  ['' => 'Select'] + $q_year;
            endif;
            return $q_year;
        }
    }

    /**
     * examination list
     */
     if (! function_exists('resultStatus')) {
        
        function resultStatus($is_selct = 0) {
            
            $result_status = [
                '1' => 'Allow',
                '2' => 'Waitting',
                '3' => 'Not Allow'
            ];
            if ($is_selct) :
                $result_status =  ['' => 'Select'] + $result_status;
            endif;
            return $result_status;
        }
    }

    /**
     * employee type list
     */
     if (! function_exists('employeeType')) {
        
        function employeeType($is_selct = 0) {
            
            $emp_type = [
                '1' => 'Faculty Member',
                '2' => 'Admin',
                '3' => 'Third Grade Staff',
                '4' => 'Fourth Grade Staff'
            ];
            if ($is_selct) :
                $emp_type =  ['' => 'Select'] + $emp_type;
            endif;
            return $emp_type;
        }
    }

    /**
     * employment status list
     */
     if (! function_exists('employmentStatus')) {
        
        function employmentStatus($is_selct = 0) {
            
            $emp_status = [
                '1' => 'Permanent',
                '2' => 'Part-time',
                '3' => 'Temporary'
            ];
            if ($is_selct) :
                $emp_status =  ['' => 'Select'] + $emp_status;
            endif;
            return $emp_status;
        }
    }

    /**
     * student promotion type list
     */
     if (! function_exists('promotionType')) {
        
        function promotionType($is_selct = 0) {
            
            $promotion_type = [
                '1' => 'Admission Student(New)',
                '2' => 'Student(Old)'
            ];
            if ($is_selct) :
                $promotion_type =  ['' => 'Select'] + $promotion_type;
            endif;
            return $promotion_type;
        }
    }

    /**
     * subject type list
     */
     if (! function_exists('subjectType')) {
        
        function subjectType($is_selct = 0) {
            
            $subject_type = [
                '1' => 'Common',
                '2' => 'Optional',
                '3' => 'Extra'
            ];
            if ($is_selct) :
                $subject_type =  ['' => 'Select'] + $subject_type;
            endif;
            return $subject_type;
        }
    }
