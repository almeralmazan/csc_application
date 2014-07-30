<?php

class SmsController extends BaseController {

    public function incomingMessagesFromApplicant()
    {
        $message = explode(' ', Input::get('Body'));
        $control_number = $message[0];
        $request_type = $message[1];

        $applicant = DB::table('applicants')
            ->select(
                'applicant_first_name',
                'applicant_last_name',
                'applicant_status',
                'paid_status',
                'exam_status'
            )
            ->where('controlno', $control_number)
            ->first();


        if ( ! empty($applicant))
        {
            if ($request_type === 'paid_status')
            {
                if ($applicant->paid_status == 1)
                {
                    header("content-type: text/xml");
                    echo "<?xml version='1.0' encoding='UTF-8' ?>\n";
                    echo '<Response>';
                    echo "<Message>Paid Status\nControl #: " . $control_number . "\nName: " . $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name . "\nResult: Paid". '</Message>';
                    echo '</Response>';
                }
                else
                {
                    header("content-type: text/xml");
                    echo "<?xml version='1.0' encoding='UTF-8' ?>\n";
                    echo '<Response>';
                    echo "<Message>Paid Status\nControl #: " . $control_number . "\nName: " . $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name . "\nResult: Not Paid". '</Message>';
                    echo '</Response>';
                }
            }
            elseif ($request_type === 'exam_status')
            {
                if ($applicant->exam_status == 1)
                {
                    header("content-type: text/xml");
                    echo "<?xml version='1.0' encoding='UTF-8' ?>\n";
                    echo '<Response>';
                    echo "<Message>Exam Status\nControl #: " . $control_number . "\nName: " . $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name . "\nResult: Passed". '</Message>';
                    echo '</Response>';
                }
                elseif ($applicant->exam_status == 0)
                {
                    header("content-type: text/xml");
                    echo "<?xml version='1.0' encoding='UTF-8' ?>\n";
                    echo '<Response>';
                    echo "<Message>Exam Status\nControl #: " . $control_number . "\nName: " . $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name . "\nResult: Failed". '</Message>';
                    echo '</Response>';
                }
                else
                {
                    header("content-type: text/xml");
                    echo "<?xml version='1.0' encoding='UTF-8' ?>\n";
                    echo '<Response>';
                    echo "<Message>Exam Status\nControl #: " . $control_number . "\nName: " . $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name . "\nResult: Standby for exam". '</Message>';
                    echo '</Response>';
                }
            }
            elseif ($request_type == 'applicant_status')
            {
                if ($applicant->applicant_status == 1)
                {
                    header("content-type: text/xml");
                    echo "<?xml version='1.0' encoding='UTF-8' ?>\n";
                    echo '<Response>';
                    echo "<Message>Applicant Status\nControl #: " . $control_number . "\nName: " . $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name . "\nResult: Approved". '</Message>';
                    echo '</Response>';
                }
                else
                {
                    header("content-type: text/xml");
                    echo "<?xml version='1.0' encoding='UTF-8' ?>\n";
                    echo '<Response>';
                    echo "<Message>Applicant Status\nControl #: " . $control_number . "\nName: " . $applicant->applicant_first_name . ' ' . $applicant->applicant_last_name . "\nResult: Disapproved". '</Message>';
                    echo '</Response>';
                }
            }
            else
            {
                header("content-type: text/xml");
                echo "<?xml version='1.0' encoding='UTF-8' ?>\n";
                echo '<Response>';
                echo "<Message>Sorry we can't process your request.\nPlease check the request_type format.</Message>";
                echo '</Response>';
            }
        }
        else
        {
            header("content-type: text/xml");
            echo "<?xml version='1.0' encoding='UTF-8' ?>\n";
            echo '<Response>';
            echo "<Message>Sorry we can't process your request.\nThe control number you send does not exist.</Message>";
            echo '</Response>';
        }

    }
}