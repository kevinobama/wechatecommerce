Author: kevin gates
Profile:  https://www.linkedin.com/in/kevin-zhou-986b8986/

Laravel 5 CRUD Generator
appzcoder/crud-generator

php artisan crud:generate Ecommerces --fields="title#string#required" --route=yes --pk=id --view-path="admin" --namespace=Admin --route-group=admin

Introduction
The WeChat Official Account Admin Platform provides developers with a Message API to manage incoming messages and reply logic.

Apply for Message API
Click Apply and fill in a name, phone and email for a contact person, as well as a URL pointing to your server and a token. The token is used to generate a signature for communication between your app and WeChat.

URL Access
When the application is submitted, a GET request will be sent to the URL provided above with the 4 parameters below:

Parameter	Description
signature	signature for communication encryption
timestamp	time stamp
nonce	a random number
echostr	a random string
You should check whether the HTTP request is from WeChat by verifying the signature. If the signature is correct, you should return the echostr.

The signature will be generated in the following way using the token (that you provided), timestamp and nonce.

1. Sort the 3 values of token, timestamp and nonce alphabetically.
2. Combine the 3 parameters into one string, encrypt it using SHA-1.
3. Compare the SHA-1 digest string with the signature from the request. If they are the same, the access request is from WeChat.
Pushing Messages
When a WeChat user sends a message to an Official Account, WeChat Official Account Admin Platform will POST it to you via the URL you provided.

Text messages
 <xml>
 <ToUserName><![CDATA[toUser]]></ToUserName>
 <FromUserName><![CDATA[fromUser]]></FromUserName> 
 <CreateTime>1348831860</CreateTime>
 <MsgType><![CDATA[text]]></MsgType>
 <Content><![CDATA[this is a test]]></Content>
 <MsgId>1234567890123456</MsgId>
 </xml>
Parameter	Description
ToUserName	WeChat ID of your app
FromUserName	a unique ID for the sender
CreateTime	create time of the message
MsgType	message type ("text" for text messages)
Content	message contents
MsgId	a unique ID for the message (64 bit integer)

