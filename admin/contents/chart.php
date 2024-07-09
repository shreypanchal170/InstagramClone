<?php 
$months = array();
$months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
$maleFemale = array("male","female"); 
$GenderTotalyUsers = array(0,0);
$yearMonthTotalyUsers = array(0,0,0,0,0,0,0,0,0,0,0,0);
$yearMonthTotalyEarn = array(0,0,0,0,0,0,0,0,0,0,0,0);
$yearMonthTotalComments = array(0,0,0,0,0,0,0,0,0,0,0,0);  
$yearMonthTotalPosts = array(0,0,0,0,0,0,0,0,0,0,0,0);    
$yearMonthTotalMessages = array(0,0,0,0,0,0,0,0,0,0,0,0);    
$YearMonthTotalCreatedGroups = array(0,0,0,0,0,0,0,0,0,0,0,0); 
$YearMonthTotaldonate = array(0,0,0,0,0,0,0,0,0,0,0,0);
$YearMonthTotalBoost = array(0,0,0,0,0,0,0,0,0,0,0,0);
$YearMonthTotalTEarning = array(0,0,0,0,0,0,0,0,0,0,0,0); 
$YearMonthTotalStripeEarning = array(0,0,0,0,0,0,0,0,0,0,0,0);
$YearMonthTotalRazorPayEarning = array(0,0,0,0,0,0,0,0,0,0,0,0);
$YearMonthTotalPayPalEarning = array(0,0,0,0,0,0,0,0,0,0,0,0);
$YearMonthTotalIyziCoEarning = array(0,0,0,0,0,0,0,0,0,0,0,0);
$YearMonthTotalBitPayEarning = array(0,0,0,0,0,0,0,0,0,0,0,0);
$YearMonthTotalPayStackEarning = array(0,0,0,0,0,0,0,0,0,0,0,0);
$YearMonthTotalAutHorizeNetEarning = array(0,0,0,0,0,0,0,0,0,0,0,0);
//mounthly total user
$YearMonthyTotalyUser = mysqli_query($db,"SELECT user_registered_month + 1, `count` 
FROM ( SELECT MONTH(FROM_UNIXTIME(user_registered)) AS user_registered_month, count(*) AS `count`
FROM dot_users
WHERE YEAR(FROM_UNIXTIME(user_registered)) = YEAR(CURDATE())
group by MONTH(FROM_UNIXTIME(user_registered))
ORDER BY MONTH(FROM_UNIXTIME(user_registered))
) AS alias") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthyTotalyUser, MYSQLI_NUM)) {  
	$yearMonthTotalyUsers[$row[0]] = $row[1];  
}
// Monthly Total Comment
$YearMonthTotalComment = mysqli_query($db,"SELECT comment_registered_month + 1, `count` 
FROM ( SELECT MONTH(FROM_UNIXTIME(comment_created_time)) AS comment_registered_month, count(*) AS `count`
FROM dot_post_comments
WHERE YEAR(FROM_UNIXTIME(comment_created_time)) = YEAR(CURDATE())
group by MONTH(FROM_UNIXTIME(comment_created_time))
ORDER BY MONTH(FROM_UNIXTIME(comment_created_time))
) AS alias
") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthTotalComment, MYSQLI_NUM)) {  
	$yearMonthTotalComments[$row[0]] = $row[1];  
}

