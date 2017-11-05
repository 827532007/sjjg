/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  82753
 * Created: 2017-11-5
 */

SELECT sub.`id`, sub.user_id, ans.question_id, ans.daan, que.timu, que.a, que.b, que.c, que.d, que.type 
FROM `submit` sub left join daan ans 
ON 
sub.`id` = ans.submit_id 
left  join dati que 
ON 
que.id = ans.question_id 
where sub.`id`=12 