Image messages
 <xml>
 <ToUserName><![CDATA[toUser]]></ToUserName>
 <FromUserName><![CDATA[fromUser]]></FromUserName>
 <CreateTime>1348831860</CreateTime>
 <MsgType><![CDATA[image]]></MsgType>
 <PicUrl><![CDATA[this is a url]></PicUrl>
 <MsgId>1234567890123456</MsgId>
 </xml>
Parameter	Description
ToUserName	WeChat ID of your app
FromUserName	a unique ID for the sender
CreateTime	create time of the message
MsgType	message type ("image" for image messages)
PicUrl	URL for the image
MsgId	a unique ID for the message (64 bit integer)
Location data messages
<xml>
<ToUserName><![CDATA[toUser]]></ToUserName>
<FromUserName><![CDATA[fromUser]]></FromUserName>
<CreateTime>1351776360</CreateTime>
<MsgType><![CDATA[location]]></MsgType>
<Location_X>23.134521</Location_X>
<Location_Y>113.358803</Location_Y>
<Scale>20</Scale>
<Label><![CDATA[location]]></Label>
<MsgId>1234567890123456</MsgId>
</xml> 
Parameter	Description
ToUserName	WeChat ID of your app
FromUserName	a unique ID for the sender
CreateTime	create time of the message
MsgType	message type ("location" for location messages)
Location_X	latitude of the location
Location_Y	longitude of the location
Scale	scale of the map
Label	location description
MsgId	a unique ID for the message (64 bit integer)
Link messages
 <xml>
 <ToUserName><![CDATA[toUser]]></ToUserName>
 <FromUserName><![CDATA[fromUser]]></FromUserName>
 <CreateTime>1357290913</CreateTime>
 <MsgType><![CDATA[link]]></MsgType>
 <Title><![CDATA[WeChat Official Account Platform portal]]></Title>
 <Description><![CDATA[The URL of the portal]]></Description>
 <Url><![CDATA[url]]></Url>
 <MsgId>1234567890123456</MsgId>
 </xml> 
Parameter	Description
ToUserName	WeChat ID of your app
FromUserName	a unique ID for the sender
CreateTime	create time of the message
MsgType	message type ("link" for link messages)
Title	title of the message
Description	description of the message
Url	url which is sent to users
MsgId	a unique ID for the message (64 bit integer)
Event messages
 <xml><ToUserName><![CDATA[toUser]]></ToUserName>
 <FromUserName><![CDATA[FromUser]]></FromUserName>
 <CreateTime>123456789</CreateTime>
 <MsgType><![CDATA[event]]></MsgType>
 <Event><![CDATA[EVENT]]></Event>
 <EventKey><![CDATA[EVENTKEY]]></EventKey>
 </xml>
Parameter	Description
ToUserName	WeChat ID of your app
FromUserName	a unique ID for the sender
CreateTime	create time of the message
MsgType	message type ("event" for event messages)
Event	event type, currently we have 3 types: subscribe, unsubscribe, CLICK(coming soon)
EventKey	for future usage
Messages Replies
You can reply to incoming messages. Now the platform supports different kinds of messages, including text, image, voice, video and music. You can also do the operation 'add to my favorites'.

If you fail to perform your response within 5 seconds, we will close the connection.

The data structure for a reply message:

Text messages
 <xml>
 <ToUserName><![CDATA[toUser]]></ToUserName>
 <FromUserName><![CDATA[fromUser]]></FromUserName>
 <CreateTime>12345678</CreateTime>
 <MsgType><![CDATA[text]]></MsgType>
 <Content><![CDATA[content]]></Content>
 <FuncFlag>0</FuncFlag>
 </xml>
Parameter	Description
ToUserName	a unique ID for the receiver, you can get it from the request
FromUserName	WeChat ID of your app
CreateTime	create time of the message, the type is integer
MsgType	message type ("text" for text messages)
Content	reply message contents
FuncFlag	add a star for the message if the bit (0x0001) is set

Music message
<xml>
  <ToUserName><![CDATA[toUser]]></ToUserName>
  <FromUserName><![CDATA[fromUser]]></FromUserName>
  <CreateTime>12345678</CreateTime>
  <MsgType><![CDATA[news]]></MsgType>
  <ArticleCount>2</ArticleCount>
  <Articles>
    <item>
      <Title><![CDATA[title1]]></Title> 
      <Description><![CDATA[description1]]></Description>
      <PicUrl><![CDATA[picurl]]></PicUrl>
      <Url><![CDATA[url]]></Url>
    </item>
    <item>
      <Title><![CDATA[title]]></Title>
      <Description><![CDATA[description]]></Description>
      <PicUrl><![CDATA[picurl]]></PicUrl>
      <Url><![CDATA[url]]></Url>
    </item>
  </Articles>
  <FuncFlag>1</FuncFlag>
</xml> 
Parameter	Description
ToUserName	a unique ID for the receiver, you can get it from the request
FromUserName	WeChat ID of your app
CreateTime	create time of the message, the type is integer
MsgType	message type("music" for music messages)
MusicUrl	URL for the music
HQMusicUrl	URL for high quality, WeChat will access it when using WiFi
ThumbMediaId	OPTIONAL. You will get this ID after you upload the thumb (80*80) by using the API
FuncFlag	add a star for the message if the bit (0x0001) is set
Rich media messages
 <xml>
 <ToUserName><![CDATA[toUser]]></ToUserName>
 <FromUserName><![CDATA[fromUser]]></FromUserName>
 <CreateTime>12345678</CreateTime>
 <MsgType><![CDATA[news]]></MsgType>
 <ArticleCount>2</ArticleCount>
 <Articles>
 <item>
 <Title><![CDATA[title1]]></Title> 
 <Description><![CDATA[description1]]></Description>
 <PicUrl><![CDATA[picurl]]></PicUrl>
 <Url><![CDATA[url]]></Url>
 </item>
 <item>
 <Title><![CDATA[title]]></Title>
 <Description><![CDATA[description]]></Description>
 <PicUrl><![CDATA[picurl]]></PicUrl>
 <Url><![CDATA[url]]></Url>
 </item>
 </Articles>
 <FuncFlag>1</FuncFlag>
 </xml> 
Parameter	Description
ToUserName	a unique ID for the receiver, you can get it from the request
FromUserName	WeChat ID of your app
CreateTime	create time of the message, the type is integer
MsgType	message type ("news" for rich media messages)
ArticleCount	quantity of rich media messages (no larger than 10)
Articles	contents of rich media messages. The first item will be displayed in large image by default.
Title	title of the rich media message
Description	description of the rich media message
PicUrl	URL of images in the rich media message. Domain name of this URL should be the same as the one of URL provided in basic info. Recommended image size: 640*320 (large image); 80*80 (small image)
Url	redirection link of the rich media message
Notes
1. One user's unique ID is different for different Official Accounts.

2. Recommend you use port 80 for your app server.