/**********************************************************
**********************************************************
**********************************************************

$YearMonthTotalComment = mysqli_query($db,"SELECT MONTH(FROM_UNIXTIME(comment_created_time))+1, count(*) 
FROM dot_post_comments
WHERE YEAR(FROM_UNIXTIME(comment_created_time)) = YEAR(CURDATE())
GROUP BY MONTH(FROM_UNIXTIME(comment_created_time))
ORDER BY MONTH(FROM_UNIXTIME(comment_created_time))
") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthTotalComment, MYSQLI_NUM)) {  
	$yearMonthTotalComments[$row[0]] = $row[1];  
}

**********************************************************
**********************************************************
**********************************************************/
// Monthly Total Comment
$YearMonthTotalPost = mysqli_query($db,"SELECT post_registered_month + 1, `count` 
FROM ( SELECT MONTH(FROM_UNIXTIME(post_created_time)) AS post_registered_month, count(*) AS `count`
FROM dot_user_posts
WHERE YEAR(FROM_UNIXTIME(post_created_time)) = YEAR(CURDATE())
group by MONTH(FROM_UNIXTIME(post_created_time))
ORDER BY MONTH(FROM_UNIXTIME(post_created_time))
) AS alias
") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthTotalPost, MYSQLI_NUM)) {  
	$yearMonthTotalPosts[$row[0]] = $row[1];  
}
/**********************************************************
**********************************************************
**********************************************************

$YearMonthTotalPost = mysqli_query($db,"SELECT MONTH(FROM_UNIXTIME(	post_created_time))+1, count(*) 
FROM dot_user_posts
WHERE YEAR(FROM_UNIXTIME(post_created_time)) = YEAR(CURDATE())
group by MONTH(FROM_UNIXTIME(post_created_time))
ORDER BY MONTH(FROM_UNIXTIME(post_created_time))
") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthTotalPost, MYSQLI_NUM)) {  
	$yearMonthTotalPosts[$row[0]] = $row[1];  
}

**********************************************************
**********************************************************
**********************************************************/
// Monthly Total Comment
$YearMonthTotalMessage = mysqli_query($db,"SELECT chat_registered_month + 1, `count` 
FROM ( SELECT MONTH(FROM_UNIXTIME(message_created_time)) AS chat_registered_month, count(*) AS `count`
FROM dot_chat
WHERE YEAR(FROM_UNIXTIME(message_created_time)) = YEAR(CURDATE())
group by MONTH(FROM_UNIXTIME(message_created_time))
ORDER BY MONTH(FROM_UNIXTIME(message_created_time))
) AS alias
") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthTotalMessage, MYSQLI_NUM)) {  
	$yearMonthTotalMessages[$row[0]] = $row[1];  
}
/**********************************************************
**********************************************************
**********************************************************

$YearMonthTotalMessage = mysqli_query($db,"SELECT MONTH(FROM_UNIXTIME(message_created_time))+1, count(*) 
FROM dot_chat
WHERE YEAR(FROM_UNIXTIME(message_created_time)) = YEAR(CURDATE())
group by MONTH(FROM_UNIXTIME(message_created_time))
ORDER BY MONTH(FROM_UNIXTIME(message_created_time))
") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthTotalMessage, MYSQLI_NUM)) {  
	$yearMonthTotalMessages[$row[0]] = $row[1];  
}

**********************************************************
**********************************************************
**********************************************************/
// Monthly Total Comment
$YearMonthTotalCreatedGroup = mysqli_query($db,"SELECT like_registered_month + 1, `count` 
FROM ( SELECT MONTH(FROM_UNIXTIME(liked_time)) AS like_registered_month, count(*) AS `count`
FROM dot_post_like
WHERE YEAR(FROM_UNIXTIME(liked_time)) = YEAR(CURDATE())
group by MONTH(FROM_UNIXTIME(liked_time))
ORDER BY MONTH(FROM_UNIXTIME(liked_time))
) AS alias
") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthTotalCreatedGroup, MYSQLI_NUM)) {  
	$YearMonthTotalCreatedGroups[$row[0]] = $row[1];  
}
 /**********************************************************
**********************************************************
**********************************************************

$YearMonthTotalCreatedGroup = mysqli_query($db,"SELECT MONTH(FROM_UNIXTIME(liked_time))+1, count(*) 
FROM dot_post_like
WHERE YEAR(FROM_UNIXTIME(liked_time)) = YEAR(CURDATE())
group by MONTH(FROM_UNIXTIME(liked_time))
ORDER BY MONTH(FROM_UNIXTIME(liked_time))
") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthTotalCreatedGroup, MYSQLI_NUM)) {  
	$YearMonthTotalCreatedGroups[$row[0]] = $row[1];  
}

**********************************************************
**********************************************************
**********************************************************/
//mounthly total user
/*$YearMonthyTotalyAdsEarnings = mysqli_query($db,"SELECT user_registered_month + 1, `count` 
FROM ( SELECT MONTH(FROM_UNIXTIME(time)) AS user_registered_month, count(*) AS `count`
FROM dot_transactions
WHERE YEAR(FROM_UNIXTIME(time)) = YEAR(CURDATE())
group by MONTH(FROM_UNIXTIME(time))
ORDER BY MONTH(FROM_UNIXTIME(time))
) AS alias") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthyTotalyAdsEarnings, MYSQLI_NUM)) {  
	$yearMonthTotalyEarn[$row[0]] = $row[1];  
}

$result = mysqli_query($db,"SELECT WEEKDAY(FROM_UNIXTIME(subscribe_time))+1, count(*) ,  SUM(subscribe_price) AS price FROM dot_subscribe_transactions
WHERE WEEKOFYEAR(FROM_UNIXTIME(subscribe_time)) = WEEKOFYEAR(CURDATE()) AND YEAR(FROM_UNIXTIME(subscribe_time)) = YEAR(CURDATE()) AND fenomen_id = '$uid' GROUP BY WEEKDAY(FROM_UNIXTIME(subscribe_time))
ORDER BY WEEKDAY(FROM_UNIXTIME(subscribe_time)) ") or die(mysqli_error($db));   */


