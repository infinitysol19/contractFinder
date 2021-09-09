<?php
namespace App\helpers;
use DateTime;
class CustomHelper
{


        

public function NewsLetterSubscriber()
{ 
	return ' <form class="subscribe-form">

                            <input type="email" placeholder="Enter Your Email" name="email" id="subsemail">

                            <button type="button" class="custom-button newsLetterSubscriber">Subscribe</button>

                        </form>';
}
 







public function DaysDiff($date1,$date2)
{
  $date1 = new DateTime($date1);
  $date2 = new DateTime($date2);
  $interval2 = $date1->diff($date2);
                               
  return  $interval2->days;
}





}