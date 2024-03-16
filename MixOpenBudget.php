<?php
ob_start();
date_Default_timezone_set('Asia/Tashkent');

define('Feruzbek','6337178236:AAHWVHGz8mex_KC-A_V4uslOe8pI3ZNR_6Q');//BOT TOKEN

$finecoder = "990090559";//ADMIN ID
$bot = bot('getMe',['bot'])->result->username;

//Manba @FineCoders
//Manbaga tegsang itaraman!

require ('umidjon.php');

function bot($method,$datas=[]){
$url = "https://api.telegram.org/bot".Umidjon."/".$method;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
$res = curl_exec($ch);
if(curl_error($ch)){
var_dump(curl_error($ch));
}else{
return json_decode($res);
}
}


function send($text,$menu){
global $cid;
bot('sendMessage',[
'chat_id'=>$cid,
'text'=>$text,
'parse_mode'=>'html',
'disable_web_page_preview'=>true,
'reply_markup'=>$menu
]);
}

function sendp($photo,$text,$menu){
global $cid;
bot('sendPhoto',[
'chat_id'=>$cid,
'photo'=>$photo,
'caption'=>$text,
'parse_mode'=>'html',
'disable_web_page_preview'=>true,
'reply_markup'=>$menu
]);
}


function edit($text,$key){
global $cid, $mid;
return bot('editMessageText',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>$text,
'parse_mode'=>'html',
'disable_web_page_preview'=>true,
'reply_markup'=>$key
]);
}

function del(){
global $cid, $mid;
return bot('deleteMessage',[
'chat_id'=>$cid,
'message_id'=>$mid,
]);
}



function step($text){
global $cid;
file_put_contents("step/$cid.step",$text);
}

function put($addres, $value){
file_put_contents($addres, $value);
}

function get($value){
file_get_contents($value);
}

function ans($text){
global $qid;
bot('answerCallbackQuery',[
	'callback_query_id'=>$qid,
	'text'=>"$text",
	'show_alert'=>true,
]);
}




$umidjon = json_decode(file_get_contents('php://input'));
if($umidjon->message){
$message = $umidjon->message;
$type = $message->chat->type;
$text = $message->text;
$cid = $message->chat->id;
$uid= $message->from->id;
$mid = $message->message_id;
$username = $message->from->username;
$name = $message->from->first_name;

$title = $message->chat->title;
$repid = $message->reply_to_message->from->id;
$repmid = $message->reply_to_message->message_id;
$repname = $message->reply_to_message->from->first_name;
$reply = $message->reply_to_message;
$left = $message->left_chat_member;
$new = $message->new_chat_member;
$leftid = $message->left_chat_member->id;
$newid = $message->new_chat_member->id;
$newname = $message->new_chat_member->first_name;

}

if($umidjon->callback_query){
$data=$umidjon->callback_query->data;
$mid = $umidjon->callback_query->message->message_id;
$username = $message->chat->username; 
$cid = $umidjon->callback_query->message->chat->id;
$uid = $umidjon->callback_query->from->id;
$qid = $umidjon->callback_query->id;
$type=$umidjon->callback_query->message->chat->type;
$name = $umidjon->callback_query->from->first_name;
}

//Manba @FineCoders
//Manbaga tegsang itaraman!

mkdir("step");
mkdir("admin");

if(file_get_contents("admin/min.txt")){
}else{
if(file_put_contents("admin/min.txt","5000"));
}

if(file_get_contents("admin/user.txt")){
}else{
if(file_put_contents("admin/user.txt","Mix_Botlar"));
}

if(file_get_contents("admin/url.txt")){
}else{
if(file_put_contents("admin/url.txt","https://t.me/Mix_botlar/45"));
}

if(file_get_contents("admin/ref.txt")){
}else{
if(file_put_contents("admin/ref.txt","100"));
}

if(file_get_contents("admin/ovoz.txt")){
}else{
if(file_put_contents("admin/ovoz.txt","2000"));
}