$YearMonthyTotalyAdsEarnings = mysqli_query($db,"SELECT user_registered_month , `price` 
FROM ( SELECT MONTH(FROM_UNIXTIME(time))-1 AS user_registered_month , count(*) ,  SUM(amonth) AS price, product_boost_id
FROM dot_transactions
WHERE YEAR(FROM_UNIXTIME(time)) = YEAR(CURDATE())  AND product_boost_id IS NULL  AND complete = '1'
group by MONTH(FROM_UNIXTIME(time))
ORDER BY MONTH(FROM_UNIXTIME(time))
) AS alias") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthyTotalyAdsEarnings, MYSQLI_NUM)) {  
	$yearMonthTotalyEarn[$row[0]] = $row[1];  
}

$YearMonthyTotalyDonateEarnings = mysqli_query($db,"SELECT user_registered_month , `price` 
FROM ( SELECT MONTH(FROM_UNIXTIME(payment_time))-1 AS user_registered_month , count(*) ,  SUM(fee) AS price
FROM dot_payments
WHERE YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURDATE())
group by MONTH(FROM_UNIXTIME(payment_time))
ORDER BY MONTH(FROM_UNIXTIME(payment_time))
) AS alias") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthyTotalyDonateEarnings, MYSQLI_NUM)) {  
	$YearMonthTotaldonate[$row[0]] = $row[1];  
}
$YearMonthyTotalyBoostEarnings = mysqli_query($db,"SELECT  user_registered_month , `price` 
FROM ( SELECT MONTH(FROM_UNIXTIME(time))-1 AS user_registered_month , count(*) ,  SUM(amonth) AS price, product_boost_id
FROM dot_transactions
WHERE YEAR(FROM_UNIXTIME(time)) = YEAR(CURDATE()) AND product_boost_id IS NOT NULL  AND complete = '1'
group by MONTH(FROM_UNIXTIME(time))
ORDER BY MONTH(FROM_UNIXTIME(time))
) AS alias") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthyTotalyBoostEarnings, MYSQLI_NUM)) {  
	$YearMonthTotalBoost[$row[0]] = $row[1];  
}
$YearMonthyTotalyThemeEarnings = mysqli_query($db,"SELECT  user_registered_month , `price` 
FROM ( SELECT MONTH(FROM_UNIXTIME(time))-1 AS user_registered_month , count(*) ,  SUM(amonth) AS price, product_boost_id
FROM dot_transactions
WHERE YEAR(FROM_UNIXTIME(time)) = YEAR(CURDATE()) AND theme_id IS NOT NULL  AND complete = '1'
group by MONTH(FROM_UNIXTIME(time))
ORDER BY MONTH(FROM_UNIXTIME(time))
) AS alias") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthyTotalyThemeEarnings, MYSQLI_NUM)) {  
	$YearMonthTotalTEarning[$row[0]] = $row[1];  
}
// Monthly Total Stripe Earnings
$YearMonthyTotalyStripeEarnings = mysqli_query($db,"SELECT user_registered_month , `price` 
FROM ( SELECT MONTH(FROM_UNIXTIME(payment_time))-1 AS user_registered_month , count(*) ,  SUM(amount) AS price
FROM dot_payments
WHERE YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURDATE()) AND payment_type='pm' AND payment_status = '1' AND payment_option = 'stripe' 
group by MONTH(FROM_UNIXTIME(payment_time))
ORDER BY MONTH(FROM_UNIXTIME(payment_time))
) AS alias") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthyTotalyStripeEarnings, MYSQLI_NUM)) {  
	$YearMonthTotalStripeEarning[$row[0]] = $row[1];  
}
// Monthly Total Razorpay Earnings
$YearMonthyTotalyRazorPayEarnings = mysqli_query($db,"SELECT user_registered_month , `price` 
FROM ( SELECT MONTH(FROM_UNIXTIME(payment_time))-1 AS user_registered_month , count(*) ,  SUM(amount) AS price
FROM dot_payments
WHERE YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURDATE()) AND payment_type='pm' AND payment_status = '1' AND payment_option = 'razorpay' 
group by MONTH(FROM_UNIXTIME(payment_time))
ORDER BY MONTH(FROM_UNIXTIME(payment_time))
) AS alias") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthyTotalyRazorPayEarnings, MYSQLI_NUM)) {  
	$YearMonthTotalRazorPayEarning[$row[0]] = $row[1];  
}
// Monthly Total PayPal Earnings
$YearMonthyTotalyPayPalEarnings = mysqli_query($db,"SELECT user_registered_month , `price` 
FROM ( SELECT MONTH(FROM_UNIXTIME(payment_time))-1 AS user_registered_month , count(*) ,  SUM(amount) AS price
FROM dot_payments
WHERE YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURDATE()) AND payment_type='pm' AND payment_status = '1' AND payment_option = 'paypal' 
group by MONTH(FROM_UNIXTIME(payment_time))
ORDER BY MONTH(FROM_UNIXTIME(payment_time))
) AS alias") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthyTotalyPayPalEarnings, MYSQLI_NUM)) {  
	$YearMonthTotalPayPalEarning[$row[0]] = $row[1];  
}
// Monthly Total IyziCo Earnings
$YearMonthyTotalyIyziCoEarnings = mysqli_query($db,"SELECT user_registered_month , `price` 
FROM ( SELECT MONTH(FROM_UNIXTIME(payment_time))-1 AS user_registered_month , count(*) ,  SUM(amount) AS price
FROM dot_payments
WHERE YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURDATE()) AND payment_type='pm' AND payment_status = '1' AND payment_option = 'iyzico' 
group by MONTH(FROM_UNIXTIME(payment_time))
ORDER BY MONTH(FROM_UNIXTIME(payment_time))
) AS alias") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthyTotalyIyziCoEarnings, MYSQLI_NUM)) {  
	$YearMonthTotalIyziCoEarning[$row[0]] = $row[1];  
}
// Monthly Total BitPay Earnings
$YearMonthyTotalyBitPayEarnings = mysqli_query($db,"SELECT user_registered_month , `price` 
FROM ( SELECT MONTH(FROM_UNIXTIME(payment_time))-1 AS user_registered_month , count(*) ,  SUM(amount) AS price
FROM dot_payments
WHERE YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURDATE()) AND payment_type='pm' AND payment_status = '1' AND payment_option = 'bitpay' 
group by MONTH(FROM_UNIXTIME(payment_time))
ORDER BY MONTH(FROM_UNIXTIME(payment_time))
) AS alias") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthyTotalyBitPayEarnings, MYSQLI_NUM)) {  
	$YearMonthTotalBitPayEarning[$row[0]] = $row[1];  
}
// Monthly Total PayStack Earnings
$YearMonthyTotalyPayStackEarnings = mysqli_query($db,"SELECT user_registered_month , `price` 
FROM ( SELECT MONTH(FROM_UNIXTIME(payment_time))-1 AS user_registered_month , count(*) ,  SUM(amount) AS price
FROM dot_payments
WHERE YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURDATE()) AND payment_type='pm' AND payment_status = '1' AND payment_option = 'paystack' 
group by MONTH(FROM_UNIXTIME(payment_time))
ORDER BY MONTH(FROM_UNIXTIME(payment_time))
) AS alias") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthyTotalyPayStackEarnings, MYSQLI_NUM)) {  
	$YearMonthTotalPayStackEarning[$row[0]] = $row[1];  
}
// Monthly Total PayStack Earnings
$YearMonthyTotalyAutHorizeNetEarnings = mysqli_query($db,"SELECT user_registered_month , `price` 
FROM ( SELECT MONTH(FROM_UNIXTIME(payment_time))-1 AS user_registered_month , count(*) ,  SUM(amount) AS price
FROM dot_payments
WHERE YEAR(FROM_UNIXTIME(payment_time)) = YEAR(CURDATE()) AND payment_type='pm' AND payment_status = '1' AND payment_option = 'authorize-net' 
group by MONTH(FROM_UNIXTIME(payment_time))
ORDER BY MONTH(FROM_UNIXTIME(payment_time))
) AS alias") or die(mysqli_error($db)); 
while ($row = mysqli_fetch_array($YearMonthyTotalyAutHorizeNetEarnings, MYSQLI_NUM)) {  
	$YearMonthTotalAutHorizeNetEarning[$row[0]] = $row[1];  
} 
?>