if(file_get_contents("admin/chan.txt")){
}else{
if(file_put_contents("admin/chan.txt","-1001945197309"));
}

$step = file_get_contents("step/$cid.step");
$ref = file_get_contents("admin/ref.txt");
$ovoz = file_get_contents("admin/ovoz.txt");
$open = file_get_contents("admin/url.txt");
$user = file_get_contents("admin/user.txt");
$min = file_get_contents("admin/min.txt");
$isbot = file_get_contents("admin/chan.txt");
$ovozlar = file_get_contents("admin/ovozlar.txt");


$res = mysqli_query($db,"SELECT * FROM `users` WHERE user_id = '$cid'");
$rew = mysqli_fetch_assoc($res);
$user_id = $rew['user_id'];
$usid = $rew['id'];
$pul = $rew['balance'];
$status = $rew['status'];
$referal = $rew['referal'];
$outing = $rew['outing'];

if(isset($message)){
$result = mysqli_query($db,"SELECT * FROM users WHERE user_id = $cid");
$rew = mysqli_fetch_assoc($result);
if($rew){
}else{
mysqli_query($db,"INSERT INTO users(`user_id`,`balance`,`status`,`referal`,`outing`) VALUES ('$cid','0','active','0','0')");
}
}



$panel=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📨 Xabar yuborish"]],
[['text'=>"📊 Statistika"],['text'=>"⚙️ Sozlama"]],
[['text'=>"🏠 Orqaga"]],
]]);

$menu=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"📮 Ovoz berish"]],
[['text'=>"🖇️ Taklif qilish"],['text'=>"💵 Hisobim"]],
[['text'=>"📃 To'lovlar"],['text'=>"📑 Yo'riqnoma"]],
]
]);

$ort=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"🏠 Orqaga"]],
]]);

if($text=="/start"){
send("<b>🎯 OpenBudget botiga xush kelibsiz.\n\n✅ Quyidagi tugmalardan birini tanlang</b>",$menu);
unlink("step/$cid.step");
}


if($text=="🏠 Orqaga"){
send("<b>🎯 OpenBudget botiga xush kelibsiz.\n\n✅ Quyidagi tugmalardan birini tanlang</b>",$menu);
unlink("step/$cid.step");
exit();
}

if($text=="💵 Hisobim"){
send("🆔 <b>ID raqamingiz: <code>$usid</code>
🎯 Hisobingiz:</b> $pul so'm
💳 <b>Yechib olingan:</b> $outing so'm
🙆‍♂️ <b>Referallaringiz:</b> $referal ta",json_encode([
'inline_keyboard'=>[
[['text'=>"💰 Pul yechish",'callback_data'=>"out"]],
]]));
exit();
}

if($text=="📮 Ovoz berish"){
send("<b>📞 Telefon raqamingizni kiriting:\n\n✅ Namuna: +998931234567</b>",$ort);
step("ovoz");
}

if($step=="ovoz"){
$text2=str_replace("+","",$text);
if(mb_stripos($text,"+99833")!==false){
send("<b>🚫 HUMANS raqami qabul qilinmaydi!\n\n📞 Telefon raqamingizni kiriting:\n\n✅ Namuna: +998931234567</b>",$ort);
}elseif(mb_stripos($text,"+998")!==false and strlen($text)==13 and is_numeric($text2)==true){
send("<b>📞 Telefon raqam qabul qilindi.

📲 Havola orqali kirib ovoz bering</b>",json_encode([
'inline_keyboard'=>[[['text'=>"📮 Ovoz berish (Sayt)",'url'=>"$open"]],[['text'=>"📮 Ovoz berish (Telegram)",'web_app'=>['url'=>"$open"]]],[['text'=>"✅ Ovoz berdim",'callback_data'=>"ovoz=$text2"]]]]));
unlink("step/$cid.step");
}else{
send("<b>📞 Telefon raqamingizni kiriting:\n\n✅ Namuna: +998931234567</b>",$ort);
}
}

if(mb_stripos($data,"ovoz=")!==false){
$number=explode("=",$data)[1];
edit("
📮 <b>So'rovingiz yuborildi.
📞 Raqam:</b> +$number

⏰ <i>Administratorlarimiz 15 daqiqa ichida tekshirib chiqishadi. Agar tasdiqlansa balansingizga pul qo'shiladi!</i>",null);
send("<b>🏠 Asosiy menyudasiz:</b>",$menu);
bot('SendMessage',[
'chat_id'=>$finecoder,
'text'=>"📮 <b>Ovoz berganlik haqida ma'lumot:

📞 Raqam:</b> +$number
📲 <b>Foydalanuvchi:</b> <a href='tg://user?id=$cid'>$cid</a>

✅ <b>Quyidagilardan birini tanlang:</b>",
'parse_mode'=>html,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"💸 Pul qo'shish",'callback_data'=>"add=$cid=$number"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"cancel=$cid=$number"]],
]]),
]);
}

if(mb_stripos($data,"add=")!==false){
$chat=explode("=",$data);
$id=$chat[1];
$number=$chat[2];
edit("📮 <b>Ovoz berganlik haqida ma'lumot:

📞 Raqam:</b> +$number
📲 <b>Foydalanuvchi:</b> <a href='tg://user?id=$id'>$id</a>",null);
send("<b>✅ Ovozni qabul qildingiz va <a href='tg://user?id=$id'>$id</a> ning xisobiga $ovoz so'm qo'shdingiz!</b>",$menu);
$pul=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM users WHERE user_id = '$id'"))['balance'];
$value=$ovozlar+1;
$pa=$pul+$ovoz;
file_put_contents("admin/ovozlar.txt",$value);
mysqli_query($db,"UPDATE users SET balance = '$pa' WHERE user_id = '$id'");
bot('SendMessage',[
'chat_id'=>$id,
'text'=>"✅ <i>Ovoz berganlik so'rovingiz tasdiqlandi va balansingizga $ovoz so'm qo'shildi</i>",
'parse_mode'=>html
]);
}

if(mb_stripos($data,"cancel=")!==false){
$chat=explode("=",$data);
$id=$chat[1];
$number=$chat[2];
edit("📮 <b>Ovoz berganlik haqida ma'lumot:

📞 Raqam:</b> +$number
📲 <b>Foydalanuvchi:</b> <a href='tg://user?id=$id'>$id</a>",null);
send("<b>🚫 Bekor qilindi</b>",$menu);
bot('SendMessage',[
'chat_id'=>$id,
'text'=>"🚫 <i>Sizning so'rovingiz soxtaligi sababli bekor qilindi.</i>",
'parse_mode'=>html
]);
}

if($text=="🖇️ Taklif qilish"){
send("<b>🖇️ Sizning referal havolangiz:

<code>https://t.me/$bot?start=$cid</code>

💰 Har bir referal uchun $ref so'm
🙆‍♂️ Sizning referallaringiz: $referal ta</b>",json_encode(['inline_keyboard'=>[[['text'=>"🔄 Havolani ulashish",'url'=>"https://telegram.me/share/url/?url=https://telegram.me/$bot?start=$cid"]]]]));
}


if(mb_stripos($text,"/start ")!==false){
$id=explode(" ",$text)[1];
if($id==$cid){
send("<b>👤 O'zingizni taklif qildingiz.</b>",$menu);
}else{
if(mb_stripos($user_id,$uid)!==false){
send("<b>🚫 Siz botimizda mavjudsiz!</b>",$menu);
}else{
send("<b>🎯 OpenBudget botiga xush kelibsiz.\n\n✅ Quyidagi tugmalardan birini tanlang</b>",$menu);
bot('sendMessage',[
'chat_id'=>$id,
'text'=>"👤 <b>Siz <a href='tg://user?id=$user_id'>$name</a> ni taklif qildingiz va $ref so'm berildi.</b>",
'parse_mode'=>'html',
'reply_markup'=>$menu,
]);
$pul=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM users WHERE user_id = '$id'"))['balance'];
$ref=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM users WHERE user_id = '$id'"))['referal'];
$pa=$pul+$ref;
$ap=$ref+1;
mysqli_query($db,"UPDATE users SET balance = '$pa' WHERE user_id = '$id'");
mysqli_query($db,"UPDATE users SET referal = '$ap' WHERE user_id = '$id'");
}
}
}

if($text=="📃 To'lovlar"){
send("<b>🎯 Bizning bot orqali to'langan barcha to'lovlar isbot kanali:</b>",json_encode(['inline_keyboard'=>[[['text'=>"✅ Kanalga o'tish",'url'=>"https://t.me/+2o45RIWvayNlMzAy"]]]]));
}

if($text=="📑 Yo'riqnoma"){
send("
<b>❓Bot nima qila oladi?:</b>
— Botimiz orqali OpenBudget uchun ovoz berib pul ishlashingiz mumkin. To'plangan pullarni telefon raqamingizga paynet tariqasida yoki karta raqamingizga yechib olishingiz mumkin.

❓<b>Pulni qanday yechib olaman?:</b>
— 💵 <b>Hisobim</b> bo'limiga o'ting va «<b>💰 Pul yechish</b>» tugmasini bosing. To'lov tizimlaridan birini tanlang. Karta raqamingiz yoki telefon raqamingizni kiriting. Administratorimiz hisobingizni to'ldiradi.

🎯 <b>Bot orqali berilgan ovozlar:</b> $ovozlar ta
🙆‍♂️ <b>Bizning admin:</b> @$user",json_encode(['inline_keyboard'=>[[['text'=>"👨‍💻 Bot dasturchisi",'url'=>"https://t.me/$user"]]]]));
}

if($data=="qayt"){
del();
send("<b>🏠 Asosiy menyu:</b>",$menu);
}

if($data=="out"){
if($pul>0){
edit("<b>📑 Tizimlardan birini tanlang:</b>",json_encode(['inline_keyboard'=>[
[['text'=>"🇺🇿 Humo",'callback_data'=>"y=HUMO"],['text'=>"🔵 UzCard",'callback_data'=>"y=UzCard"]],
[['text'=>"💠 CLICK",'callback_data'=>"y=CLICK"],['text'=>"◻️ PayMe",'callback_data'=>"y=PayMe"]],
[['text'=>"📞 Paynet",'callback_data'=>"y=Paynet"],['text'=>"« Orqaga",'callback_data'=>"qayt"]],
]]));
}else{
ans("🚫 Hisobingizda mablag‘ yo'q!");
}
}

if(mb_stripos($data,"y=")!==false){
$tizim=explode("=",$data)[1];
if($tizim=="HUMO" or $tizim=="UzCard"){
$send="💳 Karta raqamingizni kiriting:";
}elseif($tizim=="CLICK" or $tizim=="PayMe"){
$send="💳 Hamyoningiz raqamini kiriting:";
}else{$send="📞 Telefon raqamingizni kiriting:";
}
send("<b>$send</b>",$ort);
step("pulyech=$tizim");
}

if(mb_stripos($step,"pulyech=")!==false){
$tz=explode("=",$step)[1];
$as=str_replace([" ","+",".","-","(",")"],[null,null,null,null,null,null],$text);
if(is_numeric($as)==true){
send("<b>❓ Qancha pulingizni yechib olasiz?\n\n📲 Minimal: $min so'm</b>",$ort);
step("pul=$tz=$text");
}else{
send("🚫<b> Noto'g'ri kiritildi!\n\n✍️ Qayta kiriting:</b>",$ort);
}
}

if(mb_stripos($step,"pul=")!==false){
$ex=explode("=",$step);
$tizim=$ex[1];
$card=$ex[2];
if($text){
if(is_numeric($text)==true){
if($text >= $min){
if($pul >= $text){
send("
✅ <b>Pul yechish so'rovingiz yuborildi
📑 To'lov tizimi: $tizim
💳 Karta: $card
✍️ Miqdor: $text so'm</b>",$menu);
bot('SendMessage',[
'chat_id'=>$finecoder,
'parse_mode'=>html,
'text'=>"
✅ <b>Foydalanuvchi pul yechmoqchi

👤 ID:</b> <a href='tg://user?id=$cid'>$cid</a>
📑 <b>To'lov tizimi:</b> $tizim
💳 <b>Karta: <code>$card</code>
✍️ Miqdor:</b> $text so'm",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"✅ Tasdiqlash va kanalga yuborish",'callback_data'=>"done=$cid=$tizim=$card=$text"]],
[['text'=>"🚫 Bekor qilish",'callback_data'=>"no=$cid"]],
]])
]);
$pul=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM users WHERE user_id = '$cid'"))['balance'];
$new=$pul-$text;
mysqli_query($db,"UPDATE users SET balance = '$new' WHERE user_id = '$cid'");
unlink("step/$cid.step");
}else{
send("🚫 <b>Mablag‘ yetarli emas!</b>\n\n<i>✍️ Qayta urinib ko'ring:</i>",null);
}
}else{
send("🚫 <b>Minimal $min so'm!</b>\n\n<i>✍️ Qayta urinib ko'ring:</i>",null);
}
}else{
send("✍️<b> Raqamlardan foydalaning:</b>",null);
}
}
}

if(mb_stripos($data,"done=")!==false){
$ex=explode("=",$data);
$id=$ex[1];
$tizim=$ex[2];
$karta=$ex[3];
$miqdor=$ex[4];
edit("✅",null);
bot('SendMessage',[
'chat_id'=>$isbot,
'parse_mode'=>html,
'text'=>"
📑 <b>Foydalanuvchi puli to'lab berildi

👤 ID:</b> <a href='tg://user?id=$id'>$id</a>
📑 <b>To'lov tizimi:</b> $tizim
💳 <b>Karta: <tg-spoiler>$karta</tg-spoiler>
✍️ Miqdor:</b> $miqdor so'm

<b>🎯 Xolat:</b> Muvaffaqiyatli",
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"👤 $id",'url'=>"tg://user?id=$id"]],
]])
]);
bot('SendMessage',[
'chat_id'=>$id,
'parse_mode'=>html,
'text'=>"
<b>✅ Sizning so'rovingiz tasdiqlandi!\n
📲 Kartangizga $miqdor so'm solindi!</b>",
]);
$new=$outing+$miqdor;
mysqli_query($db,"UPDATE users SET outing = '$new' WHERE user_id = '$cid'");
}

if(mb_stripos($data,"no=")!==false){
$ex=explode("=",$data);
$id=$ex[1];
edit("❌",null);
bot('SendMessage',[
'chat_id'=>$id,
'parse_mode'=>html,
'text'=>"❌ <b>So'rovingiz bekor qilindi, pulingiz qaytarilmadi!</b>",
]);
}

$botdel = $umidjon->my_chat_member->new_chat_member;
$botdel_id = $umidjon->my_chat_member->from->id;
$userstatus = $botdel->status;
if($botdel){
if($userstatus == "kicked"){
mysqli_query($db,"UPDATE users SET status = 'deactive' WHERE user_id = $botdel_id");
mysqli_query($db,"UPDATE users SET balance = '0' WHERE user_id = $botdel_id");
mysqli_query($db,"UPDATE users SET outing = '0' WHERE user_id = $botdel_id");
}
}


if($status=="deactive"){
mysqli_query($db,"UPDATE users SET status = 'active' WHERE user_id = $cid");
}

$bosh=json_encode([
'resize_keyboard'=>true,
'keyboard'=>[
[['text'=>"👨‍💻 Panel"]],
]]);

if($text=="👨‍💻 Panel" or $text=="/panel" or $text=="/admin"){
if($cid==$finecoder){
send("<b>👨‍💻 Panel:</b>",$panel);
unlink("step/$cid.step");
exit();
}}

if($text=="📊 Statistika" and $cid==$finecoder){
$all = mysqli_num_rows(mysqli_query($db,"SELECT * FROM users"));
$tark = mysqli_num_rows(mysqli_query($db,"SELECT * FROM users WHERE status = 'deactive'"));
$aktiv = mysqli_num_rows(mysqli_query($db,"SELECT * FROM users WHERE status = 'active'"));
send("<b>📊 Bot statistikasi:

👤 Aktiv azolar: $aktiv ta
👤 Tark etganlar: $tark ta
👤 Hammasi: $all ta</b>",$panel);
exit();
}

if($text == "📨 Xabar yuborish"){
if($cid==$finecoder){
send("<b>Yuboriladigan xabar turini tanlang;</b>",json_encode(['inline_keyboard'=>[
[['text'=>"📤 Oddiy",'callback_data'=>"send"]]]]));
exit();
}}

if($data == "send"){
del();
send("<b>Xabar matnini kiriting:</b>",$bosh);
step('sendpost');
exit();
}

if($step == "sendpost"){
unlink("step/$cid.step");
$res = mysqli_query($db,"SELECT * FROM `users`");
send("✅ <b>Xabar Yuborish Boshlandi!</b>",$bosh);
$x=0;
$y=0;
while($a = mysqli_fetch_assoc($res)){
$id = $a['user_id'];
$key=$message->reply_markup;
$keyboard=json_encode($key);
$ok=bot('copyMessage',[
'from_chat_id'=>$cid,
'chat_id'=>$id,
'message_id'=>$mid,
])->ok;
if($ok==true){
}else{
$okk=bot('copyMessage',[
'from_chat_id'=>$cid,
'chat_id'=>$id,
'message_id'=>$mid,
])->ok;
}
if($okk==true or $ok==true){
$x=$x+1;
bot('editMessageText',[
'chat_id'=>$cid,
'message_id'=>$mid,
'text'=>"✅ <b>Yuborildi:</b> $x

❌ <b>Yuborilmadi:</b> $y",
'parse_mode'=>'html',
]);
}elseif($okk==false){
mysqli_query($db,"UPDATE users SET status = 'deactive' WHERE user_id = '$id'");
$y=$y+1;
bot('editmessagetext',[
'chat_id'=>$cid,
'message_id'=>$mid + 1,
'text'=>"✅ <b>Yuborildi:</b> $x

❌ <b>Yuborilmadi:</b> $y",
'parse_mode'=>'html',
]);
}
}
bot('editmessagetext',[
'chat_id'=>$cid,
'message_id'=>$mid + 1,
'text'=>"✅ <b>Yuborildi:</b> $x

❌ <b>Yuborilmadi:</b> $y",
'parse_mode'=>'html',
]);
exit();
}

if($text=="⚙️ Sozlama"){
if($cid==$finecoder){
$keybot=json_encode(['inline_keyboard'=>[
[['text'=>"1. Minimal pul yechish",'callback_data'=>"set_min"]],
[['text'=>"2. Referal narxi",'callback_data'=>"set_ref"]],
[['text'=>"3. Ovoz berish narxi",'callback_data'=>"set_ovoz"]],
[['text'=>"4. Ovoz URL - https bilan",'callback_data'=>"set_url"]],
[['text'=>"5. To'lovlar kanali ID -100 bilan",'callback_data'=>"set_chan"]],
[['text'=>"6. Admin username @siz",'callback_data'=>"set_user"]]]]);
send("<b>✍️ Qaysi birini tahrirlaysiz?</b>",$keybot);
}}

if(mb_stripos($data,"set_")!==false){
$ex=explode("_",$data)[1];
del();
$ey=file_get_contents("admin/$ex.txt");
send("✍️ <b>Yangi qiymatni kiriting:</b>",$bosh);
send("$ey",null);
step("set_$ex");
}

if(mb_stripos($step,"set_")!==false){
$ex=explode("_",$step)[1];
file_put_contents("admin/$ex.txt",$text);
send("<b>✅ Saqlandi: $text</b>",$panel);
unlink("step/$cid.step");
}
//Manba @FineCoders
//Manbaga tegsang itaraman!