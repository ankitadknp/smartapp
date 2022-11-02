-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2022 at 01:57 PM
-- Server version: 8.0.29
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_citizen_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `blog_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `blog_title_ab` varchar(100) DEFAULT NULL,
  `blog_title_he` varchar(100) DEFAULT NULL,
  `short_content` varchar(255) DEFAULT NULL,
  `short_content_ab` varchar(255) DEFAULT NULL,
  `short_content_he` varchar(255) DEFAULT NULL,
  `blog_content` longtext NOT NULL,
  `blog_content_ab` longtext,
  `blog_content_he` longtext,
  `status` tinyint(1) NOT NULL COMMENT '1=active,2=inactive',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `category_id`, `blog_title`, `blog_title_ab`, `blog_title_he`, `short_content`, `short_content_ab`, `short_content_he`, `blog_content`, `blog_content_ab`, `blog_content_he`, `status`, `created_at`, `updated_at`) VALUES
(11, 9, '4 Markets In Sanur Bali To Go On A Shopping Spree In Bali', '4 أسواق في سانور بالي للذهاب في أي رحلة تسوق في بالي', '4 שווקים בסנור באלי לצאת למסע קניות בבאלי', 'Sanur Night Market is also known as Pasar Sindhu Night Market or Pasar Malam Sindu.', '4 أسواق في سانور بالي للذهاب في أي رحلة تسوق في بالي', '4 שווקים בסנור באלי לצאת למסע קניות בבאלי', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666075728png-transparent-multicolored-balloons-illustration-balloon-balloon-free-balloons-easter-egg-desktop-wallpaper-party-thumbnail.png\" style=\"border-style:solid; border-width:5px; height:150px; margin:15px 150px; width:150px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sanur Night Market is also known as Pasar Sindhu Night Market or Pasar Malam Sindu. Located at the northern end of Sanur&rsquo;s Jalan Danau, Tamblingan Road this market is one of Bali&#39;s longest-running and most established night markets. Prepared to have your senses assaulted with the bold flavours and scents of the ubiquitous street food stall serving up classic Balinese food.</p>', '<pre>\r\nيُعرف سوق سانور الليلي أيضًا باسم سوق باسار سيندو الليلي أو باسار مالام سيندو. يقع هذا السوق في الطرف الشمالي من شارع جالان داناو في سانور ، وهو أحد الأسواق الليلية الأطول والأكثر رسوخًا في بالي. على استعداد لتهجم على حواسك مع النكهات والروائح الجريئة من كشك طعام الشارع المنتشر في كل مكان والذي يقدم الطعام البالي الكلاسيكي.</pre>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666075489download.jpg\" style=\"border-style:solid; border-width:5px; height:157px; margin:15px 150px; width:321px\" /></p>', '<pre>\r\nשוק הלילה Sanur ידוע גם כשוק הלילה Pasar Sindhu או Pasar Malam Sindu. ממוקם בקצה הצפוני של Jalan Danau של Sanur, Tamblingan Road שוק זה הוא אחד משווקי הלילה הוותיקים והמבוססים ביותר בבאלי. מוכנים לתקוף את החושים שלכם עם הטעמים והריחות הנועזים של דוכן אוכל הרחוב שנמצא בכל מקום ומגיש אוכל באלינזי קלאסי.</pre>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666075489download.jpg\" style=\"border-style:solid; border-width:5px; height:157px; margin:15px 150px; width:321px\" /></p>', 1, '2022-10-18 05:26:07', '2022-10-18 11:44:26'),
(13, 9, 'More visual ways to shop', 'المزيد من الطرق المرئية للتسوق', 'דרכים חזותיות יותר לחנות', 'More visual ways to shop', 'דרכים חזותיות יותר לחנות', 'المزيد من الطرق المرئية للتسوق', '<p><img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666087775Blog_Post_Hero_Image_gImbPzT.max-1000x1000.png\" style=\"border-style:solid; border-width:5px; height:282px; margin:12px 250px; width:500px\" />Today we&rsquo;re introducing a new way to unlock the shopping experience on Google. In the U.S., when you search the word&nbsp;<em>&ldquo;</em>shop&rdquo; followed by whatever item you&#39;re looking for, you&rsquo;ll access a visual feed of products, research tools and nearby inventory related to that product. We&rsquo;re also expanding the&nbsp;<a href=\"https://blog.google/products/shopping/search-on-2021-shopping/\">shoppable search experience</a>&nbsp;beyond apparel to all categories &mdash; from electronics to beauty &mdash; and more regions on mobile (and coming soon to desktop).</p>\r\n\r\n<p>&nbsp;</p>', '<pre>\r\nنقدم اليوم طريقة جديدة لإطلاق العنان لتجربة التسوق على Google. في الولايات المتحدة ، عندما تبحث عن كلمة &quot;متجر&quot; متبوعة بأي عنصر تبحث عنه ، ستتمكن من الوصول إلى موجز مرئي للمنتجات وأدوات البحث والمخزون القريب المرتبط بهذا المنتج. نعمل أيضًا على توسيع نطاق تجربة البحث القابلة للتسوّق بما يتجاوز الملابس لتشمل جميع الفئات - من الإلكترونيات إلى مستحضرات التجميل - والمزيد من المناطق على الجوّال (وقريبًا على أجهزة الكمبيوتر المكتبية).</pre>', '<pre>\r\nהיום אנחנו מציגים דרך חדשה לפתוח את חווית הקנייה ב-Google. בארה&quot;ב, כשאתה מחפש את המילה &quot;חנות&quot; ואחריה כל פריט שאתה מחפש, תקבל גישה לעדכון חזותי של מוצרים, כלי מחקר ומלאי קרוב הקשור למוצר זה. אנחנו גם מרחיבים את חוויית החיפוש הניתנת לקניה מעבר ללבוש לכל הקטגוריות - מאלקטרוניקה ועד יופי - ולאזורים נוספים בנייד (ובקרוב יגיע למחשב שולחני).</pre>', 1, '2022-10-18 09:29:08', '2022-10-18 11:44:05'),
(14, 14, 'Cafe hopping in Noida', 'مقهى التنقل في نويدا', 'בית קפה שופינג בנוידה', 'Noida might be a paradise for home buyers but it still needs to go a long way for becoming a foodie’s haven.', 'لقليلة في نويدا تستحق الزيارة حقًا. سوق القطاع -18 في نويدا والذي يصادف أن يكون مركزًا', 'ך לגן עדן של אוכלים. למרות מיעוט האפשרויות, בתי הקפה המעטים האלה בנוידה', '<p><a href=\"https://timesofindia.indiatimes.com/travel/Noida/travel-guide/cs49520386.cms\">Noida</a>&nbsp;might be a paradise for home buyers but it still needs to go a long way for becoming a foodie&rsquo;s haven. Despite the paucity of choices, these handful cafes in Noida are really worth visiting. The sector-18 market of Noida which happens to be a commercial hub, has a few leading joints, which are identifiable favourites. Take&nbsp;<a href=\"https://timesofindia.indiatimes.com/travel/Mumbai/travel-guide/cs23958811.cms\">Mumbai</a>&nbsp;Matinee with its alluring typical Bollywood setting or the Paddy&rsquo;s Cafe that is frequented by office-goers looking for a quick time-out with their buddies. Notable in its contemporary charm, the Burbee&rsquo;s Cafe wins the heart of youth whereas Theos and Kaffiiaa offer respite from cheap Italian versions of pizzas and pastas <img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666088506download (1)1.jpg\" style=\"border-style:solid; border-width:5px; height:168px; margin-left:250px; margin-right:250px; width:300px\" />.</p>', '<pre>\r\nقد تكون نويدا جنة لمشتري المنازل ولكنها لا تزال بحاجة إلى قطع شوط طويل لتصبح ملاذًا لعشاق الطعام. على الرغم من ندرة الخيارات ، فإن هذه المقاهي القليلة في نويدا تستحق الزيارة حقًا. سوق القطاع -18 في نويدا والذي يصادف أن يكون مركزًا تجاريًا ، يحتوي على عدد قليل من المفاصل الرائدة ، والتي يمكن تحديدها المفضلة. خذ مومباي ماتيني مع أجواء بوليوود النموذجية الجذابة أو مقهى بادي الذي يتردد عليه رواد المكتب الذين يبحثون عن قضاء وقت سريع مع رفاقهم. يجذب مقهى Burbee ، الذي يتميز بسحره المعاصر ، قلب الشباب بينما يقدم Theos و Kaffiiaa فترة راحة من الإصدارات الإيطالية الرخيصة من البيتزا والباستا.<img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666088506download (1)1.jpg\" style=\"border-style:solid; border-width:5px; height:168px; margin-left:250px; margin-right:250px; width:300px\" /></pre>', '<pre>\r\nנוידה עשויה להיות גן עדן לרוכשי בתים, אבל היא עדיין צריכה לעבור דרך ארוכה כדי להפוך לגן עדן של אוכלים. למרות מיעוט האפשרויות, בתי הקפה המעטים האלה בנוידה באמת שווים ביקור. לשוק הסקטור 18 של נוידה, שהוא במקרה מרכז מסחרי, יש כמה ג&#39;וינטים מובילים, שהם מועדפים שניתן לזהות. קחו את&nbsp;Mumbai&nbsp;Matinee עם התפאורה הבוליוודית המושכת שלו או את פאדי&#39;ס קפה שפוקדים אותו אנשי משרד שמחפשים פסק זמן מהיר עם חבריהם. בולט בקסמו העכשווי, בית הקפה Burbee&#39;s מנצח את לב הנעורים ואילו תיאוס וקאפיה מציעים הפוגה מגרסאות איטלקיות זולות של פיצות ופסטות.<img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666088506download (1)1.jpg\" style=\"border-style:solid; border-width:5px; height:168px; margin-left:250px; margin-right:250px; width:300px\" /></pre>', 1, '2022-10-18 10:22:28', '2022-10-18 11:39:15'),
(17, 14, 'Coffee', 'قهوة', 'קפה', 'Coffee is a drink prepared from roasted coffee beans. Darkly colored, bitter, and slightly acidic, coffee has a stimulating effect on humans, primarily due to its caffeine content. It is the most popular hot drink in the world.', 'القهوة مشروب معد من حبوب البن المحمصة. القهوة ذات الألوان الداكنة والمرة والحمضية قليلاً لها تأثير محفز على البشر ، ويرجع ذلك أساسًا إلى محتواها من الكافيين. إنه المشروب الساخن الأكثر شعبية في العالم.', 'קפה הוא משקה המוכן מפולי קפה קלויים. לקפה בעל צבע כהה, מר ומעט חומצי, יש השפעה מעוררת על בני אדם, בעיקר בשל תכולת הקפאין שלו. זהו המשקה החם הפופולרי ביותר בעולם.', '<p><strong>Coffee</strong>&nbsp;is a drink prepared from roasted&nbsp;<a href=\"https://en.wikipedia.org/wiki/Coffee_bean\">coffee beans</a>. Darkly colored, bitter, and slightly&nbsp;<a href=\"https://en.wikipedia.org/wiki/Acid\">acidic</a>, coffee has a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Stimulant\">stimulating</a>&nbsp;effect on humans, primarily due to its&nbsp;<a href=\"https://en.wikipedia.org/wiki/Caffeine\">caffeine</a>&nbsp;content. It is the most popular hot drink in the world.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Seeds of the&nbsp;<em><a href=\"https://en.wikipedia.org/wiki/Coffea\">Coffea</a></em>&nbsp;plant&#39;s fruits are separated to produce unroasted green coffee beans. The beans are&nbsp;<a href=\"https://en.wikipedia.org/wiki/Coffee_roasting\">roasted</a>&nbsp;and then ground into fine particles that are typically steeped in hot water before being filtered out, producing a cup of coffee. It is usually served hot, although chilled or&nbsp;<a href=\"https://en.wikipedia.org/wiki/Iced_coffee\">iced coffee</a>&nbsp;is common. Coffee can be prepared and presented in a variety of ways (e.g.,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Espresso\">espresso</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/French_press\">French press</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Caff%C3%A8_latte\">caff&egrave; latte</a>, or already-brewed&nbsp;<a href=\"https://en.wikipedia.org/wiki/Canned_coffee\">canned coffee</a>).&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sugar\">Sugar</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sugar_substitute\">sugar substitutes</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Milk\">milk</a>, and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Cream\">cream</a>&nbsp;are often used to lessen the bitter taste or enhance the flavor.<img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666095534download (6).jpg\" style=\"border-style:solid; border-width:5px; height:194px; margin:5px 250px; width:259px\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666095705download (7).jpg\" style=\"border-style:solid; border-width:5px; height:183px; margin-left:250px; margin-right:250px; width:275px\" /></p>', '<pre>\r\nالقهوة مشروب معد من حبوب البن المحمصة. القهوة ذات الألوان الداكنة والمرة والحمضية قليلاً لها تأثير محفز على البشر ، ويرجع ذلك أساسًا إلى محتواها من الكافيين. إنه المشروب الساخن الأكثر شعبية في العالم. [3] يتم فصل بذور ثمار نبات القهوة لإنتاج حبوب البن الخضراء غير المحمصة. يتم تحميص الحبوب ثم طحنها إلى جزيئات دقيقة تُنقع عادةً في الماء الساخن قبل تصفيتها لإنتاج فنجان من القهوة. عادة ما يتم تقديمه ساخنًا ، على الرغم من أن القهوة المثلجة أو المثلجة شائعة. يمكن تحضير القهوة وتقديمها بعدة طرق (على سبيل المثال ، إسبرسو أو فرنش برس أو كافيه لاتيه أو قهوة معلبة بالفعل). غالبًا ما يستخدم السكر وبدائل السكر والحليب والقشدة لتقليل الطعم المر أو تحسين النكهة.<img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666095705download (7).jpg\" style=\"border-style:solid; border-width:5px; height:183px; margin-left:250px; margin-right:250px; width:275px\" /><img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666095584download (6).jpg\" style=\"border-style:solid; border-width:5px; height:194px; margin:5px 250px; width:259px\" /></pre>', '<pre>\r\nקפה&nbsp;הוא משקה המוכן מפולי&nbsp;קפה קלויים. לקפה בעל צבע כהה, מר ומעט חומצי, יש השפעה מעוררת על בני אדם, בעיקר בשל תכולת הקפאין שלו. זהו המשקה החם הפופולרי ביותר בעולם.[3] זרעים של פירות צמח הקפה מופרדים כדי לייצר פולי קפה ירוקים לא קלויים. הפולים&nbsp;נקלים&nbsp;ולאחר מכן טוחנים לחלקיקים עדינים שבדרך כלל ספוגים במים חמים לפני שהם מסוננים, ומייצרים כוס קפה. הוא מוגש בדרך כלל חם, אם כי קפה צונן או קר&nbsp;נפוץ. ניתן להכין ולהגיש קפה במגוון דרכים (למשל, אספרסו, עיתונות צרפתית, קפה לאטה או קפה שימורים שכבר מבושל). סוכר, תחליפי סוכר, חלב ושמנת משמשים לעתים קרובות כדי להפחית את הטעם המר או לשפר את הטעם.<img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666095584download (6).jpg\" style=\"border-style:solid; border-width:5px; height:194px; margin:5px 250px; width:259px\" /><img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666095705download (7).jpg\" style=\"border-style:solid; border-width:5px; height:183px; margin-left:250px; margin-right:250px; width:275px\" /></pre>', 1, '2022-10-18 12:20:34', '2022-10-18 12:22:33'),
(18, 14, '9 Unique Benefits of Coffee', '9 فوائد فريدة للقهوة', '9 יתרונות ייחודיים של קפה', 'Coffee is a beloved beverage known for its ability to fine-tune your focus and boost your energy levels.', 'القهوة مشروب محبوب معروف بقدرته على ضبط تركيزك وزيادة مستويات الطاقة لديك.', 'קפה הוא משקה אהוב הידוע ביכולתו לכוונן את המיקוד שלך ולהגביר את רמות האנרגיה שלך.', '<p>Coffee is a beloved beverage known for its ability to fine-tune your focus and boost your energy levels.</p>\r\n\r\n<p>In fact, many people depend on their daily cup of joy&nbsp;right when they wake up to get their day started on the right foot.</p>\r\n\r\n<p>In addition to its energizing effects, coffee has been linked to a long list of potential health benefits, giving you all the more reason to get brewing.</p>\r\n\r\n<p>This article takes an in-depth look at 9 of the top evidence-based benefits of coffee.</p>\r\n\r\n<p>Share on Pinterest</p>\r\n\r\n<p><img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666096954download (5).jpg\" style=\"border-style:solid; border-width:5px; height:163px; margin-bottom:5px; margin-top:5px; width:310px\" /><img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666097062Latte_and_dark_coffee.jpg\" style=\"border-style:solid; border-width:5px; height:163px; width:310px\" /></p>\r\n\r\n<p>&nbsp;</p>', '<pre>\r\nالقهوة مشروب محبوب معروف بقدرته على ضبط تركيزك وزيادة مستويات الطاقة لديك.\r\n\r\nفي الواقع ، يعتمد الكثير من الناس على فنجان الفرح اليومي عندما يستيقظون ليبدأوا يومهم بالقدم اليمنى.\r\n\r\nبالإضافة إلى تأثيرات القهوة المنشطة ، فقد تم ربط القهوة بقائمة طويلة من الفوائد الصحية المحتملة ، مما يمنحك سببًا إضافيًا للتخمير.\r\n\r\nتلقي هذه المقالة نظرة متعمقة على 9 من أهم فوائد القهوة القائمة على الأدلة.\r\n\r\nانشر على موقع Pinterest</pre>', '<pre>\r\nקפה הוא משקה אהוב הידוע ביכולתו לכוונן את המיקוד שלך ולהגביר את רמות האנרגיה שלך.\r\n\r\nלמעשה, אנשים רבים תלויים בכוס השמחה היומית שלהם ממש כשהם מתעוררים כדי להתחיל את היום ברגל ימין.\r\n\r\nבנוסף להשפעותיו הממריצות, קפה נקשר לרשימה ארוכה של יתרונות בריאותיים פוטנציאליים, מה שנותן לך עוד יותר סיבה להתבשל.\r\n\r\nמאמר זה בוחן לעומק 9 מהיתרונות העיקריים המבוססים על ראיות של קפה.\r\n\r\nשתפו בפינטרסט</pre>', 1, '2022-10-18 12:44:52', '2022-10-18 12:44:52'),
(19, 10, 'The 10 Best Breakfast Restaurants in New Orleans', 'أفضل 10 مطاعم للإفطار في نيو أورلينز', '10 מסעדות ארוחת הבוקר הטובות ביותר בניו אורלינס', 'You may know New Orleans for its wild nightlife, but have you heard about The Big Easy\'s signature breakfast? Whether you want to cure your hangover (or add to it) there are plenty of options available in New Orleans.', 'قد تعرف نيو أورلينز بحياتها الليلية الصاخبة ، لكن هل سمعت عن إفطار The Big Easy المميز؟ سواء كنت ترغب في علاج مخلفاتك (أو الإضافة إليها) ، فهناك الكثير من الخيارات المتاحة في نيو أورلينز.', 'אתם אולי מכירים את ניו אורלינס בזכות חיי הלילה הפרועים שלה, אבל האם שמעתם על ארוחת הבוקר המיוחדת של The Big Easy? בין אם אתה רוצה לרפא את ההנגאובר שלך (או להוסיף לו) יש הרבה אפשרויות זמינות בניו אורלינס.', '<p>You may know New Orleans for its wild nightlife, but have you heard about The Big Easy&#39;s signature breakfast? Whether you want to cure your hangover (or add to it) there are plenty of options available in New Orleans. From classic to historical to unique, there is a breakfast option for all. We have hole-in-the-walls and famous, widely-known breakfast venues. You want it, we got it! a<br />\r\n<br />\r\nAt the Degas House bed and breakfast, we proudly give people an authentic New Orleans cultural experience. If you&#39;re looking for a vintage, beautiful place to stay, <a href=\"https://www.degashouse.com/accommodations.html\" target=\"_self\">we cannot recommend our rooms enough.&nbsp;</a>&nbsp;That being said, and wherever you say, we want to make sure you treat yourself from the moment you get up. Nothing is better than starting the day off with a delicious meal and a steaming cup of coffee. It&#39;s time for you to taste the best that New Orleans has to offer.<br />\r\n<img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666352106download (1)12.jpg\" style=\"border-style:solid; border-width:5px; height:159px; margin-left:250px; margin-right:250px; width:318px\" /></p>', '<pre>\r\nقد تعرف نيو أورلينز بحياتها الليلية الصاخبة ، لكن هل سمعت عن إفطار The Big Easy المميز؟ سواء كنت ترغب في علاج صداع الكحول (أو الإضافة إليه) ، فهناك الكثير من الخيارات المتاحة في نيو أورلينز. من الكلاسيكي إلى التاريخي إلى الفريد ، هناك خيار إفطار للجميع. لدينا حفرة في الجدران وأماكن إفطار شهيرة ومعروفة على نطاق واسع. كنت ترغب في ذلك، وحصلنا على ذلك!\r\n\r\nفي مبيت وإفطار Degas House ، نقدم بكل فخر للناس تجربة ثقافية أصيلة في نيو أورلينز. إذا كنت تبحث عن مكان عتيق وجميل للإقامة ، فلا يمكننا التوصية بغرفنا بدرجة كافية. بعد قولي هذا ، وأينما قلت ، نريد أن نتأكد من أنك تعامل نفسك منذ اللحظة التي تستيقظ فيها. لا شيء أفضل من بدء اليوم بوجبة لذيذة وفنجان من القهوة على البخار. حان الوقت لتذوق أفضل ما تقدمه نيو أورلينز.<img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666352106download (1)12.jpg\" style=\"border-style:solid; border-width:5px; height:159px; margin-left:250px; margin-right:250px; width:318px\" /></pre>', '<pre>\r\nאתם אולי מכירים את ניו אורלינס בזכות חיי הלילה הפרועים שלה, אבל האם שמעתם על ארוחת הבוקר המיוחדת של The Big Easy? בין אם אתה רוצה לרפא את ההנגאובר שלך (או להוסיף לו) יש הרבה אפשרויות זמינות בניו אורלינס. מקלאסי להיסטורי ועד ייחודי, ישנה אפשרות לארוחת בוקר לכולם. יש לנו חור בקירות ומקומות ארוחות בוקר מפורסמים ומוכרים. אתה רוצה את זה, הבנו את זה!\r\n\r\nב-Degas House B&amp;B, אנו בגאווה נותנים לאנשים חוויה תרבותית אותנטית בניו אורלינס. אם אתם מחפשים מקום וינטג&#39; ויפה לשהות בו, אנחנו לא יכולים להמליץ ​​מספיק על החדרים שלנו. עם זאת נאמר, ובכל מקום שתאמר, אנחנו רוצים לוודא שאתה מטפל בעצמך מהרגע שאתה קם. אין דבר טוב יותר מאשר להתחיל את היום עם ארוחה טעימה וכוס קפה מהביל. הגיע הזמן שתטעמו מהטוב ביותר שיש לניו אורלינס להציע.<img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666352106download (1)12.jpg\" style=\"border-style:solid; border-width:5px; height:159px; margin-left:250px; margin-right:250px; width:318px\" /></pre>', 1, '2022-10-21 11:35:56', '2022-10-21 11:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment`
--

CREATE TABLE `blog_comment` (
  `blog_comment_id` int NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `blog_id` int DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog_comment`
--

INSERT INTO `blog_comment` (`blog_comment_id`, `user_id`, `blog_id`, `comment`, `created_at`, `updated_at`) VALUES
(16, 60, 18, 'Comment @18/10/2022', '2022-10-18 12:49:19', '2022-10-20 06:43:27'),
(17, 75, 18, 'Gyh', '2022-10-18 13:40:08', '2022-10-18 13:40:08'),
(18, 75, 14, 'יופי', '2022-10-18 13:41:10', '2022-10-18 13:41:10'),
(19, 92, 18, 'Comment @19/10/22', '2022-10-19 04:39:30', '2022-10-19 04:39:30'),
(20, 92, 17, 'Excellent looks and great features are there which give you', '2022-10-19 05:19:17', '2022-10-19 05:19:17'),
(21, 92, 11, 'Excellent Looks and Excellent Features are added to the product which is helping us to find great deal', '2022-10-19 05:20:23', '2022-10-19 05:20:23'),
(22, 96, 18, 'Test', '2022-10-19 10:27:16', '2022-10-19 10:27:16'),
(23, 119, 18, 'Great Looks and Excellent Features are added to the product which is helping me with the same time as I am not able to understand the flow of application and if there is any', '2022-10-20 06:57:27', '2022-10-20 06:57:27'),
(24, 131, 19, 'Comment@21/10/22', '2022-10-21 11:36:34', '2022-10-21 11:36:34'),
(25, 141, 11, '4 Markets in sanur Bali To go on A shopping Spree In Bali Market or Pasar Malab Sindhu', '2022-11-02 13:00:48', '2022-11-02 13:00:48'),
(26, 141, 19, 'At the Degas House bed and breakfast l, we proudly give people an authentic New Orleans  that being said and wherever you say l, we want to make sure you tratt yourself from the', '2022-11-02 13:03:07', '2022-11-02 13:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comment_like`
--

CREATE TABLE `blog_comment_like` (
  `id` int NOT NULL,
  `blog_id` int DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `blog_comment_id` int DEFAULT NULL,
  `is_like` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog_comment_like`
--

INSERT INTO `blog_comment_like` (`id`, `blog_id`, `user_id`, `blog_comment_id`, `is_like`, `created_at`, `updated_at`) VALUES
(10, 1, 59, 1, 1, '2022-10-18 11:02:17', '2022-10-18 11:02:17'),
(11, 18, 75, 17, 1, '2022-10-18 13:40:37', '2022-10-18 13:40:46'),
(12, 18, 92, 17, 1, '2022-10-19 04:39:38', '2022-10-19 04:39:39'),
(13, 18, 92, 19, 1, '2022-10-19 04:39:40', '2022-10-19 04:39:40'),
(14, 18, 92, 16, 1, '2022-10-19 04:39:41', '2022-10-19 04:39:41'),
(15, 18, 75, 22, 1, '2022-10-20 15:10:28', '2022-10-20 15:10:28'),
(16, 19, 141, 24, 1, '2022-11-02 12:46:53', '2022-11-02 12:46:53'),
(17, 19, 141, 26, 1, '2022-11-02 13:07:52', '2022-11-02 13:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `blog_like`
--

CREATE TABLE `blog_like` (
  `id` int NOT NULL,
  `blog_id` int DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `is_like` tinyint(1) DEFAULT '0' COMMENT '1=like,0=unlike',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog_like`
--

INSERT INTO `blog_like` (`id`, `blog_id`, `user_id`, `is_like`, `created_at`, `updated_at`) VALUES
(1, 1, 59, 1, '2022-10-12 12:03:22', '2022-10-12 12:03:37'),
(2, 6, 60, 1, '2022-10-13 09:08:43', '2022-10-13 10:01:57'),
(3, 3, 60, 1, '2022-10-13 09:11:33', '2022-10-14 10:46:26'),
(4, 1, 60, 1, '2022-10-13 09:11:36', '2022-10-13 09:22:49'),
(5, 2, 85, 1, '2022-10-14 10:08:55', '2022-10-14 13:02:02'),
(6, 3, 85, 1, '2022-10-14 10:48:40', '2022-10-14 10:57:31'),
(7, 1, 85, 0, '2022-10-14 12:43:23', '2022-10-14 12:43:41'),
(8, 2, 89, 1, '2022-10-17 06:49:19', '2022-10-17 06:49:23'),
(9, 2, 90, 1, '2022-10-17 07:08:46', '2022-10-17 07:08:52'),
(10, 6, 90, 1, '2022-10-17 07:36:01', '2022-10-17 08:25:33'),
(11, 8, 87, 1, '2022-10-17 11:27:38', '2022-10-17 11:27:42'),
(12, 8, 91, 1, '2022-10-17 12:29:41', '2022-10-17 12:38:59'),
(13, 2, 91, 1, '2022-10-17 13:23:23', '2022-10-17 13:23:23'),
(14, 9, 91, 1, '2022-10-17 13:41:48', '2022-10-17 14:02:06'),
(15, 11, 91, 1, '2022-10-18 06:28:13', '2022-10-18 06:28:14'),
(17, 14, 91, 1, '2022-10-18 11:43:00', '2022-10-18 11:43:00'),
(18, 18, 91, 1, '2022-10-18 12:48:58', '2022-10-18 12:48:58'),
(19, 13, 91, 1, '2022-10-18 13:06:18', '2022-10-18 13:06:18'),
(20, 18, 75, 1, '2022-10-18 13:40:50', '2022-10-18 15:51:28'),
(21, 18, 92, 0, '2022-10-19 04:39:44', '2022-10-19 04:40:09'),
(22, 18, 125, 1, '2022-10-21 06:15:44', '2022-10-21 06:15:44'),
(23, 19, 131, 1, '2022-10-21 11:37:58', '2022-10-21 11:37:58'),
(24, 19, 141, 0, '2022-11-02 12:46:39', '2022-11-02 13:07:29'),
(25, 18, 141, 1, '2022-11-02 12:55:43', '2022-11-02 12:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `blog_report`
--

CREATE TABLE `blog_report` (
  `blog_report_id` int NOT NULL,
  `blog_id` int DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `report` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog_report`
--

INSERT INTO `blog_report` (`blog_report_id`, `blog_id`, `user_id`, `report`, `created_at`, `updated_at`) VALUES
(10, 1, 59, 'Test', '2022-10-18 11:03:35', '2022-10-18 11:03:35'),
(11, 1, 59, 'Test', '2022-10-19 09:30:04', '2022-10-19 09:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `category_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `category_name_ab` varchar(100) NOT NULL,
  `category_name_he` varchar(100) NOT NULL,
  `type` enum('Blog','Coupon') NOT NULL DEFAULT 'Blog',
  `status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1=active,2=inactive',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_name_ab`, `category_name_he`, `type`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Shopping', 'التسوق', 'קניות', 'Blog', 1, '2022-10-17 08:37:34', '2022-10-17 08:37:34'),
(10, 'Restaurant', 'مطعم', 'מִסעָדָה', 'Blog', 1, '2022-10-17 08:38:24', '2022-10-17 13:23:54'),
(11, 'Cafes', 'مقاهي', 'בתי קפה', 'Coupon', 1, '2022-10-18 09:11:19', '2022-10-18 09:11:19'),
(12, 'Restaurant', 'مطعم', 'מִסעָדָה', 'Coupon', 1, '2022-10-18 09:12:08', '2022-10-18 09:12:08'),
(13, 'Shopping', 'التسوق', 'קניות', 'Coupon', 1, '2022-10-18 09:13:04', '2022-10-18 09:13:04'),
(14, 'Cafes', 'مقاهي', 'בתי קפה', 'Blog', 1, '2022-10-18 09:14:27', '2022-10-19 12:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `client_my_coupon`
--

CREATE TABLE `client_my_coupon` (
  `client_my_coupon_id` int NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `coupon_id` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client_my_coupon`
--

INSERT INTO `client_my_coupon` (`client_my_coupon_id`, `user_id`, `coupon_id`, `created_at`, `updated_at`) VALUES
(9, 60, 24, '2022-10-17 08:26:50', '2022-10-17 08:26:50'),
(10, 87, 24, '2022-10-17 11:28:14', '2022-10-17 11:28:14'),
(11, 91, 24, '2022-10-17 11:47:48', '2022-10-17 11:47:48'),
(12, 91, 23, '2022-10-17 11:49:25', '2022-10-17 11:49:25'),
(14, 91, 22, '2022-10-17 11:54:18', '2022-10-17 11:54:18'),
(15, 91, 3, '2022-10-17 11:58:32', '2022-10-17 11:58:32'),
(16, 91, 9, '2022-10-17 12:49:25', '2022-10-17 12:49:25'),
(17, 91, 7, '2022-10-18 13:03:41', '2022-10-18 13:03:41'),
(18, 75, 24, '2022-10-18 13:39:02', '2022-10-18 13:39:02'),
(19, 92, 24, '2022-10-19 06:19:12', '2022-10-19 06:19:12'),
(20, 75, 10, '2022-10-19 10:18:55', '2022-10-19 10:18:55'),
(21, 119, 24, '2022-10-20 07:03:59', '2022-10-20 07:03:59'),
(22, 119, 23, '2022-10-20 07:04:16', '2022-10-20 07:04:16'),
(23, 119, 10, '2022-10-20 07:04:42', '2022-10-20 07:04:42'),
(24, 128, 26, '2022-10-21 06:48:25', '2022-10-21 06:48:25'),
(25, 60, 27, '2022-10-21 08:50:11', '2022-10-21 08:50:11'),
(26, 75, 31, '2022-10-24 10:03:08', '2022-10-24 10:03:08'),
(27, 75, 5, '2022-10-24 10:03:38', '2022-10-24 10:03:38'),
(28, 75, 27, '2022-10-25 09:05:20', '2022-10-25 09:05:20'),
(29, 75, 29, '2022-10-29 15:24:02', '2022-10-29 15:24:02'),
(30, 60, 32, '2022-11-01 05:58:48', '2022-11-01 05:58:48'),
(31, 60, 3, '2022-11-01 10:17:32', '2022-11-01 10:17:32'),
(33, 141, 32, '2022-11-02 12:05:17', '2022-11-02 12:05:17'),
(34, 141, 31, '2022-11-02 12:06:46', '2022-11-02 12:06:46'),
(35, 141, 29, '2022-11-02 12:07:13', '2022-11-02 12:07:13'),
(36, 141, 26, '2022-11-02 12:19:05', '2022-11-02 12:19:05'),
(37, 141, 23, '2022-11-02 12:21:19', '2022-11-02 12:21:19'),
(38, 141, 9, '2022-11-02 12:22:15', '2022-11-02 12:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `title_ab` varchar(100) NOT NULL,
  `title_he` varchar(100) NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content_ab` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content_he` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=active,2=inactive',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `title_ab`, `title_he`, `content`, `content_ab`, `content_he`, `status`, `created_at`, `updated_at`) VALUES
(2, 'About Us', 'معلومات عنا', 'עלינו', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لعمل كتاب عينة. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي مع إصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>', '<p>Lorem Ipsum הוא פשוט טקסט דמה של תעשיית הדפוס והקביעה. Lorem Ipsum היה טקסט הדמה הסטנדרטי של התעשייה מאז שנות ה-1500, כאשר מדפסת לא ידועה לקחה גלריה של סוג וערבכה אותה כדי ליצור ספר דגימות. הוא שרד לא רק חמש מאות שנים, אלא גם את הקפיצה לתוך כתיבה אלקטרונית, שנותרה ללא שינוי. זה זכה לפופולריות בשנות ה-60 עם שחרורו של גיליונות Letraset המכילים קטעי Lorem Ipsum, ולאחרונה עם תוכנות לפרסום שולחני כמו Aldus PageMaker, כולל גרסאות של Lorem Ipsum.</p>', 1, '2022-11-02 06:07:25', '2022-11-02 07:34:27'),
(3, 'Term & Conditions', 'الشروط والأحكام', 'תנאים והגבלות', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '<p>لوريم إيبسوم هو ببساطة نص شكلي يستخدم في صناعة الطباعة والتنضيد. كان Lorem Ipsum هو النص الوهمي القياسي في الصناعة منذ القرن الخامس عشر الميلادي ، عندما أخذت طابعة غير معروفة لوحًا من النوع وتدافعت عليه لعمل كتاب عينة. لقد نجت ليس فقط خمسة قرون ، ولكن أيضًا القفزة في التنضيد الإلكتروني ، وظلت دون تغيير جوهري. تم نشره في الستينيات من القرن الماضي مع إصدار أوراق Letraset التي تحتوي على مقاطع Lorem Ipsum ، ومؤخرًا مع برامج النشر المكتبي مثل Aldus PageMaker بما في ذلك إصدارات Lorem Ipsum.</p>', '<p>Lorem Ipsum הוא פשוט טקסט דמה של תעשיית הדפוס והקביעה. Lorem Ipsum היה טקסט הדמה הסטנדרטי של התעשייה מאז שנות ה-1500, כאשר מדפסת לא ידועה לקחה גלריה של סוג וערבכה אותה כדי ליצור ספר דגימות. הוא שרד לא רק חמש מאות שנים, אלא גם את הקפיצה לתוך כתיבה אלקטרונית, שנותרה ללא שינוי. זה זכה לפופולריות בשנות ה-60 עם שחרורו של גיליונות Letraset המכילים קטעי Lorem Ipsum, ולאחרונה עם תוכנות לפרסום שולחני כמו Aldus PageMaker, כולל גרסאות של Lorem Ipsum.</p>', 1, '2022-11-02 07:33:35', '2022-11-02 07:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `coupon_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `coupon_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `coupon_title_ab` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `coupon_title_he` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `coupon_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `discount_amount` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `discount_type` enum('Flat','Percentage') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `term_condition` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `user_id`, `category_id`, `coupon_code`, `coupon_title`, `coupon_title_ab`, `coupon_title_he`, `coupon_description`, `discount_amount`, `discount_type`, `location`, `expiry_date`, `term_condition`, `created_at`, `updated_at`) VALUES
(3, 25, NULL, 'MCD21', 'Flat 20% Discount at McDonald\'s', NULL, NULL, 'Lorem Ipsum Terms & Conditions will go here', '20', 'Flat', 'Ahmedabad', '2022-10-05', 'test', '2022-10-11 05:13:27', '2022-10-11 05:13:27'),
(4, 25, NULL, 'MCD02', 'Flat 20% Discount at McDonald\'s', NULL, NULL, 'Lorem Ipsum Terms & Conditions will go here', '20', 'Flat', 'Ahmedabad', '2022-10-05', 'test', '2022-10-11 05:13:54', '2022-10-11 05:13:54'),
(5, 25, NULL, 'MCD20', 'Flat 20% Discount at McDonald\'s', NULL, NULL, 'Lorem Ipsum Terms & Conditions will go here', '20', 'Flat', 'Ahmedabad', '2022-10-05', 'test', '2022-10-11 06:19:00', '2022-10-11 06:19:00'),
(6, 25, NULL, 'MCD20', 'Flat 20% Discount at McDonald\'s', NULL, NULL, 'Lorem Ipsum Terms & Conditions will go here', '20', 'Flat', 'Ahmedabad', '2022-10-05', 'test', '2022-10-11 06:19:57', '2022-10-11 06:19:57'),
(7, 25, NULL, 'MCD02', 'Flat 20% Discount at McDonald\'s', NULL, NULL, 'Lorem Ipsum Terms & Conditions will go here', '20', 'Flat', 'Ahmedabad', '2022-10-05', 'test', '2022-10-11 06:23:51', '2022-10-11 06:23:51'),
(8, 25, NULL, 'MCD20', 'Flat 20% Discount at McDonald\'s', NULL, NULL, 'Lorem Ipsum Terms & Conditions will go here', '20', 'Flat', 'Ahmedabad', '2022-10-05', 'test', '2022-10-11 06:46:52', '2022-10-11 06:46:52'),
(9, 25, NULL, 'MCD20', 'Flat 20% Discount at McDonald\'s', NULL, NULL, 'Lorem Ipsum Terms & Conditions will go here', '20', 'Flat', 'Ahmedabad', '2022-10-05', 'test', '2022-10-12 12:14:10', '2022-10-12 12:14:10'),
(10, 25, NULL, 'MCD20', 'Flat 20% Discount at McDonald\'s', NULL, NULL, 'Lorem Ipsum Terms & Conditions will go here', '20', 'Flat', 'Ahmedabad', '2022-10-05', 'test', '2022-10-12 12:14:53', '2022-10-12 12:14:53'),
(22, 25, 5, 'MCD21', 'Flat 20% Discount at McDonald\'s', NULL, NULL, 'Lorem Ipsum Terms & Conditions will go here', '20', 'Flat', 'Ahmedabad', '2022-10-05', 'test', '2022-10-17 07:29:21', '2022-10-17 07:29:21'),
(23, 25, 5, 'ASD001', 'Flat 20% Discount at McDonald\'s', NULL, NULL, 'Lorem Ipsum Terms & Conditions will go here', '20', 'Flat', 'Ahmedabad', '2022-10-05', 'test', '2022-10-17 08:03:09', '2022-10-17 08:03:09'),
(24, 25, 5, 'ASD001', 'Flat 20% Discount at McDonald\'s', NULL, NULL, 'Lorem Ipsum Terms & Conditions will go here', '20', 'Flat', 'Ahmedabad', '2022-10-05', 'test', '2022-10-17 08:09:51', '2022-10-17 08:09:51'),
(26, 25, 1, 'MCD20', 'Flat 20% Discount at McDonald\'s', '2', '2', 'Lorem Ipsum Terms & Conditions will go here', '20', 'Flat', 'Ahmedabad', '2022-10-05', 'test', '2022-10-21 06:35:19', '2022-10-21 06:35:19'),
(27, 118, 0, 'MCD30', 'Flat 12% Discount at Zometo', 'Title ab', 'Title he', 'Lorem Lpsum Terms & Conditions wii go here', '12', 'Percentage', 'Ahmedabad', '2022-10-23', '1. Lorem Ipsum Terms', '2022-10-21 06:45:56', '2022-10-21 08:00:07'),
(28, 129, 0, '123456789', 'MCD 20', 'MCD 20', 'MCD 20', 'Use this Coupon at McD or any other sheet and any attachments is intended only for the Public Feed edit the following a', '100', 'Flat', 'Tel Aviv', '2022-01-01', NULL, '2022-10-21 09:56:08', '2022-10-21 09:56:08'),
(29, 129, 0, '123456789', 'MCD 20', 'MCD 20', 'MCD 20', 'Use this Coupon at McD or any other sheet and any attachments is intended only for the Public Feed edit the following a', '100', 'Percentage', 'Tel Aviv', '2022-01-01', NULL, '2022-10-21 09:56:43', '2022-10-21 09:59:33'),
(30, 126, 0, '1234567890', 'MCD 20', 'MCD 20', 'MCD 20', 'Get 20 % discount at Any MCD store using this coupon.', '20', 'Percentage', 'Tel Aviv', '2021-01-01', NULL, '2022-10-21 10:43:35', '2022-10-21 10:44:39'),
(31, 129, 0, 'MCD 30', 'MCD 30', 'MCD 30', 'MCD 30', 'Get 30% of on all the purchase', '50', 'Flat', 'Tel Aviv', '2022-10-25', NULL, '2022-10-21 11:50:24', '2022-10-21 11:50:24'),
(32, 132, 0, 'MCD 50', 'Get Discount Worth 50%', 'Get Discount Worth 50%', 'Get Discount Worth 50%', 'Get Discount of 50% at any Store Using this Coupon code.', '50', 'Flat', 'Tel Aviv', '2023-01-01', NULL, '2022-10-31 12:58:07', '2022-10-31 13:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_qrcode`
--

CREATE TABLE `coupon_qrcode` (
  `id` int NOT NULL,
  `coupon_id` int DEFAULT NULL,
  `qrcode_url` varchar(100) DEFAULT NULL,
  `qrcode_file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `coupon_qrcode`
--

INSERT INTO `coupon_qrcode` (`id`, `coupon_id`, `qrcode_url`, `qrcode_file`, `created_at`, `updated_at`) VALUES
(3, 22, 'www.google.com', 'http://15.207.152.121/smartapp/public/qrcodes/1665991761.svg', '2022-10-17 07:29:21', '2022-10-17 07:29:21'),
(4, 23, 'www.google.com', 'http://15.207.152.121/smartapp/public/qrcodes/1665993789.svg', '2022-10-17 08:03:09', '2022-10-17 08:03:09'),
(5, 24, 'www.google.com', 'http://15.207.152.121/smartapp/public/qrcodes/1665994191.svg', '2022-10-17 08:09:51', '2022-10-17 08:09:51'),
(6, 25, 'ddddddddd', 'http://15.207.152.121/smartapp/public/qrcodes/1666334059.svg', '2022-10-21 06:34:19', '2022-10-21 06:34:19'),
(7, 26, 'https://www.google.com/', 'http://15.207.152.121/smartapp/public/qrcodes/1666334119.svg', '2022-10-21 06:35:19', '2022-10-21 06:35:19'),
(8, 27, 'http://google.com', 'http://15.207.152.121/smartapp/public/qrcodes/1667394803.svg', '2022-10-21 06:45:56', '2022-11-02 13:13:23'),
(9, 29, 'abc.abc', 'http://15.207.152.121/smartapp/public/qrcodes/1666346203.svg', '2022-10-21 09:56:43', '2022-10-21 09:56:43'),
(12, 32, 'abc.com', 'http://15.207.152.121/smartapp/public/qrcodes/1667221087.svg', '2022-10-31 12:58:07', '2022-10-31 12:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int NOT NULL,
  `language_name` varchar(50) DEFAULT NULL,
  `language_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `language_name`, `language_code`, `created_at`, `updated_at`) VALUES
(4, 'English', 'en', '2022-10-12 10:40:51', '2022-10-12 10:40:51'),
(5, 'Arabic', 'ab', '2022-10-12 10:41:06', '2022-10-13 10:37:28'),
(6, 'Hebrew', 'he', '2022-10-12 10:41:17', '2022-10-12 10:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `language_setting`
--

CREATE TABLE `language_setting` (
  `language_setting_id` int NOT NULL,
  `language_id` int NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `language_setting`
--

INSERT INTO `language_setting` (`language_setting_id`, `language_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 59, '2022-09-28 10:19:49', '2022-10-11 08:59:30'),
(2, 2, 47, '2022-10-07 10:38:23', '2022-10-07 10:38:23'),
(3, 1, 48, '2022-10-07 11:17:08', '2022-10-07 11:18:56'),
(4, 1, 59, '2022-10-10 11:31:48', '2022-10-10 11:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1=active,2=inactive',
  `type` tinyint(1) DEFAULT NULL COMMENT '1=blog,2=public_feed,3=coupon,4=smart_citizen_card',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0000af7558dfcd531dcdadee18da2393e6edda290c7babf3598b62315d135ae277013b917a9e7af7', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:29:37', '2022-09-30 10:29:37', '2023-09-30 10:29:37'),
('00c34284b3110fdf3949f978f95579d76226f123e86bd927640889b833bca187d4d77719f82ed361', 25, 1, 'SmartApp', '[]', 0, '2022-11-02 11:26:41', '2022-11-02 11:26:41', '2023-11-02 11:26:41'),
('012fed9343c2fcb6f568d0451fef8d7c375b8c000a807d4a2978af287c42fb971c368df1cc5daf1c', 94, 1, 'SmartApp', '[]', 0, '2022-10-31 05:54:46', '2022-10-31 05:54:46', '2023-10-31 05:54:46'),
('01a87bd366d5030bd3cd7041705fe9e5cb87754a65c181679e497f325c681da01a8f246fe8cceabf', 1, 1, 'SmartApp', '[]', 0, '2022-09-29 04:46:05', '2022-09-29 04:46:05', '2023-09-29 04:46:05'),
('029e53fe3e47cf7d369657fdb8c1bca24654e18d6407627918f2a5763b7a570b917d37313006a93c', 139, 1, 'SmartApp', '[]', 0, '2022-11-01 11:48:20', '2022-11-01 11:48:20', '2023-11-01 11:48:20'),
('030cea1251f087c353dda89a487d90a34a03490bda8abf123a8f6cdd5c8093014e41736ba18e56f6', 91, 1, 'SmartApp', '[]', 0, '2022-10-17 13:53:10', '2022-10-17 13:53:10', '2023-10-17 13:53:10'),
('0333431133042c31972e117bd966dbeec48948f2cfa2d18f16f83a8e3d68905c7bcff7677566f695', 1, 1, 'SmartApp', '[]', 0, '2022-09-28 06:04:21', '2022-09-28 06:04:21', '2023-09-28 06:04:21'),
('03644db1397cced74c8c34fd726df19f06820602780cbfde91936ac9dec36ad8959e71378d9742dd', 10, 1, 'SmartApp', '[]', 0, '2022-09-30 05:56:43', '2022-09-30 05:56:43', '2023-09-30 05:56:43'),
('03b53bcdd2fdd3ae18b8abc60eff4854cc1ae64904aa501c277ad11434cc1275ca43168977e36c15', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 12:14:26', '2022-10-14 12:14:26', '2023-10-14 12:14:26'),
('03d73c0a38565eee387741686c13540b3aa31c186b30f207307b53b2f52640b03c4b8370c4374e15', 60, 1, 'SmartApp', '[]', 0, '2022-10-12 05:50:15', '2022-10-12 05:50:15', '2023-10-12 05:50:15'),
('042a7a775bdbd534aacb97c65962b3e4d9fa9a872a2ecd0623086bfca3656ab0fd18cae7ec6d400e', 118, 1, 'SmartApp', '[]', 0, '2022-10-20 06:50:23', '2022-10-20 06:50:23', '2023-10-20 06:50:23'),
('051746c08b17563db8b44d7f9596bd5d249295c7401d52d81c09e575fca1a1be58740ffd3dcabe19', 2, 1, 'SmartApp', '[]', 0, '2022-09-28 08:01:28', '2022-09-28 08:01:28', '2023-09-28 08:01:28'),
('0539ff48b1b66eee64db582a420e92222e110bdba7f4afa72d03965490d0df8b81f23b65a6c5f81b', 60, 1, 'SmartApp', '[]', 0, '2022-11-01 05:43:02', '2022-11-01 05:43:02', '2023-11-01 05:43:02'),
('06d02c0bbde7209aef2c79af4126fd22ded80b3139dfc720ffe1bc88f726aef25515f97e99eb125d', 132, 1, 'SmartApp', '[]', 0, '2022-11-01 10:45:34', '2022-11-01 10:45:34', '2023-11-01 10:45:34'),
('06e24883fc97e2d8591431934b475e85146c6ad4596a9eb9e998d52797738062122833f0d973be9f', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 12:04:21', '2022-10-14 12:04:21', '2023-10-14 12:04:21'),
('071aedb5221197364c75c4768e102d25f23a8fe9eb549df93131701f28be76c644d954b4ecd517c6', 91, 1, 'SmartApp', '[]', 0, '2022-10-18 11:48:51', '2022-10-18 11:48:51', '2023-10-18 11:48:51'),
('0839e90795f17c1ba830ec2d60210eeb26dde50325958a056da326cea50d6462f7a5aca4b27a365f', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 10:07:08', '2022-10-14 10:07:08', '2023-10-14 10:07:08'),
('09b774e89887f84112ee4a8c4c35d9c464f222dbf19e328a615871d54fcbb87500635a3b57bc65da', 96, 1, 'SmartApp', '[]', 0, '2022-10-31 05:26:16', '2022-10-31 05:26:16', '2023-10-31 05:26:16'),
('09e05c58922296cbcca1e5956799dc2ea825a059cf438c9dc7d8d8401748e8448c5408624c984bcd', 60, 1, 'SmartApp', '[]', 0, '2022-10-17 11:56:21', '2022-10-17 11:56:21', '2023-10-17 11:56:21'),
('0cfbb3e2b3193bea2e32cdd914973d33a605f2f40df9b0033abd2961d9b67647df4ce549eea6ff6c', 45, 1, 'SmartApp', '[]', 0, '2022-10-07 09:32:33', '2022-10-07 09:32:33', '2023-10-07 09:32:33'),
('0d51d4fdd5f55f54a9c1b4c95c20895d4a7fb6ecada7f5b8329422f9a84d0175f4e1dcef9337cf50', 21, 1, 'SmartApp', '[]', 0, '2022-10-03 06:21:43', '2022-10-03 06:21:43', '2023-10-03 06:21:43'),
('0d9b465c635a08c66f1af468955e34c01f1927cd359ee0da93c1ba70ee1a65f0fce7ad391fb758db', 91, 1, 'SmartApp', '[]', 0, '2022-10-17 11:35:29', '2022-10-17 11:35:29', '2023-10-17 11:35:29'),
('0e0968122edc4b1e093458e9f5fbdefcead193d3a12415b945c95f5f92f938967f3ecb4840360d98', 89, 1, 'SmartApp', '[]', 0, '2022-10-17 06:43:41', '2022-10-17 06:43:41', '2023-10-17 06:43:41'),
('0e0a9324eb6348d8dce29c43458f908d72c7ec4786277b2dc2f4bea174f3c95e5c2585557313702a', 50, 1, 'SmartApp', '[]', 0, '2022-10-10 04:51:13', '2022-10-10 04:51:13', '2023-10-10 04:51:13'),
('0e0b77a36968e990bd40c2a9c38b0ca1fa0c5dd56530b662a012324f47187ffb88afae3c7f340704', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:21:40', '2022-09-29 13:21:40', '2023-09-29 13:21:40'),
('0ea7dc1120df51b8904fb0a1a643d496c4ac2b7da9bbd1239211570c2399fcb6ee051bda6dc9800e', 63, 1, 'SmartApp', '[]', 0, '2022-10-11 06:25:25', '2022-10-11 06:25:25', '2023-10-11 06:25:25'),
('0f27f2a91f621733ebf47a9a42d1d442a583b2d9bdd82274bdd3aae9faa105f7e066a4dd9a199a17', 7, 1, 'SmartApp', '[]', 0, '2022-09-27 14:52:08', '2022-09-27 14:52:08', '2023-09-27 14:52:08'),
('0fb066630582ebf7d9fac7983da1cd9a2869ec3bc2df73b5901e3187800a3bc90a139948a1dacc25', 72, 1, 'SmartApp', '[]', 0, '2022-10-11 07:41:46', '2022-10-11 07:41:46', '2023-10-11 07:41:46'),
('0fe8b27244e9ade31ee825b688554dbd36d82c6b9d31063ec6455695cca363914eeaa20931c6806d', 60, 1, 'SmartApp', '[]', 0, '2022-10-17 09:58:59', '2022-10-17 09:58:59', '2023-10-17 09:58:59'),
('101323993ff8662a0bb58d5943b3a6b0ca69db05947811aa400b81fb1b8bb1dba94742aad6415337', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 09:35:40', '2022-09-30 09:35:40', '2023-09-30 09:35:40'),
('10174c75e3fe968f6bab08591703d021b255212a0c2b1b8fa7f22499046fa6c3fd1ea67dd3ea2b78', 69, 1, 'SmartApp', '[]', 0, '2022-10-11 07:30:58', '2022-10-11 07:30:58', '2023-10-11 07:30:58'),
('102a530e1e7dfd037d42c05936214f7affd94cdb0211fa735db644ece31b39812d3e9d370d75921f', 65, 1, 'SmartApp', '[]', 0, '2022-10-11 06:38:57', '2022-10-11 06:38:57', '2023-10-11 06:38:57'),
('132c651cb5ce54ba41e90646c79fbb79a79357728e5057bc397057157d3533000c9e1ff73be726ac', 37, 1, 'SmartApp', '[]', 0, '2022-10-01 13:31:55', '2022-10-01 13:31:55', '2023-10-01 13:31:55'),
('134152150e9bad05d9dcf846c3784bdc8ba3cfc9c514f795af4bf2816b698d6d5645fbe4d9d7c8ce', 7, 1, 'SmartApp', '[]', 0, '2022-09-29 05:34:12', '2022-09-29 05:34:12', '2023-09-29 05:34:12'),
('1352e67b00ba46bd41d3084b7cfbd8f6357e13a036b608c76a8630ca51ce3408f1758e285ff911cf', 94, 1, 'SmartApp', '[]', 0, '2022-10-19 09:01:43', '2022-10-19 09:01:43', '2023-10-19 09:01:43'),
('13bfa9d30a225c213c14b6d7314ca35fb365deb22bce00a6cedae6625696d746195187d0f0b5d6a8', 21, 1, 'SmartApp', '[]', 0, '2022-10-04 11:52:33', '2022-10-04 11:52:33', '2023-10-04 11:52:33'),
('141a5bb17ca70fbde63897d3839278d214118581ff694de00e255de6e3db06fd3d169078a5e3e6b9', 118, 1, 'SmartApp', '[]', 0, '2022-10-20 06:23:20', '2022-10-20 06:23:20', '2023-10-20 06:23:20'),
('143451f2d39de9af3030716ccce51ac5c4ef4d9047d8c5f7cc2208da627e74c1973089269f37c606', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 08:49:29', '2022-10-01 08:49:29', '2023-10-01 08:49:29'),
('154f671f608772992c51911383bea55d6012f86525c57bd8acf752cd58d487b013fb60922bc87720', 60, 1, 'SmartApp', '[]', 0, '2022-10-20 05:14:39', '2022-10-20 05:14:39', '2023-10-20 05:14:39'),
('15e67231525f3301fe9c597b756aba8740c13fc3a0c6e564405af2a08a36653189fc8e5f59a52cea', 1, 1, 'SmartApp', '[]', 0, '2022-09-30 12:52:42', '2022-09-30 12:52:42', '2023-09-30 12:52:42'),
('164818f74ac785f08493332ae4c367c2ab473fac1865ed090f6abd9ecc1f1250117a3a3809ff51a9', 1, 1, 'SmartApp', '[]', 0, '2022-09-28 07:00:20', '2022-09-28 07:00:20', '2023-09-28 07:00:20'),
('16e5ecf310c3f7e4f508b0ff8aa305a8b7c7a28344d38c2fd83d0082e6ebfe8536841356e0b0f75a', 51, 1, 'SmartApp', '[]', 0, '2022-10-10 09:04:26', '2022-10-10 09:04:26', '2023-10-10 09:04:26'),
('16f82da0b3b26ded06e8f4ab89f2d6e17f1f269d330be0a6adeb4025753a2612dbad0a9643fefc2c', 48, 1, 'SmartApp', '[]', 0, '2022-10-07 11:06:02', '2022-10-07 11:06:02', '2023-10-07 11:06:02'),
('172bebf1b5215c01eb6c16ad3c328b9e5d4fdf49a3aacc30e3cca545041c4515f0340310041359ec', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:32:08', '2022-09-30 10:32:08', '2023-09-30 10:32:08'),
('17b4a9d591f3e06e1d8e635c07311105309e101443c5a7ce16b4417af8c3617eadab63ea8433e3c5', 60, 1, 'SmartApp', '[]', 0, '2022-10-19 13:37:52', '2022-10-19 13:37:52', '2023-10-19 13:37:52'),
('17e1a0db4239e7c879e4bb0593efad172a81956d485d27c4ea6aac15adf2e6f29e4a7e276e193e97', 95, 1, 'SmartApp', '[]', 0, '2022-10-19 09:32:35', '2022-10-19 09:32:35', '2023-10-19 09:32:35'),
('1872327c97f8098ba7377182abbb2670be562543412191e01b4dcd8f84443085afb9fe8908110b82', 4, 1, 'SmartApp', '[]', 0, '2022-09-27 14:35:16', '2022-09-27 14:35:16', '2023-09-27 14:35:16'),
('18a64d3eec834c257972a4325eb1d88c3acaaa0cda54c29661ff116f81fcc1f1a355bf7117ae14a2', 60, 1, 'SmartApp', '[]', 0, '2022-10-14 12:14:19', '2022-10-14 12:14:19', '2023-10-14 12:14:19'),
('193555e5515f87822483c6305e28515728493c53fcd9bd97272222b2a44ce5d0c8ae152abf0d3514', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:29:38', '2022-09-30 10:29:38', '2023-09-30 10:29:38'),
('1a3d2a03945f74dee5a00dc5d19134625e7e46f388b8083bd5dfad3b85718fe3dc3484995bb5bf60', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:15:01', '2022-09-30 10:15:01', '2023-09-30 10:15:01'),
('1aa0a9b204c69b2d2e18bb68b0dd228db622d3972466b6313fde8dc468adef7827a48dd024db1dc0', 90, 1, 'SmartApp', '[]', 0, '2022-11-01 11:54:00', '2022-11-01 11:54:00', '2023-11-01 11:54:00'),
('1b47a3a884c62241a7b8c80f9ac22c58d01dae34c8846569db105df4ee9526d6987413e604ab7799', 1, 1, 'SmartApp', '[]', 0, '2022-09-28 07:03:42', '2022-09-28 07:03:42', '2023-09-28 07:03:42'),
('1b8e96d48f523979b4f6cac764c4ed03b333110c9f7d8f0bb35728c540bd90a0eaea43bffb33deae', 94, 1, 'SmartApp', '[]', 0, '2022-10-31 07:18:05', '2022-10-31 07:18:05', '2023-10-31 07:18:05'),
('1c423852005aa53843dfc9470f90109f34dd69ce932a3f73a0cf42f1b77073c1c8c42d2d24ac53cb', 60, 1, 'SmartApp', '[]', 0, '2022-10-20 07:20:29', '2022-10-20 07:20:29', '2023-10-20 07:20:29'),
('1d4e8bf379b984fa2e2d81a41dd906418656c830d7b624aa2843e564c44445628494ddc15c225c52', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 05:32:22', '2022-10-11 05:32:22', '2023-10-11 05:32:22'),
('1d5133e42190772a8205dd4ac862593da90fc2cd4cdcf360b0eac06f254f9188d518ba2912e6d3c3', 38, 1, 'SmartApp', '[]', 0, '2022-10-01 13:34:24', '2022-10-01 13:34:24', '2023-10-01 13:34:24'),
('1da551acd357221b6f9b6e95381962f524542008f2979b08d3146e685e7f6674c97ae848459d65dd', 60, 1, 'SmartApp', '[]', 0, '2022-10-20 06:55:59', '2022-10-20 06:55:59', '2023-10-20 06:55:59'),
('1e13a2a760ebfa9735b75a1d519a1d02d79d146c221f7a1ac933e66339737466782f5f69a83a6748', 51, 1, 'SmartApp', '[]', 0, '2022-10-10 05:48:39', '2022-10-10 05:48:39', '2023-10-10 05:48:39'),
('1e38a40e6fcd1989fd4aa69e4d8e26572fd72f3436624284138c96a1438e9edd4159b238bd14e41e', 60, 1, 'SmartApp', '[]', 0, '2022-10-17 12:17:53', '2022-10-17 12:17:53', '2023-10-17 12:17:53'),
('1e5bc4e8a6b63603dd5c3c5fe0d1c6b53a2cc8daec06b956b7e8a96d587dbe7e8b59152ed434a61e', 1, 1, 'SmartApp', '[]', 0, '2022-10-01 08:35:38', '2022-10-01 08:35:38', '2023-10-01 08:35:38'),
('1ee79074951ae53f777251c06b0b375b766326c8a72f4cf8d289891c380b97f3b0e91d475bc6e7d4', 12, 1, 'SmartApp', '[]', 0, '2022-09-30 07:03:25', '2022-09-30 07:03:25', '2023-09-30 07:03:25'),
('1f676ff165688a72c74e5cf5e43a0633c1f871b0cfa6c0b6e517032d3495a1d1b6170cd1b8eb4d22', 4, 1, 'SmartApp', '[]', 0, '2022-09-28 05:38:34', '2022-09-28 05:38:34', '2023-09-28 05:38:34'),
('1f900dd59e590814a868725c7649a0f0396337f0728e0a05fe1cae7596ef820a2cf94fca1e1bd4dc', 1, 1, 'SmartApp', '[]', 0, '2022-09-28 05:37:22', '2022-09-28 05:37:22', '2023-09-28 05:37:22'),
('1fa4590a4790dbd32dcfc2ca5c9caa51082d1ebb2dc6a873de7da58b873af5485003f874cfb0071c', 1, 1, 'SmartApp', '[]', 0, '2022-09-28 06:25:28', '2022-09-28 06:25:28', '2023-09-28 06:25:28'),
('21e5e3ebb2d8f4efd03e51a8f559bec59fcc575989f7f1d1ab53f19fa9a8346e64820330cdcf033a', 10, 1, 'SmartApp', '[]', 0, '2022-09-27 14:55:06', '2022-09-27 14:55:06', '2023-09-27 14:55:06'),
('21e89f05bd54a48537b0752caa1bc62e0df2ab0a041a26b20136f83f3afd175b9aad958c50a4695b', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:29:57', '2022-09-30 10:29:57', '2023-09-30 10:29:57'),
('2297af3c7c1eba8a1647034f19fa13b5c307c28e76b1c44ab8c57ba94b9c5f3c1d04bfbb8a4402ee', 141, 1, 'SmartApp', '[]', 0, '2022-11-02 12:06:11', '2022-11-02 12:06:11', '2023-11-02 12:06:11'),
('239356cf2c3358d9ddcac49bede6f1735d992ac942b4fe6f9c62be4834bf5a17c4aa0c30e22d43d2', 5, 1, 'SmartApp', '[]', 0, '2022-09-27 13:43:23', '2022-09-27 13:43:23', '2023-09-27 13:43:23'),
('251f24d2132e10ce08b9aa626919003d4dc4ab78d15cc5f56477706d6a8f8f10fb4403fbf941f48b', 54, 1, 'SmartApp', '[]', 0, '2022-10-10 05:18:51', '2022-10-10 05:18:51', '2023-10-10 05:18:51'),
('25db8dbe1c0a005b42b562a2ebc6882974e7d8f74e4023c307c92db02ab29fdc05f1e39ec93b59f1', 97, 1, 'SmartApp', '[]', 0, '2022-10-19 11:36:03', '2022-10-19 11:36:03', '2023-10-19 11:36:03'),
('26086ad701a65a74cb5999c31d5806a808f8ce373823e867036216848e7ae8a9178e03000a94629a', 110, 1, 'SmartApp', '[]', 0, '2022-10-20 05:25:51', '2022-10-20 05:25:51', '2023-10-20 05:25:51'),
('2667bb647093d8fe4c471ebd1b7010a5be0821b6919c6ef2dcdbb89444a8734e65af3d2b10c18eb9', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 04:53:01', '2022-10-11 04:53:01', '2023-10-11 04:53:01'),
('26ae8ab0cc6ea88b8e77122e9aa0fbd7e58da341f9ff70f212158b4935e240e5ec0b2d5edbcc652b', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 09:13:04', '2022-10-14 09:13:04', '2023-10-14 09:13:04'),
('26cf4ddf2390acea0da575a73d66b8127c2f46b978a083b10a6f05e25e77f19d701c8131d4b64bd5', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:29:23', '2022-09-30 10:29:23', '2023-09-30 10:29:23'),
('2725f35da089652c5350eff2ba19eae660c9dafc25026f0831738ab54c4e74c22fadf44dd0813173', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 09:54:49', '2022-09-30 09:54:49', '2023-09-30 09:54:49'),
('278122e332ae82e4a8c34093c4e7e80b36e24785914bb9bd09c55a95f7c2beca8bb9ae1f213b4a17', 87, 1, 'SmartApp', '[]', 0, '2022-10-17 11:27:22', '2022-10-17 11:27:22', '2023-10-17 11:27:22'),
('2841737cce396f93b5934cf145f7a18f317d462867e989e21e454c8d868beae33f10670a4e5f13d6', 94, 1, 'SmartApp', '[]', 0, '2022-10-31 06:10:26', '2022-10-31 06:10:26', '2023-10-31 06:10:26'),
('28db70bf5c266f0f3298450935624a9e05ce4cee20801a4383f772a781a1ff6b080b07543bf08462', 141, 1, 'SmartApp', '[]', 0, '2022-11-02 12:06:23', '2022-11-02 12:06:23', '2023-11-02 12:06:23'),
('28dbc036d341aa24de198256c81a06777df3d8e0c056d67ea65e4b5c150187fde191e612f7bf397d', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 14:02:33', '2022-09-30 14:02:33', '2023-09-30 14:02:33'),
('2919b6168853389f09556d0113e0ae1bb52b80121b8e1b2579711bedd89cab3346c6d38eacee21fb', 23, 1, 'SmartApp', '[]', 0, '2022-09-30 13:47:56', '2022-09-30 13:47:56', '2023-09-30 13:47:56'),
('291c8b7bc3905c3b8801f130807acff64c11985eb5df5cc05aeb3facb22ac080e3a30060c47d20d4', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 08:32:26', '2022-10-11 08:32:26', '2023-10-11 08:32:26'),
('298c50ee1b421201ff12ef99de76a40b59d042cb9c49799c815f34e1987426200acc3761d0c11b59', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:20:42', '2022-09-29 13:20:42', '2023-09-29 13:20:42'),
('29c75ea0b3f694a6999805ad16b402eef259c245d2c7dae86f9e60e8dbe4ca3a7c1e0f9072acc9da', 94, 1, 'SmartApp', '[]', 0, '2022-10-31 06:13:38', '2022-10-31 06:13:38', '2023-10-31 06:13:38'),
('29d5945ed2cb4748bfd792c1041e9d937a772ac77d3e78dd79579a8c92f02adddb3c686e912e9714', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 06:26:11', '2022-10-11 06:26:11', '2023-10-11 06:26:11'),
('2a053fb2550ab1f22b7f9ca27aaca6ffb231b2dc0a2a745ef115c853fb9b44f0d8ccebeaddedd69f', 138, 1, 'SmartApp', '[]', 0, '2022-11-01 11:21:05', '2022-11-01 11:21:05', '2023-11-01 11:21:05'),
('2a624a547f16edc20445f25dfe10093d388769a9deed2d6462835831bca7256ddde4901a71238fa5', 28, 1, 'SmartApp', '[]', 0, '2022-10-10 11:22:44', '2022-10-10 11:22:44', '2023-10-10 11:22:44'),
('2b00e45c228085f7779e57cc9e6f9ec68aa41a984d66b4f71e2c1aaf930f568b8142cc2aa9fa3d5f', 59, 1, 'SmartApp', '[]', 0, '2022-10-13 12:52:45', '2022-10-13 12:52:45', '2023-10-13 12:52:45'),
('2ba954e03c48dd4b40389bd97e5030c216714ff7a6da8112b17a569d9d83d365fbeded42f6191ac1', 28, 1, 'SmartApp', '[]', 0, '2022-10-13 06:34:49', '2022-10-13 06:34:49', '2023-10-13 06:34:49'),
('2c05e52b345125158cdbe2abb52d26d2a1a124ab80d5b021f7e0d61f344bb1b0d3d66ea58b92b7a8', 60, 1, 'SmartApp', '[]', 0, '2022-10-14 12:22:12', '2022-10-14 12:22:12', '2023-10-14 12:22:12'),
('2d29377ef4f2c79b09b6e95df47dc0d3f99807118c647161f70d87fe5e5de55316f654e88d299648', 48, 1, 'SmartApp', '[]', 0, '2022-10-07 11:09:57', '2022-10-07 11:09:57', '2023-10-07 11:09:57'),
('2e58ebf1ce0530b7271d7e249b281d9c3bb8f59949230a1ad94777a0ad860131f48a9793c8ae3b09', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 09:50:17', '2022-10-14 09:50:17', '2023-10-14 09:50:17'),
('2ec7d69f7075502ca4ab6a1f6ad70e84247a60cb959ab004d634080ac10b6ea9b0294c44762c601b', 51, 1, 'SmartApp', '[]', 0, '2022-10-10 05:38:01', '2022-10-10 05:38:01', '2023-10-10 05:38:01'),
('2ed85ac5e11b12e52f9e4f075631b242774773dcedd001c043bc5de94c98c5bfa043ae8d2144fe56', 98, 1, 'SmartApp', '[]', 0, '2022-10-19 11:40:03', '2022-10-19 11:40:03', '2023-10-19 11:40:03'),
('2f2f632b0deb9e0d1d55acbb23b734a097e0cdb133b62d2b1c2ebd1f80908075b8a4dec2cfda667f', 2, 1, 'SmartApp', '[]', 0, '2022-09-27 14:21:12', '2022-09-27 14:21:12', '2023-09-27 14:21:12'),
('2f9ab2570068acd2d6bc53b454d6073420ae19eed809dd825a71afa7e91a34205d23ad3abb6da0a1', 91, 1, 'SmartApp', '[]', 0, '2022-10-18 12:12:47', '2022-10-18 12:12:47', '2023-10-18 12:12:47'),
('307d92f969aeb05c4c7c3f901c155f0db2c4282312d63e21fbbc64edb5f3f4f4c9801cbbfe7c8449', 45, 1, 'SmartApp', '[]', 0, '2022-10-07 09:49:39', '2022-10-07 09:49:39', '2023-10-07 09:49:39'),
('30db2d99083d636875148f80d56d71d2d5e82fe5acf43e296e0455ea2a40522de9d7ece3dfccd380', 36, 1, 'SmartApp', '[]', 0, '2022-10-01 10:25:44', '2022-10-01 10:25:44', '2023-10-01 10:25:44'),
('3121be76ada908d4699b66215fb9930ce057b6f80d637b233718517c47162a2ebf3bceb766947e5e', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:41:15', '2022-09-30 10:41:15', '2023-09-30 10:41:15'),
('314ff0d01634b02208bfe744e2aef7bd257d34949fd56e90d9b36498dbdf7ed97970245bbff28fea', 60, 1, 'SmartApp', '[]', 0, '2022-11-01 05:44:07', '2022-11-01 05:44:07', '2023-11-01 05:44:07'),
('315bece384a4815703da98181395290345213e1b86dae6189a34a43324fddaa7e68e12c924fb19e7', 91, 1, 'SmartApp', '[]', 0, '2022-10-17 12:46:04', '2022-10-17 12:46:04', '2023-10-17 12:46:04'),
('3236f9bffa487d67bb48c12fdb4f4eebc67152be75e1183e7365603d54d6472e05b15c5c536c160a', 90, 1, 'SmartApp', '[]', 0, '2022-11-01 11:52:27', '2022-11-01 11:52:27', '2023-11-01 11:52:27'),
('32889114631d6014f7d0472a7979e2a63f94271433a5439c4717e6efb19d69d185351b106f49bfd5', 8, 1, 'SmartApp', '[]', 0, '2022-09-30 05:20:02', '2022-09-30 05:20:02', '2023-09-30 05:20:02'),
('33754299550f960ae9dae7b0ecd311dc5b92a94dcf5f8a6b6efcc265ec27ccd519b3dcf439613b43', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:17:54', '2022-09-29 13:17:54', '2023-09-29 13:17:54'),
('33766af81f2add3ec1e76b077ec0f10e3a35d62b46651d76da438d5abb83fbc5fcee43361c89c79a', 139, 1, 'SmartApp', '[]', 0, '2022-11-01 11:47:45', '2022-11-01 11:47:45', '2023-11-01 11:47:45'),
('337e12cb0394b7c02e85a7f525a0ea0ecb661a3a7d9dcbb79e87ea2847ae17085c3883b6b0ec9f63', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 12:50:07', '2022-10-01 12:50:07', '2023-10-01 12:50:07'),
('340a3e0bdfeafee5f86b829b984c094f3101ce87ecae81ef54566c46f993aad7aa3da13cda2d5c08', 1, 1, 'SmartApp', '[]', 0, '2022-09-28 06:24:45', '2022-09-28 06:24:45', '2023-09-28 06:24:45'),
('34180726c93f8fc28e1561705652df2bfdd438690ab6cf411a7dc210893a6384e2a0b1295ba397e8', 70, 1, 'SmartApp', '[]', 0, '2022-10-11 07:32:19', '2022-10-11 07:32:19', '2023-10-11 07:32:19'),
('3423150e48d60b674dfbc213262d03c30cf15ee8b9f5bc2326efdbaacff3e5dec8c53c045d403c3d', 92, 1, 'SmartApp', '[]', 0, '2022-10-19 13:39:10', '2022-10-19 13:39:10', '2023-10-19 13:39:10'),
('34b9a0135da742305224060dc38ae3318653642b520437b4a3ec09fa5b9557473c2a5bac9ff53247', 4, 1, 'SmartApp', '[]', 0, '2022-09-28 10:57:39', '2022-09-28 10:57:39', '2023-09-28 10:57:39'),
('3673384a1217fa352c301feca5ba8ce719ae11e8dc3c481c471a7c6e1faf95d9c486d0c68b3a3c00', 60, 1, 'SmartApp', '[]', 0, '2022-10-14 09:54:05', '2022-10-14 09:54:05', '2023-10-14 09:54:05'),
('3768c830aec07cfc7d6a7796197a677424f3dd2b59643c9bac013829f79d65d853260d6ae51cade8', 91, 1, 'SmartApp', '[]', 0, '2022-10-17 12:46:28', '2022-10-17 12:46:28', '2023-10-17 12:46:28'),
('37e368337428e6c66701cc29ff2f3073b56ead98f30ec5504eee1600ffb74890756d864b41fd0616', 118, 1, 'SmartApp', '[]', 0, '2022-10-20 06:54:22', '2022-10-20 06:54:22', '2023-10-20 06:54:22'),
('38611fcfb065f06745610abe50cd3930338497b76a9483780f8fc287b6cf9b4e132fbdb46a555c14', 132, 1, 'SmartApp', '[]', 0, '2022-10-31 12:38:06', '2022-10-31 12:38:06', '2023-10-31 12:38:06'),
('394cdf98d0df8e3c64523905247387f70745351e7877d19d49b45890bc82be77986c969d4e784a2b', 62, 1, 'SmartApp', '[]', 0, '2022-10-11 06:12:37', '2022-10-11 06:12:37', '2023-10-11 06:12:37'),
('39ab305e8e1ec6641cc8a908e5824b3ffbadcb0073776c4bfe6d61b40bd9e68c27bba48288e14e28', 47, 1, 'SmartApp', '[]', 0, '2022-10-07 10:05:23', '2022-10-07 10:05:23', '2023-10-07 10:05:23'),
('39acfc4a16b75a183579ec24b77bbd73d15ac5c253e5b3d753c810f34c5ab2498858a5abc68ac67d', 129, 1, 'SmartApp', '[]', 0, '2022-10-21 09:27:51', '2022-10-21 09:27:51', '2023-10-21 09:27:51'),
('39dd378df5640ff1e42fe0b356b16d9158d766262021e0626d46de2a1b081e68e516b621db1ead22', 95, 1, 'SmartApp', '[]', 0, '2022-10-19 09:08:07', '2022-10-19 09:08:07', '2023-10-19 09:08:07'),
('39fe389e1581fcde2c7d2edc4be855af64d4dff880db9d76cee5a918d6aa6a466c60f59c027723c0', 5, 1, 'SmartApp', '[]', 0, '2022-09-27 14:36:10', '2022-09-27 14:36:10', '2023-09-27 14:36:10'),
('3a7b65703226aba4d2f8ad195c8b655232243b301ab291c30d675a90752455bb11763333d2b005b2', 141, 1, 'SmartApp', '[]', 0, '2022-11-02 12:10:30', '2022-11-02 12:10:30', '2023-11-02 12:10:30'),
('3a84c279b478918cda076c4459e701ad70f3f0848eef55dca73e68da636b0abe4adee5f386ca3796', 129, 1, 'SmartApp', '[]', 0, '2022-11-01 11:39:29', '2022-11-01 11:39:29', '2023-11-01 11:39:29'),
('3b92db7e4da74ef14a82b910827e158b46b58aecf3c4a6e048e27ae14c677c2f466d086252f13840', 29, 1, 'SmartApp', '[]', 0, '2022-10-08 05:34:21', '2022-10-08 05:34:21', '2023-10-08 05:34:21'),
('3c2e755c5c70c603d8a8c1d3d974a5445cfbef5e72d17fe0e231ab01d509cfb23769cba2cd991161', 1, 1, 'SmartApp', '[]', 0, '2022-09-28 06:18:57', '2022-09-28 06:18:57', '2023-09-28 06:18:57'),
('3d8f4f4ff6b5a05ffce877fb60f7bf12afc6fb0cf5f54c42926befdc23726e7c159e102c5aea25b1', 8, 1, 'SmartApp', '[]', 0, '2022-09-30 09:01:33', '2022-09-30 09:01:33', '2023-09-30 09:01:33'),
('3daea52bc348a87cf261929cc90fd3541803122ae324417a614ab1af6d9b4543ba5b9243409bf836', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 07:30:09', '2022-10-01 07:30:09', '2023-10-01 07:30:09'),
('3e3575eaac9f249774f8f15b8fedf0221183eefe2a894abacbfece9c27c644e8a8168bbd1a243648', 60, 1, 'SmartApp', '[]', 0, '2022-10-18 07:14:50', '2022-10-18 07:14:50', '2023-10-18 07:14:50'),
('3ec9d01c25e30ffeb919dd9186593b4e897ffea5bd56a84155a362ea4d8d726cd9bdd0a6bc3ad4b8', 1, 1, 'SmartApp', '[]', 0, '2022-09-30 12:47:54', '2022-09-30 12:47:54', '2023-09-30 12:47:54'),
('3eda3e0ee91e9534a885c341ce2275a7707fc47743a68d1ed1edd1d4a2f2f17c041f2ef4c42fd983', 51, 1, 'SmartApp', '[]', 0, '2022-10-10 13:25:24', '2022-10-10 13:25:24', '2023-10-10 13:25:24'),
('3f08ec7d276270ccd1f7fc89b73ed9efb514113f5d343a6f5599421745383be02346cf80bc32b6de', 119, 1, 'SmartApp', '[]', 0, '2022-10-20 07:07:20', '2022-10-20 07:07:20', '2023-10-20 07:07:20'),
('3fc3dd62288091a04a66c89a6047ed37cb59b7219c7136e28aa31d7fd4f47c8636551faf6376d7c8', 105, 1, 'SmartApp', '[]', 0, '2022-10-20 04:45:00', '2022-10-20 04:45:00', '2023-10-20 04:45:00'),
('400ac649d18fe454cf75e88dabe87d13172eeedd6cb809eb05430256dbc0cc497c8aa4c5f1f45c05', 47, 1, 'SmartApp', '[]', 0, '2022-10-07 10:01:04', '2022-10-07 10:01:04', '2023-10-07 10:01:04'),
('40f831dd7bcaa93d82f9f7b5465db9d2c07ca7346a2aa1f1890c9e775364e33d4aefbede5b260cec', 118, 1, 'SmartApp', '[]', 0, '2022-10-20 10:01:11', '2022-10-20 10:01:11', '2023-10-20 10:01:11'),
('4107dc15cdadc55899914f1e6f506b089d3cc034ff9a269481eccd5e2e8a5c88dfa046cad0306817', 51, 1, 'SmartApp', '[]', 0, '2022-10-10 11:41:02', '2022-10-10 11:41:02', '2023-10-10 11:41:02'),
('410d294ef3b1df02acfa21a7be00564b3b3e77ac24340d11c985e51339c917bd2c0b00d538c2d45e', 131, 1, 'SmartApp', '[]', 0, '2022-10-21 11:20:33', '2022-10-21 11:20:33', '2023-10-21 11:20:33'),
('4117592e717045c78381c135c27afe5038e03c278fa6d798aaea808e249d3d32df4cb2864110ccf7', 102, 1, 'SmartApp', '[]', 0, '2022-10-19 13:37:33', '2022-10-19 13:37:33', '2023-10-19 13:37:33'),
('41cb9269b060a760e74868807e23d0a5ad5ec19496bae5b22a6ea08ea6e6a097e5e9bc2b6fcc8a87', 49, 1, 'SmartApp', '[]', 0, '2022-10-07 11:54:34', '2022-10-07 11:54:34', '2023-10-07 11:54:34'),
('421b4b7d6cb354a0fc257c5788e7c3aec226efd64a63deb939d7c7a2c3377603154368cd8491b5de', 1, 1, 'SmartApp', '[]', 0, '2022-09-29 04:44:25', '2022-09-29 04:44:25', '2023-09-29 04:44:25'),
('428a965a98c2734c69c22fcd6e8ff4ae5c2783e3618fc53753361c4c28896fe0a80722fb6d4484b6', 2, 1, 'SmartApp', '[]', 0, '2022-09-28 10:58:58', '2022-09-28 10:58:58', '2023-09-28 10:58:58'),
('4409b2b1896e546b5f5bb7cdb766ea35e6c4e82bb91e754b42e131c81ca9100699872f55c68d6aa9', 90, 1, 'SmartApp', '[]', 0, '2022-10-17 07:07:24', '2022-10-17 07:07:24', '2023-10-17 07:07:24'),
('4434b70d69862118f948c6cf66d6ef7a04e2a45d5d9277d7bf62531f018eace32b39d48fb7f5c2f4', 3, 1, 'SmartApp', '[]', 0, '2022-09-28 06:24:24', '2022-09-28 06:24:24', '2023-09-28 06:24:24'),
('453aabad201860adbeebe8906525124a8a3868b1805d6aab509b285cb758dc33de92df8ce5c8db5c', 1, 1, 'SmartApp', '[]', 0, '2022-09-27 13:25:35', '2022-09-27 13:25:35', '2023-09-27 13:25:35'),
('4551aa4b874ff29727c6e341270425ee53bc080d5ecfda8ab9b8f567eee9fbc784e8fb56a0ca2261', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:41:15', '2022-09-30 10:41:15', '2023-09-30 10:41:15'),
('466476f7aea8f77476808e8cd873f4128a120bd4209ceb9ed8f210fe7fe8a891ebb497588ee0551c', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 05:36:39', '2022-10-11 05:36:39', '2023-10-11 05:36:39'),
('46ffb52e896013417fd4f112421a63e3c939b09b2719ba88f11b0c62679dd76672a7c8fabfbc993c', 125, 1, 'SmartApp', '[]', 0, '2022-11-01 11:31:02', '2022-11-01 11:31:02', '2023-11-01 11:31:02'),
('47e01ca9d8bb57a8a5c0832da480c3357d7f8fde0af053c4e5a8a2783ce3baeace51faccf4780123', 1, 1, 'SmartApp', '[]', 0, '2022-09-30 14:07:20', '2022-09-30 14:07:20', '2023-09-30 14:07:20'),
('481365ec0ffb5ee823cfeac6486a24e23ef84e03d96cd16457f8b1082b5ea8c7f6ebe99beb3f923d', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:12:09', '2022-09-29 13:12:09', '2023-09-29 13:12:09'),
('4818230068ce95d81253e4b4e43daeac3ee26dcb1170a2324d38cfab1c9566ca886c5a2b895f877a', 139, 1, 'SmartApp', '[]', 0, '2022-11-01 11:48:19', '2022-11-01 11:48:19', '2023-11-01 11:48:19'),
('486a7ebb0253661440fb989c42479242c70f1d4c9472631d151bb78fe8162d1136f6d7ff853bfd00', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 10:15:29', '2022-10-14 10:15:29', '2023-10-14 10:15:29'),
('48961d99ceef62baa0183d0e06f6a6776616d722785ee2e8c1aaaf9e081d34489f81d6a92e3635f0', 91, 1, 'SmartApp', '[]', 0, '2022-10-17 11:42:46', '2022-10-17 11:42:46', '2023-10-17 11:42:46'),
('4a263b7e810916eb5c0d728f58132c73a813bb7c5e4079e112c91cd06c267c9ecc397c69fbdb2161', 99, 1, 'SmartApp', '[]', 0, '2022-10-19 11:40:59', '2022-10-19 11:40:59', '2023-10-19 11:40:59'),
('4a78de93ea82672bd7255d00c31bb9ab3933ea35f31c69fab4b754146668fc3afbb379e0409e46de', 45, 1, 'SmartApp', '[]', 0, '2022-10-07 10:37:27', '2022-10-07 10:37:27', '2023-10-07 10:37:27'),
('4a8be8776aa5c78547256b92dd3b40d08fd2663a7e6708eda927fca2c1c2ae3ee58fa19b5dd5e314', 20, 1, 'SmartApp', '[]', 0, '2022-09-30 09:16:51', '2022-09-30 09:16:51', '2023-09-30 09:16:51'),
('4ae6ca9271e1a4b27d0a1eaec605de27a4a2e37992b8a9d1a9971419f5eb217175764a0317fb1273', 93, 1, 'SmartApp', '[]', 0, '2022-10-19 07:46:39', '2022-10-19 07:46:39', '2023-10-19 07:46:39'),
('4b31c98e606e645d005a4272e3ae166bdbdf7fdeb9809e844db901152c937ba8f89068be4fb95906', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 10:48:30', '2022-10-14 10:48:30', '2023-10-14 10:48:30'),
('4b4410697b27b96af047b2a6a76a8b47863e638d88a7f56b49e216996a62b1dcc1c2ce82bd318757', 43, 1, 'SmartApp', '[]', 0, '2022-10-07 06:28:20', '2022-10-07 06:28:20', '2023-10-07 06:28:20'),
('4cb4c5b789f3ce5dd9aa5b471ff57fc8bfc493351c3fb27dc30e72df52dec0cd1bd445a73302ac76', 103, 1, 'SmartApp', '[]', 0, '2022-10-19 13:41:19', '2022-10-19 13:41:19', '2023-10-19 13:41:19'),
('4d6eec962fbda546ad78f4d9f607323774ae7e21ae94140d3b93be67d1766015a0670183bd5ef1c9', 92, 1, 'SmartApp', '[]', 0, '2022-10-19 06:41:07', '2022-10-19 06:41:07', '2023-10-19 06:41:07'),
('4d98b7edad23bce4ad5623b8d2b3d560b309d06448b0a146680ba0447124deb38ecb6a19ac2c28b8', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 07:27:45', '2022-10-11 07:27:45', '2023-10-11 07:27:45'),
('4daf05d2ad3ecda2b9b9681ecb4da2b8b207ecca6a571ec89ab30cd67e8d66f19e57c20516aca7c9', 140, 1, 'SmartApp', '[]', 0, '2022-11-01 11:59:52', '2022-11-01 11:59:52', '2023-11-01 11:59:52'),
('4ecc0e521496a3211cf0e0cdf50664ad2622be1aa4a49e53d3531b8a9e0e4acd366f163775d78261', 8, 1, 'SmartApp', '[]', 0, '2022-09-27 14:53:21', '2022-09-27 14:53:21', '2023-09-27 14:53:21'),
('4f2a604a4436e0466863b5772b448d5b8f0b4388a56817b70149ee01d7b88f5f71eb24bdcd72357c', 119, 1, 'SmartApp', '[]', 0, '2022-10-21 06:04:13', '2022-10-21 06:04:13', '2023-10-21 06:04:13'),
('4f42a3de4b86b4d0464f5f2d5b89997fcae4a2ab63f36c8b180b764e80a12ed8314231608ad44400', 1, 1, 'SmartApp', '[]', 0, '2022-09-30 13:44:47', '2022-09-30 13:44:47', '2023-09-30 13:44:47'),
('50c4d468cbb9192b365a7c3ed5d15992060d21794f6c1522ec6fd85be049e3ea12c06d3147029748', 60, 1, 'SmartApp', '[]', 0, '2022-10-21 06:50:23', '2022-10-21 06:50:23', '2023-10-21 06:50:23'),
('50d666792b148c6b29826d35a49bf2f49af4d06f64bf7e79bf61951d25bab177b426b123713dffee', 2, 1, 'SmartApp', '[]', 0, '2022-09-27 14:18:23', '2022-09-27 14:18:23', '2023-09-27 14:18:23'),
('511769e0556502bafa5dee7711b9f03981c809050b4c9311128e7b57677bc17b5427820d81f56289', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:16:27', '2022-09-29 13:16:27', '2023-09-29 13:16:27'),
('51824fe58ff846343c7b8847195e38594688f45d55685b30fa64b108335c75b522749f6ec47dd276', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 09:35:18', '2022-09-30 09:35:18', '2023-09-30 09:35:18'),
('51a18b300de6bce1520dc3d6a119ff22ac94fc4d744f019f2cde74a024dd27896544cf37b89f942d', 1, 1, 'SmartApp', '[]', 0, '2022-10-01 05:30:08', '2022-10-01 05:30:08', '2023-10-01 05:30:08'),
('5240aacab9c06e482a8c8b77e4d1b86b032988dad5bbae9178b64229db43f92d2e66b0599d08b0e0', 60, 1, 'SmartApp', '[]', 0, '2022-10-14 10:45:14', '2022-10-14 10:45:14', '2023-10-14 10:45:14'),
('528b1eccad7a12afde0350c5a80a79f5a6a2cd8d745e76f460dcd870ec6780528bfc0bdffaa7a16c', 120, 1, 'SmartApp', '[]', 0, '2022-10-20 07:15:33', '2022-10-20 07:15:33', '2023-10-20 07:15:33'),
('5385545efd1ef946e8f320ecb783f5bd87f913de1837227ba239c23c0ad926f44c63ac5c99f7a765', 113, 1, 'SmartApp', '[]', 0, '2022-10-20 06:04:05', '2022-10-20 06:04:05', '2023-10-20 06:04:05'),
('5418cebcddd67ce32f1b32ff222f236589ea96e4921731f5c8f107eb580d5e4ea88f83bdffc0902c', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 06:25:35', '2022-10-11 06:25:35', '2023-10-11 06:25:35'),
('542c176db1d9065dcde05f4de9abd99d35b10b01a7d31e98b2657e99e03acdaf098fa09a915c14e2', 16, 1, 'SmartApp', '[]', 0, '2022-09-30 08:38:32', '2022-09-30 08:38:32', '2023-09-30 08:38:32'),
('54649990f7795119ea5c1aca0196436dd36dc8064b8791bd07cb0c00691586f8346cca9fd8d9571c', 96, 1, 'SmartApp', '[]', 0, '2022-10-31 05:39:15', '2022-10-31 05:39:15', '2023-10-31 05:39:15'),
('54dc165f859ef53d36b083686f8dd8c449b21119d6d009b7d447f98104c4fb8a5bd5b796eff271bb', 60, 1, 'SmartApp', '[]', 0, '2022-11-02 12:33:24', '2022-11-02 12:33:24', '2023-11-02 12:33:24'),
('550a76ef6cf428bdaece059cc8c4b81eb344a8e04c221d49e37102955cd54f4e2f27238ba1831ce1', 53, 1, 'SmartApp', '[]', 0, '2022-10-10 05:14:59', '2022-10-10 05:14:59', '2023-10-10 05:14:59'),
('555709a26ee9c08b0f11f264fe6f052a32e9e7c7de5e4b68fd5533d8e04ed00282803739c07c31fb', 60, 1, 'SmartApp', '[]', 0, '2022-11-02 06:38:25', '2022-11-02 06:38:25', '2023-11-02 06:38:25'),
('5581f8f1845d9492492034aea1dc333fa822fed25bb75e7b9c923b80b97d5221df685b7ad7ed3f33', 141, 1, 'SmartApp', '[]', 0, '2022-11-02 12:23:21', '2022-11-02 12:23:21', '2023-11-02 12:23:21'),
('55d7364492df8445525413ce2b2787d9802731a8956fb16d9608becad6c6e72b3e4ff753c62cba95', 60, 1, 'SmartApp', '[]', 0, '2022-10-19 05:26:06', '2022-10-19 05:26:06', '2023-10-19 05:26:06'),
('569bcf6f6612d84a4dac6c1595917473d2ba480d62a25ace218dc24e288e21e7d913717dc01a69dd', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 10:45:17', '2022-10-01 10:45:17', '2023-10-01 10:45:17'),
('569da9d010523e8c8240aa8f540bc79ad1dcccf9f4d10cbd0730333c0ac3d6e1b4be32a4269c4c58', 21, 1, 'SmartApp', '[]', 0, '2022-10-03 05:33:31', '2022-10-03 05:33:31', '2023-10-03 05:33:31'),
('56a427c8d604e233e3a317876dc1ab7c36045fc95c095952ea5608ae7189bf6f7a7d2751175d5a3e', 91, 1, 'SmartApp', '[]', 0, '2022-10-18 10:05:21', '2022-10-18 10:05:21', '2023-10-18 10:05:21'),
('57eb6f390d909f7fb21dea7eaf7a5d2d9eb1231b05e1f0dbca249f85ffe9d76fd827d1605f526331', 1, 1, 'SmartApp', '[]', 0, '2022-10-01 05:52:56', '2022-10-01 05:52:56', '2023-10-01 05:52:56'),
('588019084e8cc5247853a7e82dd64de590b025d70f0ff815917f0948362af842c73cf7954b94a87e', 99, 1, 'SmartApp', '[]', 0, '2022-10-19 12:16:40', '2022-10-19 12:16:40', '2023-10-19 12:16:40'),
('589779e800ad5aa9af49f3d9f42698268aeb30a1f3ea0aa11f28e53d2b5615a7c144958fabba587f', 30, 1, 'SmartApp', '[]', 0, '2022-10-01 09:33:35', '2022-10-01 09:33:35', '2023-10-01 09:33:35'),
('590fee0e94fd365444bfb3681f8ce8fbc9f79e693d2f7193c37f06ceb0a9f3808eb7b30bc4ba8fb0', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:41:14', '2022-09-30 10:41:14', '2023-09-30 10:41:14'),
('598ffcd77c8548e6eeb83d6a8e4cce4e3da3c36a62561f67e8370b115101c7e650e714f5f4523c98', 75, 1, 'SmartApp', '[]', 0, '2022-10-19 09:27:28', '2022-10-19 09:27:28', '2023-10-19 09:27:28'),
('59c61691c46a6d6455721c5efd6de5e4f465c58df91316ad51f89507a0acf225a29d3e6336932b9b', 94, 1, 'SmartApp', '[]', 0, '2022-10-19 09:49:48', '2022-10-19 09:49:48', '2023-10-19 09:49:48'),
('5b3878224ea84f373b7867934c3219a2830ff86220795910e0778476e292e46fd5329747de6db798', 91, 1, 'SmartApp', '[]', 0, '2022-10-18 11:48:36', '2022-10-18 11:48:36', '2023-10-18 11:48:36'),
('5bbde23b69899e39181bb2b7e19e801d8fec3fa275a54a9e7686cd508d329abb6b72218e3d5b6bf1', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 09:35:06', '2022-09-30 09:35:06', '2023-09-30 09:35:06'),
('5c2a88a6cd64a9e89e096a5711fe9d95ff6cc001668873c9e407c014f1753b1ff7b211aa1a25ef56', 127, 1, 'SmartApp', '[]', 0, '2022-11-01 11:29:41', '2022-11-01 11:29:41', '2023-11-01 11:29:41'),
('5c71136c23bb44ade5ea6847a7016e8bb01c3ba2c6dbcae6d01980bb7cbd5c25ff1f02c036ff8526', 74, 1, 'SmartApp', '[]', 0, '2022-10-11 07:42:58', '2022-10-11 07:42:58', '2023-10-11 07:42:58'),
('5cbf168ca3d1fd7ca398030463056a34346700f8defb389acfe3583a0567a5039cec8633f346dbe7', 127, 1, 'SmartApp', '[]', 0, '2022-10-21 06:35:33', '2022-10-21 06:35:33', '2023-10-21 06:35:33'),
('5eb5c05d7da9d26e429dfe1e466584125f689454ce6988ec1e065d57af29d6a3a33494d6e0085f90', 60, 1, 'SmartApp', '[]', 0, '2022-10-14 12:14:36', '2022-10-14 12:14:36', '2023-10-14 12:14:36'),
('5fceb6a18d285796e7361be33448dc0533a5219e7a3078e0444535f7e73e6a02384441827486f633', 73, 1, 'SmartApp', '[]', 0, '2022-10-11 07:42:29', '2022-10-11 07:42:29', '2023-10-11 07:42:29'),
('601299275a6e3e9cabc92c602c3eee4f6c5fde2deb80070f60265cbd64c8b1f625e073c3dfc9f011', 94, 1, 'SmartApp', '[]', 0, '2022-10-19 08:57:58', '2022-10-19 08:57:58', '2023-10-19 08:57:58'),
('6021a1c916c1ee9e5de9b360702dbd98998005394ffd50cc22e6cc929ada235a77bb048a9b29e36a', 128, 1, 'SmartApp', '[]', 0, '2022-10-21 10:13:44', '2022-10-21 10:13:44', '2023-10-21 10:13:44'),
('60f8ea456a014caccd9100077cba9ba0d0f24d94b2941828739ea73ce00d09b8725175264c3716c4', 6, 1, 'SmartApp', '[]', 0, '2022-09-28 11:55:09', '2022-09-28 11:55:09', '2023-09-28 11:55:09'),
('615591e7bba7e09b3af9807318c48dbbd1293c00661d0c1bbf22f5c1278cf378d4cab49625f19149', 2, 1, 'SmartApp', '[]', 0, '2022-09-27 14:25:02', '2022-09-27 14:25:02', '2023-09-27 14:25:02'),
('620e9241f954cd469715ee5fcc9282be9816f6dc46fa40d3c6252f98dec0897d9ea1ef5a48f59ad3', 49, 1, 'SmartApp', '[]', 0, '2022-10-07 11:49:39', '2022-10-07 11:49:39', '2023-10-07 11:49:39'),
('6212cd10cf0bf6418b20b53d1ea8b70f8b92294aa28680efeacfdf0877b034ee95ed14968414060f', 141, 1, 'SmartApp', '[]', 0, '2022-11-02 12:16:35', '2022-11-02 12:16:35', '2023-11-02 12:16:35'),
('624c5cd43f73a94e4e8833a410f3fe41c63157f66034abe5218aaeb92dfe167b7fda4b72ac8143e2', 91, 1, 'SmartApp', '[]', 0, '2022-10-18 05:20:41', '2022-10-18 05:20:41', '2023-10-18 05:20:41'),
('6270f94e3fc95c722931b2816be97719c1bdfc133d9be6449211263c4c94c5580015d08ab4dc2083', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 07:31:37', '2022-10-11 07:31:37', '2023-10-11 07:31:37'),
('62b2504710dace80136b7984b784a282bfaadce78a019f717af2068c38bb698ad3a1c4fcdef2281a', 17, 1, 'SmartApp', '[]', 0, '2022-09-30 08:45:44', '2022-09-30 08:45:44', '2023-09-30 08:45:44'),
('646c0f28c5629fdbe3623b702569efde8d7b39fb320ab23e13782f0e2dca6d318d5094712ec701b2', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 13:55:09', '2022-09-30 13:55:09', '2023-09-30 13:55:09'),
('65b7560b9e1d7f1b6d6007b86571ab288dd03a5df9ee242d7fe51951878ce8a8c743aa6f79214b28', 2, 1, 'SmartApp', '[]', 0, '2022-09-27 14:14:24', '2022-09-27 14:14:24', '2023-09-27 14:14:24'),
('6606caebfb4c2a15e9fab5275d074176acb416ea446c936b74b09363299a9b43f3418e5e630a0aa4', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 12:05:03', '2022-10-01 12:05:03', '2023-10-01 12:05:03'),
('66cfb6c06fa5b819952e3c42918c79a91b7ee98f90604c81da09b88218ba25277ff3911a6dcc7ca3', 11, 1, 'SmartApp', '[]', 0, '2022-09-30 06:51:22', '2022-09-30 06:51:22', '2023-09-30 06:51:22'),
('67fc67cbc0d19c01563325ad331f65266c56073385abe49ee5c6777d6dd2c0178ed8ff3823cdc770', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:41:15', '2022-09-30 10:41:15', '2023-09-30 10:41:15'),
('68059be4d9d90e93007851994509ba9f65925abeba8b68b6c4f92a7cb372968a79e1b0f54b2f41e6', 92, 1, 'SmartApp', '[]', 0, '2022-10-19 04:39:01', '2022-10-19 04:39:01', '2023-10-19 04:39:01'),
('68b57ff3ea0f86effb81d4494eaf02be35d723b1a2db6a018d5098eaad2851e7507b123b699f8aba', 28, 1, 'SmartApp', '[]', 0, '2022-10-19 12:43:06', '2022-10-19 12:43:06', '2023-10-19 12:43:06'),
('69a044fe80f04ead66de5bbf9fcc89e2672cd5f0ae2db225e424cd4e002bfefa1fae7ac1ab043bb8', 140, 1, 'SmartApp', '[]', 0, '2022-11-01 12:00:41', '2022-11-01 12:00:41', '2023-11-01 12:00:41'),
('69d7df13e73ec7c572cba0045b9d61b81ef733f264161e18c4451ed229585a1c7ee35aaa63a30e85', 43, 1, 'SmartApp', '[]', 0, '2022-10-07 07:09:02', '2022-10-07 07:09:02', '2023-10-07 07:09:02'),
('6a55d96e03707700f988c33a6bd1a9aa3b5e9810d339d6ec74e70f7c2fbaf70ccadfd977874d4126', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:29:38', '2022-09-30 10:29:38', '2023-09-30 10:29:38'),
('6aa39773ded4aa7ca1292ce8e22f4e53912b2d3f532cfa5408bc2d2ed4daa616e41b6f805da6d3ff', 31, 1, 'SmartApp', '[]', 0, '2022-10-01 09:44:19', '2022-10-01 09:44:19', '2023-10-01 09:44:19'),
('6c61619402c0803c7cb826888a5789e8460ce79cf6182e899decbe81103119943f868515541ec50f', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 13:03:34', '2022-10-01 13:03:34', '2023-10-01 13:03:34'),
('6cc03df5d6d3485fde1ab528a129b85e47a9204eda1dbfaed7c372e045c1881a224ab7562f6b6419', 141, 1, 'SmartApp', '[]', 0, '2022-11-02 12:10:21', '2022-11-02 12:10:21', '2023-11-02 12:10:21'),
('6cfccc6f7e51ac9176b34d34f906dc1ed034f30536708011d947692b84629d8c50797437696d7035', 2, 1, 'SmartApp', '[]', 0, '2022-09-27 14:33:40', '2022-09-27 14:33:40', '2023-09-27 14:33:40'),
('6e000e500f4453c6de287129d58c014aea30796d7b3db9922a11c05dd456588bb608a6384c824c0c', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 13:04:16', '2022-10-01 13:04:16', '2023-10-01 13:04:16'),
('6ecea54588b4822fb4c02b26f95f38038ae0166fc6af39606086042ab778ac6b34f153ced5f0843e', 51, 1, 'SmartApp', '[]', 0, '2022-10-10 13:17:45', '2022-10-10 13:17:45', '2023-10-10 13:17:45'),
('6f55fbd97a30866a0eccf521fee433de4bbac7c76eddb4f3115ffbf26c028224ee740ff757860ccd', 67, 1, 'SmartApp', '[]', 0, '2022-10-11 07:13:32', '2022-10-11 07:13:32', '2023-10-11 07:13:32'),
('6fb1b5c6ad83c02d507054a2ae46dc452eea14a978a7864b49201f4415bd8370f8c4a75f5e1a72f2', 8, 1, 'SmartApp', '[]', 0, '2022-09-30 09:05:00', '2022-09-30 09:05:00', '2023-09-30 09:05:00'),
('6ff775d4c2e749abf6eeb3bd53d2901ca35e37d70b5df5ee67ed6eb9e0e4d3d83517ba1d26876edf', 45, 1, 'SmartApp', '[]', 0, '2022-10-11 07:58:19', '2022-10-11 07:58:19', '2023-10-11 07:58:19'),
('7025d2aed4ff937527293f61a30641728d10babfb32c0b9d6e01f1af401214261d4f6235e72eb15f', 119, 1, 'SmartApp', '[]', 0, '2022-10-20 07:07:04', '2022-10-20 07:07:04', '2023-10-20 07:07:04'),
('7082a13ccc2561431be546c3b0766a22ef7e6252ab426f05142d8a18ac5262f80d9e1eeee25ee6fe', 2, 1, 'SmartApp', '[]', 0, '2022-09-27 14:21:35', '2022-09-27 14:21:35', '2023-09-27 14:21:35'),
('70c86a404f02cf1fea2bac4b9bf028665b6a52fc936c622060cb042294ab687a996a08de2a0cc9b6', 21, 1, 'SmartApp', '[]', 0, '2022-10-04 04:52:59', '2022-10-04 04:52:59', '2023-10-04 04:52:59'),
('718d8d1a69fd48571ae034df70a35b0edd83033f8e96cc3b01b4cffa16552f13f30e4fdbe5b51ab3', 44, 1, 'SmartApp', '[]', 0, '2022-10-07 07:17:04', '2022-10-07 07:17:04', '2023-10-07 07:17:04'),
('71ac74078b7256a01735cd024f21f3eb9baec0627b0c7c9236232a126da5d8ccee06fbf7bfdb6bb4', 49, 1, 'SmartApp', '[]', 0, '2022-10-07 12:21:05', '2022-10-07 12:21:05', '2023-10-07 12:21:05'),
('72186e1788b7f9e87c9067a8072ab9ea5548a6546ef170d3d05e661e43a2779d45bfbb9e0d633d8a', 45, 1, 'SmartApp', '[]', 0, '2022-10-07 09:48:25', '2022-10-07 09:48:25', '2023-10-07 09:48:25'),
('72b0fa9664e504821793bcf2dc9d1841030ba3a8b9f9af7e97748f79d1f2e743ce54d2e218c01ff5', 92, 1, 'SmartApp', '[]', 0, '2022-10-19 04:34:41', '2022-10-19 04:34:41', '2023-10-19 04:34:41'),
('72e2d8019abd4e4e4671b4a5457d9941f50cc669febbd27fa6464830ee1063b11ed7745605af04b6', 52, 1, 'SmartApp', '[]', 0, '2022-10-10 05:11:40', '2022-10-10 05:11:40', '2023-10-10 05:11:40'),
('731ee808158c844e0a5a4decfeb5810c55439603925660234e1b8548030d67663e536e0266a49a25', 60, 1, 'SmartApp', '[]', 0, '2022-10-20 06:39:34', '2022-10-20 06:39:34', '2023-10-20 06:39:34'),
('73af0b5861aaafa7582cc6dbe38f39ed93839763caaea7fa53e41d086c9a66a4fc57cc3365710a7d', 28, 1, 'SmartApp', '[]', 0, '2022-10-07 12:02:33', '2022-10-07 12:02:33', '2023-10-07 12:02:33'),
('74cb84c9cecd4f9da774fde3df97101969944d3e13eb0eb7459b65e7eddd314f915320f12f4abd75', 92, 1, 'SmartApp', '[]', 0, '2022-10-19 06:07:39', '2022-10-19 06:07:39', '2023-10-19 06:07:39'),
('756c9241f240928bb86a2e5f656be2239abd6db836398fb1e3ddaa5a29ed25eaa732e36411adb306', 129, 1, 'SmartApp', '[]', 0, '2022-11-01 11:40:22', '2022-11-01 11:40:22', '2023-11-01 11:40:22'),
('75776d58b4467b332d123b7227c2fe408195e0b1fdf934daf46b6c38aa022febff38edacafce2aee', 99, 1, 'SmartApp', '[]', 0, '2022-10-19 12:42:46', '2022-10-19 12:42:46', '2023-10-19 12:42:46'),
('7587cbc3a17637b7abdfceace3f07b118754799b5e272067029f1646c3286d3aaabbbd10255f75f9', 21, 1, 'SmartApp', '[]', 0, '2022-10-04 11:47:49', '2022-10-04 11:47:49', '2023-10-04 11:47:49'),
('75946dbff610ccc7ec5b2464b7970a5539bc0c9eb8d039c0693746d9ef06e71e5b70308e24c56afb', 51, 1, 'SmartApp', '[]', 0, '2022-10-10 13:51:47', '2022-10-10 13:51:47', '2023-10-10 13:51:47'),
('7615f360ee05b9a60d5037f2915e132479649863ff463b2d105558ab8d129050b5be075d6ea67107', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 09:48:14', '2022-10-01 09:48:14', '2023-10-01 09:48:14'),
('767fae87666c81f15cf7874c078ed68852cf2cb8f2aaee3e5f4e50690047a0f0ed5028d06389e725', 21, 1, 'SmartApp', '[]', 0, '2022-10-08 11:55:39', '2022-10-08 11:55:39', '2023-10-08 11:55:39'),
('7753ded6e7883f26bee6d0b370d3afaff1e78139d7e0011f9c2dba9f20fdb488115e42fbb969a993', 60, 1, 'SmartApp', '[]', 0, '2022-11-02 13:13:29', '2022-11-02 13:13:29', '2023-11-02 13:13:29'),
('7899b670ef64be81e992ff40ce540b65133d865bc803d00f6eacfea719695d84b924be4ac3282600', 91, 1, 'SmartApp', '[]', 0, '2022-10-18 06:17:03', '2022-10-18 06:17:03', '2023-10-18 06:17:03'),
('78f1c7826135bebd99bb17e627d7e5e8aa465ddf0a92c2780e8249274cc841ae61763b230830f59f', 75, 1, 'SmartApp', '[]', 0, '2022-10-18 13:44:56', '2022-10-18 13:44:56', '2023-10-18 13:44:56'),
('790233a37d99355634db892106725ee4985664b21d70b0404e7f1bf58d71d365334d23660afa4dd9', 1, 1, 'SmartApp', '[]', 0, '2022-09-27 14:02:59', '2022-09-27 14:02:59', '2023-09-27 14:02:59'),
('7967308950d084eb8bfbedf394c70d6218165ca6b267510ff1dc02edadbab550693faf6b68d3204a', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:41:14', '2022-09-30 10:41:14', '2023-09-30 10:41:14'),
('79de9427fbfc1163db0902341d5dffb8f0c8b47cf3db4ea0acb5cf2e04a6135723e9e741b3c30242', 61, 1, 'SmartApp', '[]', 0, '2022-10-11 05:07:24', '2022-10-11 05:07:24', '2023-10-11 05:07:24'),
('7a4c5c71bfc3c31e88001322a4628b90e14c6ad7fee010229e8dba94109328e7fc111f4559b7cee0', 60, 1, 'SmartApp', '[]', 0, '2022-10-20 08:57:16', '2022-10-20 08:57:16', '2023-10-20 08:57:16'),
('7af191bd46227b8245d85a31b04618294cc684e2bf4db262628f9da26a10c27635d8b74afd35a298', 60, 1, 'SmartApp', '[]', 0, '2022-10-20 05:57:03', '2022-10-20 05:57:03', '2023-10-20 05:57:03'),
('7c3fc4c95696400997cab690317faf697326bc13e5aec126119651cddf99537844f05f6436fda882', 21, 1, 'SmartApp', '[]', 0, '2022-10-08 12:09:49', '2022-10-08 12:09:49', '2023-10-08 12:09:49'),
('7c46189ff60db28ffa5723eb3ec310444fd9805ee8e5af31b76c37f41940f110e6d53f90885b58df', 66, 1, 'SmartApp', '[]', 0, '2022-10-11 06:50:04', '2022-10-11 06:50:04', '2023-10-11 06:50:04'),
('7cc8ef4e9995dcfc868c7ea1908b861d2f84eb959bf70857a2c5f66b10eea93730fc306a1eccc407', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:33:03', '2022-09-30 10:33:03', '2023-09-30 10:33:03'),
('7e844c6070273b13ab1d720670401b71717c9c6b523eb337db849c8fea4b0533b91ca5f8460291f6', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 12:00:52', '2022-10-14 12:00:52', '2023-10-14 12:00:52'),
('7f9a1cc4dd46a594266962cd12dfbbb7e567da96ed04853de2d0236efa1eee3335fa36e33890df9f', 108, 1, 'SmartApp', '[]', 0, '2022-10-20 04:58:07', '2022-10-20 04:58:07', '2023-10-20 04:58:07'),
('7faf4bed8204982de18bb353bb87d8bf52566cbf5148cec5000c438c2aea055f28d198c7407bbe58', 2, 1, 'SmartApp', '[]', 0, '2022-09-27 13:30:32', '2022-09-27 13:30:32', '2023-09-27 13:30:32'),
('807c6a2ee4fe3c379e9848ac83845d1c75d5bc23e8b6855c7bad334b90c0451ce9f90dca6ea8a2c5', 119, 1, 'SmartApp', '[]', 0, '2022-10-21 06:13:05', '2022-10-21 06:13:05', '2023-10-21 06:13:05'),
('821aacd252a83640646fba41199a9e239f46bb2a7ddcb279fe8983c522d773ce5acd010db8182ffc', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:29:38', '2022-09-30 10:29:38', '2023-09-30 10:29:38'),
('825b083cbd00d4dccc7b28a45259554a395407f39d1dbc3cc69d07d3112d31d12a37f20eaa8503bb', 3, 1, 'SmartApp', '[]', 0, '2022-09-27 14:23:54', '2022-09-27 14:23:54', '2023-09-27 14:23:54'),
('8290cb8e6f28310c1bacb918c4a41209a7911001fbbbbf1c41a0157d7d69a079ff8cf7605e75b504', 6, 1, 'SmartApp', '[]', 0, '2022-09-27 14:36:35', '2022-09-27 14:36:35', '2023-09-27 14:36:35'),
('829b7d247901e2cb2ccdf9f58b5faaec7d8cee1421936e6a428e970a008ffecd89e4d03265c22f8f', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:16:25', '2022-09-29 13:16:25', '2023-09-29 13:16:25'),
('82c85af362548a2d8954784da8675c485c2a8d8e6401be932c89635c0bba5eb98a00dd7f529cc0ec', 26, 1, 'SmartApp', '[]', 0, '2022-10-01 08:44:23', '2022-10-01 08:44:23', '2023-10-01 08:44:23'),
('82f0b9605a7ff1fe925075cc717ffe076c5b8100b31debc044cc72432ce47a7b93ee9cdbbdb5bbd8', 28, 1, 'SmartApp', '[]', 0, '2022-10-13 06:34:28', '2022-10-13 06:34:28', '2023-10-13 06:34:28'),
('833d9464f8ab6c1c9b7a265516491f77d3c08b2d2bf283b4df9c384c629585d9b1d44fcab0dc3773', 129, 1, 'SmartApp', '[]', 0, '2022-10-21 11:52:13', '2022-10-21 11:52:13', '2023-10-21 11:52:13'),
('834ee15908648f7233eb4e7e0b92c96a0e8299b80a22d115fd0be93f2040e90cabc7acd27923b156', 8, 1, 'SmartApp', '[]', 0, '2022-09-30 07:11:13', '2022-09-30 07:11:13', '2023-09-30 07:11:13'),
('850c211138e5a949856a4e953502be26ce0c76385b977df086c5cdf03a8b4f1bfe82c1a70d8c5ad5', 92, 1, 'SmartApp', '[]', 0, '2022-10-19 04:35:06', '2022-10-19 04:35:06', '2023-10-19 04:35:06'),
('85d8b75a55774665c4852de6f6cb5985ddffaa0c48aca03d51c7dac971f67dd866da244052c88782', 28, 1, 'SmartApp', '[]', 0, '2022-10-10 12:26:18', '2022-10-10 12:26:18', '2023-10-10 12:26:18'),
('866fb82c0a2169aaf5e67921455e5c49478364a5f8288cd99507a51d8189cfbe797b930ea3a8f0c0', 39, 1, 'SmartApp', '[]', 0, '2022-10-01 13:40:45', '2022-10-01 13:40:45', '2023-10-01 13:40:45'),
('86adde73ff52c09a28121bb813e6c0a295d5d527ff333cdf5d65ddf74360068e4f8f99569017e5d6', 4, 1, 'SmartApp', '[]', 0, '2022-09-27 13:42:44', '2022-09-27 13:42:44', '2023-09-27 13:42:44'),
('8874a47f35d008a89c4f68117802bac03fc2f9b6d47c4e91027e0fea189b341e7c3cc8e4a8c7dc08', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:31:05', '2022-09-30 10:31:05', '2023-09-30 10:31:05'),
('89ffb83997143b9ad2bec26b5ae9cb5f75c6cafcca6da689eba2345b668bfd9aff0fc113c7df8162', 91, 1, 'SmartApp', '[]', 0, '2022-10-17 11:43:45', '2022-10-17 11:43:45', '2023-10-17 11:43:45'),
('8a255a239a7060893820e555e9afc3cef8b6e28a8beef3d340d6eae445e53c62c000b365d049b3a4', 113, 1, 'SmartApp', '[]', 0, '2022-10-20 05:37:21', '2022-10-20 05:37:21', '2023-10-20 05:37:21'),
('8a9053fbb7614ee9861cfdeae14a5f9370068a6e87455ba40629c3116ad841440507ccec27a1a811', 5, 1, 'SmartApp', '[]', 0, '2022-09-28 05:57:29', '2022-09-28 05:57:29', '2023-09-28 05:57:29'),
('8b24e1cbdafffe4d7e8f462a34606bd0b5a6aff58f32101f2130722efda251a1c4a30d9ec8d1de7a', 96, 1, 'SmartApp', '[]', 0, '2022-10-19 10:45:44', '2022-10-19 10:45:44', '2023-10-19 10:45:44'),
('8b2e30556511c612272b5edb7b92f5ed7158aa9f2bb1facf91b99724c384054617ebaccbeb346ed3', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:29:38', '2022-09-30 10:29:38', '2023-09-30 10:29:38'),
('8b3a544e362125604fd3c2009575cb858b03f08688ec6d1cbb9a1d0a942abbf15782ea8bbeced22b', 28, 1, 'SmartApp', '[]', 0, '2022-10-01 08:47:35', '2022-10-01 08:47:35', '2023-10-01 08:47:35'),
('8b3fe59b24ba76958961b0c7d75ee45c5d5fe3f1e155fb8879c8ed54ca8e473bb1736e9bd22fe004', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 13:23:31', '2022-10-01 13:23:31', '2023-10-01 13:23:31'),
('8c3b0b60851455f8c608ff5b015a62e89271878850767652e41d0eff0d2ac8e569f6b685b3c4b0c4', 96, 1, 'SmartApp', '[]', 0, '2022-10-31 05:26:26', '2022-10-31 05:26:26', '2023-10-31 05:26:26'),
('8d396c2da37602d9fcb3bd76b291ee65569df4116eee4fc3c7bf17cd1b5f2f92457d447785227cce', 58, 1, 'SmartApp', '[]', 0, '2022-10-10 11:17:40', '2022-10-10 11:17:40', '2023-10-10 11:17:40');
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('8d5b72ae48b8aa0c15a56d87d6971ba9359feb502ffd7fc3754a5d607adf6cb39c2871328d55b770', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:41:14', '2022-09-30 10:41:14', '2023-09-30 10:41:14'),
('8e33686cec94543d4edd2a1f5a3ac888ae14dffc17402edd3485b9d1bf14c827f8790ee7b9c5c968', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 13:01:27', '2022-10-01 13:01:27', '2023-10-01 13:01:27'),
('8e6f7785a95aaad1d8de83c78e26ea3280abf8ad2908f72f3dbbd8968dd776f18ebc1599e82c0cdb', 75, 1, 'SmartApp', '[]', 0, '2022-10-18 13:38:48', '2022-10-18 13:38:48', '2023-10-18 13:38:48'),
('8e752986699c78cf25677d35f863225395ab8e7a176879602d93e07cf837ce6bdd12482a8e0db274', 101, 1, 'SmartApp', '[]', 0, '2022-10-19 13:34:38', '2022-10-19 13:34:38', '2023-10-19 13:34:38'),
('8e8674cc05e973c887f8c94401fa0f3089f207a90a7e473b00ec796acf63b8ea1e3ab62e1c603c6a', 29, 1, 'SmartApp', '[]', 0, '2022-10-01 09:30:13', '2022-10-01 09:30:13', '2023-10-01 09:30:13'),
('8e8d5e4b11a423765ae237aef443e0bf05b3ebd9292a774d70e884a86af0127510ec220d5fa4b7c5', 1, 1, 'SmartApp', '[]', 0, '2022-09-27 14:32:34', '2022-09-27 14:32:34', '2023-09-27 14:32:34'),
('8e99da4555781d793671b9d2cec1a4cd9df3765349b45d5bf57d4272a1994f44a1b8ff6664bba2d0', 19, 1, 'SmartApp', '[]', 0, '2022-09-30 09:07:35', '2022-09-30 09:07:35', '2023-09-30 09:07:35'),
('8ec161e7e9b30d3daace6cd39a5fa32d71b9b19a2cb803930da5b634ea7ceddff378151f272d50af', 85, 1, 'SmartApp', '[]', 0, '2022-11-01 10:32:28', '2022-11-01 10:32:28', '2023-11-01 10:32:28'),
('8f94bc6953e6ca7df1e091566069a416ce3fcce62c13fcbbc7ba77dd0a9b7302a8289f75b1ce434d', 129, 1, 'SmartApp', '[]', 0, '2022-10-21 11:48:01', '2022-10-21 11:48:01', '2023-10-21 11:48:01'),
('8fb0ca4d3c6b96c30f773205dac0dd1efe1eef027a4af00377ee51c6ec7dee157b11f01b59c2c848', 129, 1, 'SmartApp', '[]', 0, '2022-10-21 12:13:24', '2022-10-21 12:13:24', '2023-10-21 12:13:24'),
('90a4df4a087a0676bae0780c30e66aac3ee8291d428753700cad143a709dcc248bb6dd6df97e2468', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 06:48:44', '2022-10-11 06:48:44', '2023-10-11 06:48:44'),
('915f28d865d5ec27c805f64f0ecf5d08a72102d366361849dd5aa6bdf976b0c042e2f9734726c243', 21, 1, 'SmartApp', '[]', 0, '2022-10-08 12:06:28', '2022-10-08 12:06:28', '2023-10-08 12:06:28'),
('916e9e571a3e05e7309bc5fed387a570813610c11831c4cb0fe13b9195eccb2a8716ed4dcf0865d7', 21, 1, 'SmartApp', '[]', 0, '2022-10-04 12:30:59', '2022-10-04 12:30:59', '2023-10-04 12:30:59'),
('927afa7eb1dc929a9cda1382c2a8e6fb51b279b2480051d0093b65a9140c09fd1c0bd66d31dc8f1f', 51, 1, 'SmartApp', '[]', 0, '2022-10-10 12:52:02', '2022-10-10 12:52:02', '2023-10-10 12:52:02'),
('92db665341526b78e30608bb1abfaae8850aede6d9c5011f15f5006a027567c8cf237e4968f5bbfb', 60, 1, 'SmartApp', '[]', 0, '2022-10-17 08:43:26', '2022-10-17 08:43:26', '2023-10-17 08:43:26'),
('948fc656c8146f8e897a17a480a5a8ef554a674cb50f196d8596f4c1c5260d2e2aab88dc944a6b48', 56, 1, 'SmartApp', '[]', 0, '2022-10-10 05:29:30', '2022-10-10 05:29:30', '2023-10-10 05:29:30'),
('94bf220eddf975080f49692646538bb048255286c3b6349bb4c7f6590c89b9f619bcf4b3dab8bd49', 128, 1, 'SmartApp', '[]', 0, '2022-10-21 10:13:59', '2022-10-21 10:13:59', '2023-10-21 10:13:59'),
('95a9d4c44f45d20bb6333933530b8b743c969e1a730b69afbffb6449c563049e65daca1856d63894', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 13:12:24', '2022-10-01 13:12:24', '2023-10-01 13:12:24'),
('9628d3c32880fa8133b1c449672160fde567c20645a1b9f842bf721a1ec4d24900f4bfed7fe027c9', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 12:13:15', '2022-10-01 12:13:15', '2023-10-01 12:13:15'),
('971c1eb3ed041c8a90ef8bb45a013bc83584ffb093a12cab249ed6eb9ff4aac174f827d878f41812', 1, 1, 'SmartApp', '[]', 0, '2022-09-27 14:19:55', '2022-09-27 14:19:55', '2023-09-27 14:19:55'),
('9728eb33d9a5da2cf8974cfab4123f026fbf3264c2cc07674749baa71a627c2c653a7275fe07af31', 128, 1, 'SmartApp', '[]', 0, '2022-10-21 06:43:00', '2022-10-21 06:43:00', '2023-10-21 06:43:00'),
('975ca3527db7c6bebd06fa6332a5892bbd7b734413bea95ac5e681de1654a7eaef3e1565457ac11b', 28, 1, 'SmartApp', '[]', 0, '2022-10-14 07:11:18', '2022-10-14 07:11:18', '2023-10-14 07:11:18'),
('980d48e7e1c244ebf2930b2efc0bb700541511a8a433a5f79b3c7b48d9a53170bbd0b8a3ddfc01e7', 138, 1, 'SmartApp', '[]', 0, '2022-11-01 11:18:48', '2022-11-01 11:18:48', '2023-11-01 11:18:48'),
('983e15201cc37a32cc5f3355a06be7df1e733099501c0b375772d69f820909afa9d582cbee8c43a1', 33, 1, 'SmartApp', '[]', 0, '2022-10-01 09:54:28', '2022-10-01 09:54:28', '2023-10-01 09:54:28'),
('98bf5ca09ae19d4a7037a650db301c7808001a418ce24ebc2014558ea6659791964e67f9d8b84c9d', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 10:32:33', '2022-10-14 10:32:33', '2023-10-14 10:32:33'),
('9909c8b4c021901cb8f9428eb5e711e1520cd0a49aa4da87931c03fd7e2871e10cf18227bf641019', 90, 1, 'SmartApp', '[]', 0, '2022-11-01 11:54:43', '2022-11-01 11:54:43', '2023-11-01 11:54:43'),
('992e79b157ee074713fa9df9062143c15105d669e1d20de4eb508b63bbedadbd8839e2570d928442', 60, 1, 'SmartApp', '[]', 0, '2022-10-21 14:37:39', '2022-10-21 14:37:39', '2023-10-21 14:37:39'),
('993c73a904ed298fbba9b7a80810d42f0a129fbaada789bdb6e39e3c6c3a17b5aea98d09100f7bb8', 90, 1, 'SmartApp', '[]', 0, '2022-10-17 07:42:12', '2022-10-17 07:42:12', '2023-10-17 07:42:12'),
('99ad639722de4fe152742bb2e0807a0e7fb99b495a246a46d9d1247f550826492d47ce65fb65d5bf', 3, 1, 'SmartApp', '[]', 0, '2022-09-27 14:34:14', '2022-09-27 14:34:14', '2023-09-27 14:34:14'),
('9a1bbb6f702d114dc3a911320627b1b0c8d55a75dadc888d4772669ca922a71c2f95aee27340c2d1', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:29:23', '2022-09-30 10:29:23', '2023-09-30 10:29:23'),
('9afd498e2479fa92e4332323fc50232fece5833e2a3ca4a4ceacead7e813d94180527f7c3d400ff7', 34, 1, 'SmartApp', '[]', 0, '2022-10-01 09:59:30', '2022-10-01 09:59:30', '2023-10-01 09:59:30'),
('9c5da550f2e392f2b0057da761ee29ddd526af27f2eeca3caa7defd4d82ef11bb67a0765f5ecd07a', 45, 1, 'SmartApp', '[]', 0, '2022-10-07 09:34:38', '2022-10-07 09:34:38', '2023-10-07 09:34:38'),
('9d3601eb44cd69bf1d445a5804bd4e661142fa7509dadac20f85673438eef7d56097a85e02f41498', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:29:22', '2022-09-30 10:29:22', '2023-09-30 10:29:22'),
('9e22a0cb7c38c8bea2b4001937b0efe0bef2fc8c88c542eb47db2ac46a28c0d128acea3a4202609d', 21, 1, 'SmartApp', '[]', 0, '2022-10-04 13:06:24', '2022-10-04 13:06:24', '2023-10-04 13:06:24'),
('9e82817ad2441845bd2265e5939d4856c5af42bdc3633ae2e2aafb918a52210770a88c0f05e96fc9', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:41:15', '2022-09-30 10:41:15', '2023-09-30 10:41:15'),
('9f45214389f4493a605379e2d5ac69aab0ec26c727e1416532610e0d1108e32019390e769c7e3668', 60, 1, 'SmartApp', '[]', 0, '2022-10-20 08:25:56', '2022-10-20 08:25:56', '2023-10-20 08:25:56'),
('9f675e63cae1f3edbe2d7b2c6cfe9873105e6d37c75c7a7d1986cab5bdbb149aa5bc639515f1fbbd', 60, 1, 'SmartApp', '[]', 0, '2022-11-01 10:24:24', '2022-11-01 10:24:24', '2023-11-01 10:24:24'),
('9fe5c474ed92a1dedff061b7060e833e3c38853c87af5068090fe0d9f521cfebde0767b8de5461a3', 107, 1, 'SmartApp', '[]', 0, '2022-10-20 04:56:42', '2022-10-20 04:56:42', '2023-10-20 04:56:42'),
('a061353cd488f17a6596e9ccbf399ba88749450807111f0d5acaccdc5e20bd51d6a9ae34a6d01f8d', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:16:27', '2022-09-29 13:16:27', '2023-09-29 13:16:27'),
('a113dbb1d67f228433fc8a8dba35a63ffc8c6d7ab976888c0ccfdf69916e93b7235cba60a201816e', 29, 1, 'SmartApp', '[]', 0, '2022-10-03 05:24:04', '2022-10-03 05:24:04', '2023-10-03 05:24:04'),
('a1270abf8deb111079a5120f9f4304746bc34a3697126423193d8f4b9f3578f4d77a3f51a8d7bc0c', 104, 1, 'SmartApp', '[]', 0, '2022-10-20 04:21:47', '2022-10-20 04:21:47', '2023-10-20 04:21:47'),
('a149d4c02c8806256610935deb40a7a2b13af69689ac3148c5ec55d17618a288429987977f1eb74b', 28, 1, 'SmartApp', '[]', 0, '2022-10-12 10:10:04', '2022-10-12 10:10:04', '2023-10-12 10:10:04'),
('a16f2f07eec1bb8354159c54d696be4cfec7865e8d13f110d8a8f4e958bda5b5a010faeba83ae4b4', 118, 1, 'SmartApp', '[]', 0, '2022-10-20 10:04:05', '2022-10-20 10:04:05', '2023-10-20 10:04:05'),
('a1b2e55eb8e3d81b366479428a24a301c1ca55e40851b62e001874991629785ead92575e85839aee', 71, 1, 'SmartApp', '[]', 0, '2022-10-11 07:33:38', '2022-10-11 07:33:38', '2023-10-11 07:33:38'),
('a26905d128166a6bb4a4cf5e137a9938caf2f1970766144f9a8c84abfe4c49751777e9956c61fb44', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:40:38', '2022-09-29 13:40:38', '2023-09-29 13:40:38'),
('a2c8bb2c0184be1c57e47d64add2001182cc9fbb854f618f04ae56861a8d1b032a7953046fc550a7', 2, 1, 'SmartApp', '[]', 0, '2022-09-28 05:37:32', '2022-09-28 05:37:32', '2023-09-28 05:37:32'),
('a355a509ca3a62b6964c0104213754a796f9b03e060848a2cfaa8a4db0928a4908e3315dec022bf3', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 04:57:24', '2022-10-11 04:57:24', '2023-10-11 04:57:24'),
('a451588547935b563859bacf13b59158e01c7ef7bc3187c8df14ea2dcf4b637b10ba3daee73cecfc', 96, 1, 'SmartApp', '[]', 0, '2022-10-31 05:43:16', '2022-10-31 05:43:16', '2023-10-31 05:43:16'),
('a4b201d7f4d8b30afbf0e9fca4b549c158481a0644799c1084ae68b8abf724f81e4bd38e804ab8d0', 25, 1, 'SmartApp', '[]', 0, '2022-10-07 10:07:18', '2022-10-07 10:07:18', '2023-10-07 10:07:18'),
('a4cdd03748f463fcc7667ae0c160d8802cdabda52b9b1e5752efadb4dddae96f3ad36d2f137cec14', 85, 1, 'SmartApp', '[]', 0, '2022-11-01 10:25:52', '2022-11-01 10:25:52', '2023-11-01 10:25:52'),
('a59157150afcee6de84547bec210cdc258b6e2813560ab8e7ce24836f7b83cf9730362f561b85f16', 90, 1, 'SmartApp', '[]', 0, '2022-10-17 07:04:48', '2022-10-17 07:04:48', '2023-10-17 07:04:48'),
('a5a94cb977bcef60e867a4839785cb45d1bc198c8e4cad282008547456027d84f70efb9760e1d870', 2, 1, 'SmartApp', '[]', 0, '2022-09-28 06:23:04', '2022-09-28 06:23:04', '2023-09-28 06:23:04'),
('a65eff06be02dcaf6f91b121b4943d1d426e8b7eaa69ea712e57922a62ca07852a0b816d7c6b4482', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 13:09:20', '2022-10-01 13:09:20', '2023-10-01 13:09:20'),
('a68787d3a002fcafa5071dc4b418b675cd6e7f8ff5f6772231b223f328e896be30d590f9c4d90869', 109, 1, 'SmartApp', '[]', 0, '2022-10-20 05:04:05', '2022-10-20 05:04:05', '2023-10-20 05:04:05'),
('a6b8923c2ecd2efe4639d2286b453cad462176463fcf8518e00d9e0fb54b96958e5624c3ca0d2887', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:18:46', '2022-09-29 13:18:46', '2023-09-29 13:18:46'),
('a749ec465f17add26e99bcafd2882217936171508b1556eefe2c882bc44e41010508be49a36ea346', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 08:16:31', '2022-10-11 08:16:31', '2023-10-11 08:16:31'),
('a77ccb50a7607db5b2111308029f1917ddcb35b3c0b6ef43b7183e6b3033786e8f832f902674f0c1', 138, 1, 'SmartApp', '[]', 0, '2022-11-01 11:20:03', '2022-11-01 11:20:03', '2023-11-01 11:20:03'),
('a827d86f7b100c3fcd6b3c00a144177e4cd4b19a0dca6155de01a5c595af73001d1acb0a4235ae9a', 96, 1, 'SmartApp', '[]', 0, '2022-10-31 05:35:45', '2022-10-31 05:35:45', '2023-10-31 05:35:45'),
('a82cbf5ccfb63340594ab73d561fa38ffc42da90bb8137c90faa59147f06118606a55e3f54260165', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:13:14', '2022-09-29 13:13:14', '2023-09-29 13:13:14'),
('a8f033ef503010c155042e734f96e4f5a8c58b463049da84ddd5ca240af86d58439a69d66e76abf8', 60, 1, 'SmartApp', '[]', 0, '2022-10-20 06:49:07', '2022-10-20 06:49:07', '2023-10-20 06:49:07'),
('a8ffccb6718958b0921183a9e1c8c4673b9110a7216fdd9c7f574ef5d3bf38159e254889270454cb', 6, 1, 'SmartApp', '[]', 0, '2022-09-27 13:59:53', '2022-09-27 13:59:53', '2023-09-27 13:59:53'),
('a912ae8ea3d1575df0fcd3164026d3c4ba0c3ac64e3dfd1d20f96532120862c1718e4230ab1c1d1b', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 11:28:40', '2022-10-01 11:28:40', '2023-10-01 11:28:40'),
('aa316c6cf72244cf3f3a94f07ccf37cabb98c045f5f03b44b8d19d3c98b3800336499b3002e90cac', 28, 1, 'SmartApp', '[]', 0, '2022-10-08 10:55:55', '2022-10-08 10:55:55', '2023-10-08 10:55:55'),
('aa7bafe9651264083d892751263a05a8bbdf27fe553ee3bcdaa9a67ac272df080ff1e23672017f2e', 25, 1, 'SmartApp', '[]', 0, '2022-10-07 06:52:18', '2022-10-07 06:52:18', '2023-10-07 06:52:18'),
('aa8bc8177636f8fb9476000224dd299f9b2e2eec8b67710d3ab03ca59f67f6cb583f436f2b1607c0', 13, 1, 'SmartApp', '[]', 0, '2022-09-30 07:09:20', '2022-09-30 07:09:20', '2023-09-30 07:09:20'),
('aaa008edbee49b111ceae99d84cd52de009366ca470879af59fd2dd8f48a97434670971bfbcce49f', 60, 1, 'SmartApp', '[]', 0, '2022-10-17 06:29:42', '2022-10-17 06:29:42', '2023-10-17 06:29:42'),
('aab56e662485e134e7c30563e9931042d150a80548d8c3f7a1b34de17880fbf8e1e8f12c177e9b5d', 2, 1, 'SmartApp', '[]', 0, '2022-09-27 14:24:34', '2022-09-27 14:24:34', '2023-09-27 14:24:34'),
('ab2098f276814055a3cf920f9c25caa96d04b18b11422b4177e797393fa58834d1b11fa6e19ab8a2', 112, 1, 'SmartApp', '[]', 0, '2022-10-20 05:31:20', '2022-10-20 05:31:20', '2023-10-20 05:31:20'),
('abe020379cb95d61b8f14d6eac54fe536126073236a8e3f198f336a1563d07374c9e8956a1b0e5ee', 1, 1, 'SmartApp', '[]', 0, '2022-09-28 08:00:53', '2022-09-28 08:00:53', '2023-09-28 08:00:53'),
('ac72a51dc2642170ef3fa932df7226f5d69ca73c9272e2cf23eb0ae99995c79e34398da70d8d1a7e', 75, 1, 'SmartApp', '[]', 0, '2022-10-17 14:46:35', '2022-10-17 14:46:35', '2023-10-17 14:46:35'),
('ae7cb1562dcc1384ab543745ce0e83c66e046f91e2f1d509cc1a620618f9a10ee57d7709fac80f21', 51, 1, 'SmartApp', '[]', 0, '2022-10-10 11:40:35', '2022-10-10 11:40:35', '2023-10-10 11:40:35'),
('aeab010694da0481dd90743c4c7745700c0ecf62282bd174aa6c95314d5ec6f485d712d7343aee6e', 60, 1, 'SmartApp', '[]', 0, '2022-10-12 06:49:43', '2022-10-12 06:49:43', '2023-10-12 06:49:43'),
('aed075268cb8e31b43aca519a20bba1d28eda87ee6c4d4058724d992b8a330adcea1a0f236f9c656', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 13:22:31', '2022-10-01 13:22:31', '2023-10-01 13:22:31'),
('afa59978d97fd12e9acc40eae0644ceee0a60b32917840a5e7ae8bc1251dcd0c6dfe4912968f0ad9', 2, 1, 'SmartApp', '[]', 0, '2022-09-27 14:19:34', '2022-09-27 14:19:34', '2023-09-27 14:19:34'),
('b0ec8f220c8ca0a0ce3caccfe7067503cb3c3861fad101141eb57d7b92b573245682eca0e42d08d2', 127, 1, 'SmartApp', '[]', 0, '2022-11-01 11:28:42', '2022-11-01 11:28:42', '2023-11-01 11:28:42'),
('b0fc87bef20d593637a7948dbe32cc599e8a17ede77816f7f6bd37241ef2573184106fb22090dd63', 2, 1, 'SmartApp', '[]', 0, '2022-09-27 14:11:50', '2022-09-27 14:11:50', '2023-09-27 14:11:50'),
('b10e360f67a4f79e47041d83280d69b2d5d161769e88bf5cf6d4f43c129ca3164d83106e5c4fc412', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 08:36:02', '2022-10-01 08:36:02', '2023-10-01 08:36:02'),
('b16db84539afc7f8c795a7608cf09dd840af40e09632d5e0096ddc82c8819eb43a255d197ac140c9', 60, 1, 'SmartApp', '[]', 0, '2022-10-19 07:06:45', '2022-10-19 07:06:45', '2023-10-19 07:06:45'),
('b2a06981b4d0095a83737481540144e82c5c87388505ed9455203f4182868b893c18b6a2afd281f5', 1, 1, 'SmartApp', '[]', 0, '2022-09-29 05:38:51', '2022-09-29 05:38:51', '2023-09-29 05:38:51'),
('b2e6cf46aed49fa629fd7ef0d0fdaf28bc6d8177d6879e831fca31d078b8ba40d991ded14b3a9e85', 60, 1, 'SmartApp', '[]', 0, '2022-11-02 11:26:07', '2022-11-02 11:26:07', '2023-11-02 11:26:07'),
('b379d41e65ff1890960a522d307f19b3892300143648f521eaf8df97765eecec804ccc772d983b20', 45, 1, 'SmartApp', '[]', 0, '2022-10-07 09:52:33', '2022-10-07 09:52:33', '2023-10-07 09:52:33'),
('b386a9c80faf79ba45ba4988fd2ebef2d168ee3d63b93f91c8cb78538211536cff8a22b0664f3a69', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:07:24', '2022-09-29 13:07:24', '2023-09-29 13:07:24'),
('b3907858504d858d614474bb854ad7014838176e8668d71414dc7f358d663a19ed878a78a4d67d27', 44, 1, 'SmartApp', '[]', 0, '2022-10-07 07:22:55', '2022-10-07 07:22:55', '2023-10-07 07:22:55'),
('b3bf90846b63dd4dcf026a433b56bce1d609ccee3a8c5adbf14da23f1c2792f2cd044db2709443f5', 60, 1, 'SmartApp', '[]', 0, '2022-10-18 06:25:19', '2022-10-18 06:25:19', '2023-10-18 06:25:19'),
('b3c6dc4f5ae7e2903eca63ed4813d320876d5e43d8552c7f267b64d9a608ae0f9b2fd38527e14625', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 10:58:33', '2022-10-11 10:58:33', '2023-10-11 10:58:33'),
('b435302eec57185b2b31704bfc9fdd935faf35a220a6f9c41b1361484173bfb72b5a97eb5da100df', 55, 1, 'SmartApp', '[]', 0, '2022-10-10 05:23:34', '2022-10-10 05:23:34', '2023-10-10 05:23:34'),
('b564c426e2e5795baf98ac58b02b711f0ccfb6e5e556b50316354bb8166f7bc618680574ecfb9d96', 25, 1, 'SmartApp', '[]', 0, '2022-10-04 13:11:19', '2022-10-04 13:11:19', '2023-10-04 13:11:19'),
('b576fc18da6586f186681dabd45d130c34c1cb51a33747bfeaa46afaf5565f8f373fa86d5488daa1', 15, 1, 'SmartApp', '[]', 0, '2022-09-30 08:32:00', '2022-09-30 08:32:00', '2023-09-30 08:32:00'),
('b621842f8f0135b7de40a9204ebfe5348f7e8246f044282e46543d3a09ea74faae61d02db6f9fc72', 91, 1, 'SmartApp', '[]', 0, '2022-10-18 10:04:58', '2022-10-18 10:04:58', '2023-10-18 10:04:58'),
('b6733a986d58d3ffc406d8ead34aedc888770563d98b4bc9f3fe6be13ab819c6bd47f766f426096c', 129, 1, 'SmartApp', '[]', 0, '2022-10-21 10:40:32', '2022-10-21 10:40:32', '2023-10-21 10:40:32'),
('b798c709a6d4341537a90e0fb1b8efc310ba5e376df2a49fbfaa73d5cc449bc33b806d5d788c5991', 49, 1, 'SmartApp', '[]', 0, '2022-10-07 11:44:19', '2022-10-07 11:44:19', '2023-10-07 11:44:19'),
('b7fd66fd29cb693a68f0f840892f432a7affcd71acb61ba116da3dd52cb8ebd3d0a990479524e887', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:28:52', '2022-09-30 10:28:52', '2023-09-30 10:28:52'),
('b8602434ecb2b4b26b0ed05b7b28c905f11d27dd749a7310f1f60455da84bfd3a64bfcce57d126e8', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 11:07:04', '2022-10-11 11:07:04', '2023-10-11 11:07:04'),
('b8c23866c7673c2d3c2f66a0ad7393f97b778154b98002bbad32bb849e5d90c8af9bd1b1b5e9c1bd', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:16:27', '2022-09-29 13:16:27', '2023-09-29 13:16:27'),
('b8cdb842e1cc7131c486265b2ab366dc28b6b10568fc2ccc81c577e9dba8f3f5b610fbe210fce43b', 92, 1, 'SmartApp', '[]', 0, '2022-10-19 05:54:34', '2022-10-19 05:54:34', '2023-10-19 05:54:34'),
('b8e6a1f8ebe2a955c49d0f6be4976c5d0ee7ca47da3e9861509a981d3eba363add3330d91eac6240', 94, 1, 'SmartApp', '[]', 0, '2022-11-02 13:14:07', '2022-11-02 13:14:07', '2023-11-02 13:14:07'),
('b97676ab3f546f7a7adb26286a8a2fd62d7c8c5a609c5d915c4f32e43d2062cf1e9ff759ab84ef4c', 60, 1, 'SmartApp', '[]', 0, '2022-10-20 06:27:23', '2022-10-20 06:27:23', '2023-10-20 06:27:23'),
('b977cd7ea1eaf52236ca736f2ebfe59e63556af07bba4ebf22607e78012ce3bca1c68d99369e7e7a', 49, 1, 'SmartApp', '[]', 0, '2022-10-07 11:46:08', '2022-10-07 11:46:08', '2023-10-07 11:46:08'),
('b9bb0a8e595d27ca02bab066040475eaafc0acc3d9613dc3ddf51103c617200aeab0498c6358791b', 119, 1, 'SmartApp', '[]', 0, '2022-10-20 07:08:21', '2022-10-20 07:08:21', '2023-10-20 07:08:21'),
('ba567a0c655f78ceb509cf2dc626b962c90d26df96a43c2622ce2cb9db0b9d70a44c944062cc70e6', 18, 1, 'SmartApp', '[]', 0, '2022-09-30 08:55:19', '2022-09-30 08:55:19', '2023-09-30 08:55:19'),
('ba7356746f1a450db64887f76dc45569738cfedc7657740a647420bca131e86c2f9401972be16458', 1, 1, 'SmartApp', '[]', 0, '2022-09-27 14:19:40', '2022-09-27 14:19:40', '2023-09-27 14:19:40'),
('baac00f00fe8227000b7e9c778e7eae44c4955778a7331dac8332d57b09caad9f15376897e7fedf3', 59, 1, 'SmartApp', '[]', 0, '2022-10-12 11:59:12', '2022-10-12 11:59:12', '2023-10-12 11:59:12'),
('bb0f6b22d806f2022f0d867e893484550d87c308fe18dbc46ea0042cd5b1519aa0549c02551b2ee3', 2, 1, 'SmartApp', '[]', 0, '2022-09-28 10:59:28', '2022-09-28 10:59:28', '2023-09-28 10:59:28'),
('bc20b3c8c10cb7f2cb978fd3ebcb7e5986214407c45921fe534d6ad4a6741840ac165aa5dc645bdf', 3, 1, 'SmartApp', '[]', 0, '2022-09-28 05:38:24', '2022-09-28 05:38:24', '2023-09-28 05:38:24'),
('bc7a0f74894b792bd753ecaaf90595d6e39809f3dd597e54f41a2b71d642815f2a91e3fc6b569089', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 08:20:08', '2022-10-11 08:20:08', '2023-10-11 08:20:08'),
('bc946d6b87b672230708f503d3f89821bf83227fae4e23782b0cc3c20aa3b8d9f66de603541f30e1', 91, 1, 'SmartApp', '[]', 0, '2022-10-17 11:44:50', '2022-10-17 11:44:50', '2023-10-17 11:44:50'),
('bc9b078e4c8841a96fcc17681cd536664e9f2f2a0cc5b056c7a3b0a4109573dfa7f5b2e486ab49c3', 141, 1, 'SmartApp', '[]', 0, '2022-11-02 12:01:57', '2022-11-02 12:01:57', '2023-11-02 12:01:57'),
('bcb501cb68106c2002eacaad87726bc7c1983a8ecc395544fe3b835d27243c22df122ecdc2d1edff', 8, 1, 'SmartApp', '[]', 0, '2022-09-30 04:44:36', '2022-09-30 04:44:36', '2023-09-30 04:44:36'),
('bd10cb3f9ef197a652f999b2de261e9cc8959d3135f5fae0ff94ff36547c25dfc116e5fe58126604', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 13:08:30', '2022-10-01 13:08:30', '2023-10-01 13:08:30'),
('bd91822073fb04b788749747d4d122216d8bccf6fdb7f94e007fbee5b034bed931b77914e9b4bb25', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 08:24:24', '2022-10-01 08:24:24', '2023-10-01 08:24:24'),
('bd91aaff820a3ad83680281fbe67cc8d71a24b6afd8c98124f141f685550666875962060ca8ede97', 2, 1, 'SmartApp', '[]', 0, '2022-09-27 14:12:22', '2022-09-27 14:12:22', '2023-09-27 14:12:22'),
('be7e653e9ba78751637695ec2dca2f613312acd990a78dff3bef156d7d87952161e9c549d8b29ca9', 91, 1, 'SmartApp', '[]', 0, '2022-10-19 13:29:46', '2022-10-19 13:29:46', '2023-10-19 13:29:46'),
('be93320cf906faf469d891900654a46d534b615a0d950bb2f85fd20df1dfc68463a181bf5b3228c9', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:16:27', '2022-09-29 13:16:27', '2023-09-29 13:16:27'),
('bf27705032de85aabc38f73c54bcd194ce6804e7c65024a892b54817533fa4c88938dad9b54a23f8', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 13:08:57', '2022-10-01 13:08:57', '2023-10-01 13:08:57'),
('bfe5348f13257949430b4dd435d54a38bc80d3872b1c91e6886c5351143f03f1cbbddcbbc94dbae3', 45, 1, 'SmartApp', '[]', 0, '2022-10-07 10:21:38', '2022-10-07 10:21:38', '2023-10-07 10:21:38'),
('c06f86fd017b8b5e16c59dde9fd8b80bf41d475cc560c94eabf3efbaa2fe1ab7edf4ecf9e5a6db7b', 9, 1, 'SmartApp', '[]', 0, '2022-09-27 14:53:29', '2022-09-27 14:53:29', '2023-09-27 14:53:29'),
('c1334815d3590411c14bae866d54908b8389e1afc51e96c06044c8418c41b6a11bfeaba398c611c3', 126, 1, 'SmartApp', '[]', 0, '2022-10-21 06:22:41', '2022-10-21 06:22:41', '2023-10-21 06:22:41'),
('c18720866fa423cc9d71103ad417ccbdbe58a815d527294db4d184355aa09e96e76742ee5633e680', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 12:13:09', '2022-10-14 12:13:09', '2023-10-14 12:13:09'),
('c1b330f534dafa15eb3043197cdf4cd4718722f7e19da96b271d93aab5009780dd5eec2d9ebacdbc', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:41:12', '2022-09-30 10:41:12', '2023-09-30 10:41:12'),
('c2410220d705e28344d7f5d938fac4cc3cabcdad6e82e0a2bdaa3bcc6c60b3856510e0dd8a8ea3f4', 9, 1, 'SmartApp', '[]', 0, '2022-09-30 05:33:15', '2022-09-30 05:33:15', '2023-09-30 05:33:15'),
('c2980cc64ab295c1990d305782cbcfd5b57c3cb15922d5f402ed10b9b89c50bd9d417d1cd76f3c4d', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 09:12:02', '2022-10-14 09:12:02', '2023-10-14 09:12:02'),
('c2a47485ab6cbfa7aceb3087646562e756b23478f99a029c1806a4e38e86f8ccfe4dc3b97e99fd80', 32, 1, 'SmartApp', '[]', 0, '2022-10-01 09:49:17', '2022-10-01 09:49:17', '2023-10-01 09:49:17'),
('c30a2646e7365a257bbe1df889dcdddc3d84a7a574895ba82fb48fe9f8e54a4e23c6e8daff1f1c7a', 46, 1, 'SmartApp', '[]', 0, '2022-10-07 09:33:45', '2022-10-07 09:33:45', '2023-10-07 09:33:45'),
('c345570fe7bee4826eb01d9f02a6c080f88ed2b3071c86127741a6ef3fa5e0ac6d7770ab6cbdb1d3', 60, 1, 'SmartApp', '[]', 0, '2022-10-19 05:26:28', '2022-10-19 05:26:28', '2023-10-19 05:26:28'),
('c347afab1c4926d703d301c8b6e96563362a65e02c8f489df13b2de8096e0af6e0dd83b479742c41', 59, 1, 'SmartApp', '[]', 0, '2022-10-14 10:24:35', '2022-10-14 10:24:35', '2023-10-14 10:24:35'),
('c348b6f5507ac69f53675e6147706d58b501a32ab0807e841eebc5a9df4fc15e90854793a67cdc0c', 128, 1, 'SmartApp', '[]', 0, '2022-11-01 11:23:35', '2022-11-01 11:23:35', '2023-11-01 11:23:35'),
('c3c62856680c3f36500b10f05ad9a174104d5ba2c4c9efa061aa03898a60ab2596af19f4ea3254ac', 129, 1, 'SmartApp', '[]', 0, '2022-11-01 10:44:04', '2022-11-01 10:44:04', '2023-11-01 10:44:04'),
('c4e461cf82ddeb1aa31915ae43d2be9d90d4831606f579c93a8777dfa38ac5a1d16038dd86388f05', 99, 1, 'SmartApp', '[]', 0, '2022-10-19 11:42:30', '2022-10-19 11:42:30', '2023-10-19 11:42:30'),
('c57da6e72cac95e41ac2f587fc3dfcee5ee893a15f1abaa94361dd8270dd87efe76c640aff5f8623', 2, 1, 'SmartApp', '[]', 0, '2022-09-27 14:18:01', '2022-09-27 14:18:01', '2023-09-27 14:18:01'),
('c64ecac78b969e533e63b819812e07c3977787172be223654fd6a04dcbbbfd0c99dcc9c84b857de7', 125, 1, 'SmartApp', '[]', 0, '2022-10-21 06:06:54', '2022-10-21 06:06:54', '2023-10-21 06:06:54'),
('c78757273edf86ea78b59f4fe080c6b1b66a4dc1b2d0f6d4650f8769aa89a8aa6d1b2317839d7190', 1, 1, 'SmartApp', '[]', 0, '2022-09-28 06:22:56', '2022-09-28 06:22:56', '2023-09-28 06:22:56'),
('c7adde96d310362a74fe4ca888a7329fd5f84e12c2569126276a87f44b857c81184ae2976cafbb13', 6, 1, 'SmartApp', '[]', 0, '2022-09-28 05:58:55', '2022-09-28 05:58:55', '2023-09-28 05:58:55'),
('c82339e36707acc4048ec94d0b43b0221d69c3199e3f2fa68a9d240f56134a570b6d126a0087b064', 21, 1, 'SmartApp', '[]', 0, '2022-10-04 13:08:00', '2022-10-04 13:08:00', '2023-10-04 13:08:00'),
('c850ffa1c4c95ef919ec7b5175decd1c7add24346dd80763e699fa44342a87e2879ca904c5cc0efc', 7, 1, 'SmartApp', '[]', 0, '2022-09-28 06:01:26', '2022-09-28 06:01:26', '2023-09-28 06:01:26'),
('c8711e6c4597015c6b192b37feffa665a79d88798102de3e5b2135ac192d6310820cc3909469c0e3', 60, 1, 'SmartApp', '[]', 0, '2022-10-13 11:53:56', '2022-10-13 11:53:56', '2023-10-13 11:53:56'),
('c8e03ad4578908af592f9aeb86d14a894418786f66b19a291df82d26b0589af39b400bd189947b8a', 85, 1, 'SmartApp', '[]', 0, '2022-10-17 08:29:25', '2022-10-17 08:29:25', '2023-10-17 08:29:25'),
('c92cf42f01e747f8163b2427247e84b179b95e49cec91469891a73ab18a139878962857fe99df7b0', 68, 1, 'SmartApp', '[]', 0, '2022-10-11 07:16:07', '2022-10-11 07:16:07', '2023-10-11 07:16:07'),
('c9784eae151e3d5db8150f47004a590175d23733ba7e2a8ec4c9eefe6bfc2081d252fa0981560acb', 21, 1, 'SmartApp', '[]', 0, '2022-10-06 04:44:47', '2022-10-06 04:44:47', '2023-10-06 04:44:47'),
('c978e3a091ba5fb0f50b8f95cc0373b8695c8a0af89b7d8393cf250d1d0c0b375322a5d2466a74ab', 1, 1, 'SmartApp', '[]', 0, '2022-09-30 12:52:38', '2022-09-30 12:52:38', '2023-09-30 12:52:38'),
('cae67f6c530a271b540b6ba8bad7e56a0b582e553ca669f90bc4f45efdf0b6998ea4e97db276353e', 1, 1, 'SmartApp', '[]', 0, '2022-09-29 13:41:03', '2022-09-29 13:41:03', '2023-09-29 13:41:03'),
('cb139fbbb4964902ef7baef4fd5efc24805a5eb182de88503b50b81a29bd4eee0e490aef150336bb', 94, 1, 'SmartApp', '[]', 0, '2022-11-02 09:45:55', '2022-11-02 09:45:55', '2023-11-02 09:45:55'),
('cc052375ac5d2681cc2b8e8a6b066e5d70743267a3c788c5710dfd47f7c9980f5ab5898f5d05dde0', 14, 1, 'SmartApp', '[]', 0, '2022-09-30 07:24:08', '2022-09-30 07:24:08', '2023-09-30 07:24:08'),
('ccbfcdeb237a9f95773e59b7d1942479c03372490048583553c62f72a14389bab59ff4af00dd932c', 22, 1, 'SmartApp', '[]', 0, '2022-09-30 13:42:05', '2022-09-30 13:42:05', '2023-09-30 13:42:05'),
('ccf44f5da86250f07891f2f6c2d2d0663a4e5a71a8459c3bfe245dd78ea01cc986cabb4244a70fce', 1, 1, 'SmartApp', '[]', 0, '2022-10-01 07:11:41', '2022-10-01 07:11:41', '2023-10-01 07:11:41'),
('cd090cf10b2c10d48ba1b44d04827023149671effded202b771e00d70922e53e83394fad81d4e522', 59, 1, 'SmartApp', '[]', 0, '2022-10-10 11:25:56', '2022-10-10 11:25:56', '2023-10-10 11:25:56'),
('cdf5e32990e0a644c907f6081796e8c471e7a3cc9867d35aa8d58961147f6a1ccecfe50d3ff76859', 129, 1, 'SmartApp', '[]', 0, '2022-10-21 12:14:42', '2022-10-21 12:14:42', '2023-10-21 12:14:42'),
('ceca4f31a20f45d2626e7df5ac03abcab93b166635d33fdc0922ab0e32fc292a14ce91ac25a084da', 27, 1, 'SmartApp', '[]', 0, '2022-10-01 08:45:52', '2022-10-01 08:45:52', '2023-10-01 08:45:52'),
('ceef4b7b0443c1e30dcdaf784a509b5b353f0e53fe7d6d128621633441e5337a210f57d092c202f6', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 10:51:16', '2022-09-29 10:51:16', '2023-09-29 10:51:16'),
('cf388ab12173eb3977ca81b05be6763ff46713b4dc0933dafe3922eb8e2429108ffe4e251fa0d3aa', 28, 1, 'SmartApp', '[]', 0, '2022-10-14 13:07:14', '2022-10-14 13:07:14', '2023-10-14 13:07:14'),
('cf77810f2b5c4beb71e94968774b38e7f2575ee64fd4758f20baee5bdb401e3042a03324376e670c', 96, 1, 'SmartApp', '[]', 0, '2022-10-31 05:27:06', '2022-10-31 05:27:06', '2023-10-31 05:27:06'),
('cfe7588fd1a21b4947d0fc5ca0867d4d84241ad8faa4f75cbde020037b66d34ac45aaefa6a7dbf06', 129, 1, 'SmartApp', '[]', 0, '2022-10-21 11:48:20', '2022-10-21 11:48:20', '2023-10-21 11:48:20'),
('d0fbee2d4c114b5d2bca3fe28ecc89804459b7cc3d846c476ff53c78a460938a9cb699ab234ffc82', 58, 1, 'SmartApp', '[]', 0, '2022-10-11 06:26:24', '2022-10-11 06:26:24', '2023-10-11 06:26:24'),
('d18a135ec5d8101c4e758448baadfe63d20ef2822185a17ac68ad7579a93e2a41ff884ed6beb70f6', 91, 1, 'SmartApp', '[]', 0, '2022-10-17 13:41:32', '2022-10-17 13:41:32', '2023-10-17 13:41:32'),
('d1d3a5b0e17524befce9dcb80526d3c1c692ec9b9b54a3b8a687af9523ad180cc0c1e3e21afac12d', 94, 1, 'SmartApp', '[]', 0, '2022-10-31 05:26:08', '2022-10-31 05:26:08', '2023-10-31 05:26:08'),
('d22eeed93fd1cb235608bb84fa6ed0a463004afd1afea0f4af1e85992772868a3ae5d816d44598ca', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 10:51:39', '2022-09-29 10:51:39', '2023-09-29 10:51:39'),
('d2fedc72b822af03232cf49069d75cb8f8975df528882ef7befa7a2fe2cb154cf29e26d99daf4f6e', 51, 1, 'SmartApp', '[]', 0, '2022-10-10 05:02:15', '2022-10-10 05:02:15', '2023-10-10 05:02:15'),
('d316adfc75e41c7127573a003d7aadf88c15d53568960686ff3a29d76bdf9dd2c3adadddac58ae03', 25, 1, 'SmartApp', '[]', 0, '2022-10-07 09:55:51', '2022-10-07 09:55:51', '2023-10-07 09:55:51'),
('d3dbde700b4e69e4d5ce2afbd8d7c29540754b2f19eabc5c338d44d52666929ec47c41efe49794bc', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 09:39:30', '2022-10-01 09:39:30', '2023-10-01 09:39:30'),
('d415873ec62f7c8372f4114fcbf22de0537998a7db4b81eaa4b00c178e5c6776bf345cd5a4af2191', 57, 1, 'SmartApp', '[]', 0, '2022-10-10 05:35:43', '2022-10-10 05:35:43', '2023-10-10 05:35:43'),
('d492da8ba2fba443b95714f4abe43ed4ca91e8940204778f92fb80613eb7e041fe1562b83741454a', 91, 1, 'SmartApp', '[]', 0, '2022-10-17 11:39:14', '2022-10-17 11:39:14', '2023-10-17 11:39:14'),
('d57465c6bfc196b8b1de9ca4246861ba4a7fae7dab9e59f73f0ba3c1cbdabf3d3f9a2dbd623c0beb', 2, 1, 'SmartApp', '[]', 0, '2022-09-28 06:24:51', '2022-09-28 06:24:51', '2023-09-28 06:24:51'),
('d60f5460b61556fbff0444d2365f8bc8f0660157e9915a010738f1c882e4f10fe24010ba3d061ad7', 60, 1, 'SmartApp', '[]', 0, '2022-10-19 04:56:43', '2022-10-19 04:56:43', '2023-10-19 04:56:43'),
('d6cdf8cc739729ee5a31f5452e965fe03135a4a082ff02b01e113961bf126985812dfa0d707daa68', 40, 1, 'SmartApp', '[]', 0, '2022-10-01 13:42:30', '2022-10-01 13:42:30', '2023-10-01 13:42:30'),
('d78610403f60e4d75dc3eba6b151e14824ff7387866489ce90daec81bff4e1309191b85182dbdb8a', 92, 1, 'SmartApp', '[]', 0, '2022-10-19 04:38:19', '2022-10-19 04:38:19', '2023-10-19 04:38:19'),
('d896c12d75b8f4acc162988e6d95ff55d3e802726d864eed51fe5ad77b2cdaf9aa45946bf60bd8ef', 126, 1, 'SmartApp', '[]', 0, '2022-10-21 10:41:09', '2022-10-21 10:41:09', '2023-10-21 10:41:09'),
('d8ead6cb07da80cea7b582affe17b2f493f0aa07519cc6d2e40c67b36e8dab63f10abb2d0581d884', 25, 1, 'SmartApp', '[]', 0, '2022-10-07 07:01:40', '2022-10-07 07:01:40', '2023-10-07 07:01:40'),
('d90eab5a48541c986aa9d574d5c3091f31869f897aeb34e7d93b71947fcb69049a68bc239d687315', 21, 1, 'SmartApp', '[]', 0, '2022-10-04 11:54:25', '2022-10-04 11:54:25', '2023-10-04 11:54:25'),
('d93b95b356a47e7899336c46af331dac0b4a753b2cd29646304524fa30a3387d4a0409ab7fcebc05', 6, 1, 'SmartApp', '[]', 0, '2022-09-27 13:58:40', '2022-09-27 13:58:40', '2023-09-27 13:58:40'),
('d95b208d640c18b3732d881b28b0ef51ff44162b8eca4055bd119cc39daeed4c4853c9560bf718e7', 92, 1, 'SmartApp', '[]', 0, '2022-10-19 04:38:35', '2022-10-19 04:38:35', '2023-10-19 04:38:35'),
('d96073777a33d122e23ac8a3d3259735d9c032e5cd29ede0e23d0c8d96b1108a456fc18abd84da7d', 2, 1, 'SmartApp', '[]', 0, '2022-09-27 14:19:27', '2022-09-27 14:19:27', '2023-09-27 14:19:27'),
('d97becd682e0b64cdd9a5885fb58c49af86a13bafa41443dc0830658e518dc77372c631c495680e5', 3, 1, 'SmartApp', '[]', 0, '2022-09-28 06:49:24', '2022-09-28 06:49:24', '2023-09-28 06:49:24'),
('da2e569f1a24f2e8d3bfe5f93ecdd55aaa8026537f53d7dae3bc879cfa36447dcf59f93f7779f569', 25, 1, 'SmartApp', '[]', 0, '2022-10-01 09:04:02', '2022-10-01 09:04:02', '2023-10-01 09:04:02'),
('dacf4241dcd6c9426ad72a3ba4b14e1606295b8aaa4d0800e28eea82eea7a739c886303149fbec87', 25, 1, 'SmartApp', '[]', 0, '2022-10-01 08:44:10', '2022-10-01 08:44:10', '2023-10-01 08:44:10'),
('db349c61bf7f313c61de5208722d721e72c657d900bb49cdfab2f9aa5d45de1a8846f17a16c3b173', 21, 1, 'SmartApp', '[]', 0, '2022-10-04 04:52:56', '2022-10-04 04:52:56', '2023-10-04 04:52:56'),
('db48a221b47c813785cf67b06085b4856ba2726cec169f03bf9dee671840f952263dc5a268711c24', 91, 1, 'SmartApp', '[]', 0, '2022-10-17 13:41:15', '2022-10-17 13:41:15', '2023-10-17 13:41:15'),
('db4eb053ff8c04051ca9e82bc385d0e2753040181762325c58d37adbe2ae78269153b416b3395bac', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 08:37:40', '2022-10-01 08:37:40', '2023-10-01 08:37:40'),
('dc238c64166d2ac7a0ea5cbc675620b0fa169beff0667f8856052e953ad0b10b02eb84176a915d94', 59, 1, 'SmartApp', '[]', 0, '2022-10-10 11:24:08', '2022-10-10 11:24:08', '2023-10-10 11:24:08'),
('dc43dc13ac2df20676778fed38d12ee09da009f5822ed1da17250f495873ebbfcddf28ab506dcb1e', 60, 1, 'SmartApp', '[]', 0, '2022-10-12 08:34:16', '2022-10-12 08:34:16', '2023-10-12 08:34:16'),
('dc90af4301a2506602287a045425ccf068cb4e5e7edff4616131795a7ae998a901667cf1141c0067', 91, 1, 'SmartApp', '[]', 0, '2022-10-18 06:25:05', '2022-10-18 06:25:05', '2023-10-18 06:25:05'),
('dcebab27e3fd0dcc1dfea6e4e9bda70d11c467cf0a4a459e1609e8b7c4330659c11a5985e67ddd09', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:32:37', '2022-09-30 10:32:37', '2023-09-30 10:32:37'),
('dd4b30614aee3caec9aae3207ce0503f127ca535f1b647b7cc247f55db2a59bc27cba95e4615ad92', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:41:14', '2022-09-30 10:41:14', '2023-09-30 10:41:14'),
('ded6295dc51310f175009b689dd1e18fd2b8caf184b5cb5bc1323def5e8dcb4295bd2237a78f04d0', 140, 1, 'SmartApp', '[]', 0, '2022-11-01 12:01:48', '2022-11-01 12:01:48', '2023-11-01 12:01:48'),
('df71c8e9a11afb81d6d26c2d82f1a0f5fca94c907c57ffab7fc983d9c97a58c857d636250928cfd0', 1, 1, 'SmartApp', '[]', 0, '2022-09-28 10:59:35', '2022-09-28 10:59:35', '2023-09-28 10:59:35'),
('df9710d45f4cf1038304152f8242830eaac2b4d5cad57cfe1726f26ab95756d2e78d621d1b018b12', 2, 1, 'SmartApp', '[]', 0, '2022-09-28 06:22:13', '2022-09-28 06:22:13', '2023-09-28 06:22:13'),
('df98d976cfed5d848a34a01c34d81fe30945422c66538579776ee9902cdf9441f71f5fa3f11ae698', 28, 1, 'SmartApp', '[]', 0, '2022-10-08 11:31:28', '2022-10-08 11:31:28', '2023-10-08 11:31:28'),
('e02d052762a1a771996aef72e370ae87085d1a4b7831d754e51e47a2e97c03989653063ea3266c56', 91, 1, 'SmartApp', '[]', 0, '2022-10-18 06:33:48', '2022-10-18 06:33:48', '2023-10-18 06:33:48'),
('e0c654de2946ddea00bf075da36244ec6230ebe2a51532781b233c066fb64d9b3006bb785c4e744c', 30, 1, 'SmartApp', '[]', 0, '2022-10-01 09:39:38', '2022-10-01 09:39:38', '2023-10-01 09:39:38'),
('e1b0d8d7765922f114bea71e30e8ef60cb4ed11ff7b2b1106291e07e7b78dcc6c9694e5c4e7fc3a4', 132, 1, 'SmartApp', '[]', 0, '2022-11-01 10:47:49', '2022-11-01 10:47:49', '2023-11-01 10:47:49'),
('e260735183cc5c846ee98d97584b68fc311741c96cbc96dd69e7f12018772f82ba0dc9978537513e', 118, 1, 'SmartApp', '[]', 0, '2022-11-02 11:55:14', '2022-11-02 11:55:14', '2023-11-02 11:55:14'),
('e2db057eecebfec814ff0630467064c5c871cdece9b4bfdb22fdcf1e52f385fc8c02cd4170572ca5', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 12:42:10', '2022-10-14 12:42:10', '2023-10-14 12:42:10'),
('e33c8dd1581558daed7361f79d9d1e9ea4e23173067f534cc503bb4add76ed24c868487294259232', 125, 1, 'SmartApp', '[]', 0, '2022-10-21 06:13:59', '2022-10-21 06:13:59', '2023-10-21 06:13:59'),
('e3c5dcc5136bcc20afd8844a31972fd872ec4b84e37789fea3309b22446ada1fb58152aec9795949', 29, 1, 'SmartApp', '[]', 0, '2022-10-03 04:52:13', '2022-10-03 04:52:13', '2023-10-03 04:52:13'),
('e3dc81f9258f4989ec6233dd5aa0c2b7bbecf2ccf863a2bbb8c2eeaf71b4ef4c0a4a72f7db4d1ed5', 64, 1, 'SmartApp', '[]', 0, '2022-10-11 06:35:46', '2022-10-11 06:35:46', '2023-10-11 06:35:46'),
('e3e0dd0805611bfde7b954cfd234b581d2829ed1029a7b2875549fa4af9e31b37ef4b3eae46ca195', 106, 1, 'SmartApp', '[]', 0, '2022-10-20 04:48:50', '2022-10-20 04:48:50', '2023-10-20 04:48:50'),
('e5687a7dc8c5eb227c8e86abd968592618d553c958990128cd086f5822343204434c9803008640dc', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:28:56', '2022-09-30 10:28:56', '2023-09-30 10:28:56'),
('e5a701627901f0038dd0d08e09628a071c5a227196bf853315fc6480d84241cf1f624f86424359b7', 60, 1, 'SmartApp', '[]', 0, '2022-10-11 05:35:13', '2022-10-11 05:35:13', '2023-10-11 05:35:13'),
('e5feaeb35d9c711bae1db1128cc7c56a93c970d1db8615eefef69e722510372cd016c24818127c62', 21, 1, 'SmartApp', '[]', 0, '2022-10-06 11:20:38', '2022-10-06 11:20:38', '2023-10-06 11:20:38'),
('e620701f5e5a3272067ba4154d529823916fd38fa0de425de976706e21de549f1ebe76cc211f3f75', 119, 1, 'SmartApp', '[]', 0, '2022-10-20 06:51:36', '2022-10-20 06:51:36', '2023-10-20 06:51:36'),
('e64e0a05f3727a2d6e83b9861b773ba2c1bce8553183a2370fee58c1420f745f920c252ba463a2cb', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 13:07:41', '2022-10-01 13:07:41', '2023-10-01 13:07:41'),
('e66c27d602266e94d2a26e95af88f2312a4082b07411c4510926c6ec276a8e8106ddaf141ba1c9e1', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:20:14', '2022-09-29 13:20:14', '2023-09-29 13:20:14'),
('e6b650bdfd23053fe371c98eea4735008f05a19560441ef335160ddeb7c826b275531abff7b5cf3c', 94, 1, 'SmartApp', '[]', 0, '2022-10-31 06:14:09', '2022-10-31 06:14:09', '2023-10-31 06:14:09'),
('e78c08321e8c20a56980e52fa3283ad876ad17bde2afe0ff8021dac211e341398a73fa0b446fbc83', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 10:32:11', '2022-10-14 10:32:11', '2023-10-14 10:32:11'),
('e7f412ad5fc8af182f019b17f7536fa7829e1413a8d7432a91a7b238d774218c934bb4dca9ccb226', 1, 1, 'SmartApp', '[]', 0, '2022-09-28 06:20:50', '2022-09-28 06:20:50', '2023-09-28 06:20:50'),
('e816b66a695d205f432760ab747f8e47995db3fc10b3e3bbdc0159365467250e656995db5ad11ed6', 138, 1, 'SmartApp', '[]', 0, '2022-11-01 11:19:33', '2022-11-01 11:19:33', '2023-11-01 11:19:33'),
('e820b247a366d8366bdced3d8e7344e3d5094c9baf57d31418d3d539e25af893a5f33d9b660aaf87', 111, 1, 'SmartApp', '[]', 0, '2022-10-20 05:30:28', '2022-10-20 05:30:28', '2023-10-20 05:30:28'),
('e9da29b5be1cce1496c9f2999f9d99e9109bd35bb339eccf0e81323ce45761c87101d4a310fcf15b', 92, 1, 'SmartApp', '[]', 0, '2022-10-19 13:43:18', '2022-10-19 13:43:18', '2023-10-19 13:43:18'),
('e9e2901c752dfae8aae4ee96ccc3da229485fce94a5c95b05a8c352603c72667b41fb802ee153037', 3, 1, 'SmartApp', '[]', 0, '2022-09-27 13:39:42', '2022-09-27 13:39:42', '2023-09-27 13:39:42'),
('ea6c2aa11274adc842d68d452c30e2ee402e868b138850430fbffcaf3f1f557a9dc5eb9f24b67665', 1, 1, 'SmartApp', '[]', 0, '2022-09-27 14:21:04', '2022-09-27 14:21:04', '2023-09-27 14:21:04'),
('eabbaefc87cf87c9a7580903c76214c127ac9ef93c04b6ac39f1aa06468de96c7feaa166a9762318', 96, 1, 'SmartApp', '[]', 0, '2022-10-19 10:10:41', '2022-10-19 10:10:41', '2023-10-19 10:10:41'),
('eabf1ef52ab54dfcae9694348b077006c4f4f643e99c73b083b873f747d8133f00c14360bb084e17', 128, 1, 'SmartApp', '[]', 0, '2022-11-01 11:24:38', '2022-11-01 11:24:38', '2023-11-01 11:24:38'),
('eae994675c4f8b0b9cff2124b666a9005be587f51c1da5a15af32d30edbdc5e8d890b4f9d7dcf9bf', 94, 1, 'SmartApp', '[]', 0, '2022-10-31 07:17:43', '2022-10-31 07:17:43', '2023-10-31 07:17:43'),
('eb9e44c8660443815645b97fb18657e0e167910efcac30c247b38d371f9f1cc184cf4f20b518e7e1', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 12:28:46', '2022-10-14 12:28:46', '2023-10-14 12:28:46'),
('ebfa0044068e78a2fdf8768b67873a7372fb3e3e0d5e3b0946d066d717368c165a2f1746a251cf43', 51, 1, 'SmartApp', '[]', 0, '2022-10-10 11:34:14', '2022-10-10 11:34:14', '2023-10-10 11:34:14'),
('ec884bddcc542cab66fa36e32c2458f020fc570e502434532a66b79c40f799c18e38cb83ead87038', 85, 1, 'SmartApp', '[]', 0, '2022-11-01 10:31:09', '2022-11-01 10:31:09', '2023-11-01 10:31:09'),
('ecb747dabf5fb30a1d4a54dce7f1a7a08bf64974e75299cce94ba439fbe7b0024fa951dc1596d9f0', 141, 1, 'SmartApp', '[]', 0, '2022-11-02 12:10:42', '2022-11-02 12:10:42', '2023-11-02 12:10:42'),
('ed102a2d78405c00f7b3d68b4493fdb9a84de894cc9fd9530678bef08783470a15376cedfda365e1', 1, 1, 'SmartApp', '[]', 0, '2022-09-28 07:03:15', '2022-09-28 07:03:15', '2023-09-28 07:03:15'),
('ed14c61bf7879b284bd85541c8b2378b3373954966ff40cd62f1a2e394f9940197750a39e287726c', 87, 1, 'SmartApp', '[]', 0, '2022-10-14 12:16:08', '2022-10-14 12:16:08', '2023-10-14 12:16:08'),
('efe4d62c453c4052f9edbb677401a1c9b52a330096442f52e84aec4be0302fa04648c86a4805bf1b', 1, 1, 'SmartApp', '[]', 0, '2022-09-27 14:12:17', '2022-09-27 14:12:17', '2023-09-27 14:12:17'),
('f0043f0fc60cc2dff8c7c777bc29c08a94a432244c5626d2a27522a6ed30941485f0221280993c63', 8, 1, 'SmartApp', '[]', 0, '2022-09-29 13:15:28', '2022-09-29 13:15:28', '2023-09-29 13:15:28'),
('f01d10d1759f92d220c65696c8755b37dbc7b9082e08d09273a94289cedc583b8ae0641f976e2fa9', 28, 1, 'SmartApp', '[]', 0, '2022-10-11 14:02:58', '2022-10-11 14:02:58', '2023-10-11 14:02:58'),
('f1273f7310e5117e3ccc6592060854d793f0f00306fc9661234838f39488620b4b36132595e154fe', 14, 1, 'SmartApp', '[]', 0, '2022-09-30 07:20:16', '2022-09-30 07:20:16', '2023-09-30 07:20:16'),
('f2c49c28ae5fa62e1c08f09bf45c47e1838524e4ee18fc4f9cb0226ca711f34e8af1e3e81f77c05e', 91, 1, 'SmartApp', '[]', 0, '2022-10-17 13:53:32', '2022-10-17 13:53:32', '2023-10-17 13:53:32'),
('f2c79a22bdf206ccdc2077d7dc7c310844d5baefcfdcef0c60741afa6b41697be62e4a1f86f4c779', 51, 1, 'SmartApp', '[]', 0, '2022-10-10 05:09:51', '2022-10-10 05:09:51', '2023-10-10 05:09:51'),
('f3405b1eb6660bc005820bae318634177d1a31c3bdeaad7cff9a9c48c8c802ed4c1e439d207898db', 42, 1, 'SmartApp', '[]', 0, '2022-10-04 09:01:11', '2022-10-04 09:01:11', '2023-10-04 09:01:11'),
('f4f1d0cabd7a82e398b18bcb7c89bc3c1b157e56bc492ca69b6848d31e9cb3241c604c5d240dbd9e', 61, 1, 'SmartApp', '[]', 0, '2022-10-11 05:06:40', '2022-10-11 05:06:40', '2023-10-11 05:06:40'),
('f507e4908a62ad710c69d2881635616c3ceac40d00a1729c38fddf66baaf60baf1f133eac1d47ae0', 94, 1, 'SmartApp', '[]', 0, '2022-10-31 05:52:21', '2022-10-31 05:52:21', '2023-10-31 05:52:21'),
('f55c2205e250667bc8d9bd52dc16eb9865c305dcd6931f090a815f70ef6357e986ee24f7dcf4e211', 35, 1, 'SmartApp', '[]', 0, '2022-10-01 10:19:44', '2022-10-01 10:19:44', '2023-10-01 10:19:44'),
('f58aa09048f6ebeffa8856cfa5c85a6ef02b6df82bccb19dd6d5240948221d2b310c58f263756bd1', 60, 1, 'SmartApp', '[]', 0, '2022-10-17 06:16:20', '2022-10-17 06:16:20', '2023-10-17 06:16:20'),
('f65c0ce8ca8fd5f52fa6e83ac07e0ef40ae2e38ce1349e2ae45243c0ee625e4a8730e31012e48f2a', 75, 1, 'SmartApp', '[]', 0, '2022-10-17 14:58:53', '2022-10-17 14:58:53', '2023-10-17 14:58:53'),
('f6cbf33fb702b96c22141dcac1990fa58b76d2659f2f89e367e6129d1f973819ee8929ba63215dcf', 141, 1, 'SmartApp', '[]', 0, '2022-11-02 12:23:37', '2022-11-02 12:23:37', '2023-11-02 12:23:37'),
('f8009651a351b52087530d0c1f945664bc172ca543be11423b5a4b5bbdefc0cec4937e33afd0aac4', 60, 1, 'SmartApp', '[]', 0, '2022-10-21 14:40:41', '2022-10-21 14:40:41', '2023-10-21 14:40:41'),
('f8086d96471f0a96e1f3e2ffa6ef9fd5e0f22457508814bf1bb18e8278cdf71e3d404211369d7f0c', 5, 1, 'SmartApp', '[]', 0, '2022-09-28 11:55:05', '2022-09-28 11:55:05', '2023-09-28 11:55:05'),
('f8430fe6b70fc5a2b353d5820f4bd39ae5f9b5aa676d483dbe22545e171f0146c2f3dded0f9c1a09', 92, 1, 'SmartApp', '[]', 0, '2022-10-19 05:57:55', '2022-10-19 05:57:55', '2023-10-19 05:57:55'),
('f845b5f96249d6abd9402d4b3a310ab953e1c06b959d3c386582a4d00e84e55d09070972958daae7', 60, 1, 'SmartApp', '[]', 0, '2022-10-18 13:17:22', '2022-10-18 13:17:22', '2023-10-18 13:17:22'),
('f9eb69bb4dfddb1071c506433eee22e532758eada1be39122bf8348c8cfd0ac4142f8dd2cbe43a3e', 4, 1, 'SmartApp', '[]', 0, '2022-09-28 06:24:29', '2022-09-28 06:24:29', '2023-09-28 06:24:29'),
('fa00f32d3c361df2a8c712b8c32f8682b293460376110847a5c26dd314574c36195dbfdeee334abe', 141, 1, 'SmartApp', '[]', 0, '2022-11-02 12:10:06', '2022-11-02 12:10:06', '2023-11-02 12:10:06'),
('fa5f3d9e87efbfab7031357a420cb88732664a8e64ffe06f9cd98417fa04ec397a212e716b15a9ff', 21, 1, 'SmartApp', '[]', 0, '2022-10-08 13:13:31', '2022-10-08 13:13:31', '2023-10-08 13:13:31'),
('fa9bca331e4b40427851346c18e99a780786cacb597a472a6388377258a39577d86b0821b80d94c1', 75, 1, 'SmartApp', '[]', 0, '2022-10-11 11:23:13', '2022-10-11 11:23:13', '2023-10-11 11:23:13'),
('fb1ba11c776dcb6560c18ff7e906c812d9e9ba125d029b541fb51b5d96560bbf2cc0da3402d859f5', 48, 1, 'SmartApp', '[]', 0, '2022-10-07 11:04:44', '2022-10-07 11:04:44', '2023-10-07 11:04:44'),
('fb3615190421c05dce7ccc9f4fc893d7e9251c5db595366582d0d34f16e17d7acb7516fef2941b9b', 43, 1, 'SmartApp', '[]', 0, '2022-10-07 06:32:15', '2022-10-07 06:32:15', '2023-10-07 06:32:15'),
('fb6c66257641234978ecc0e768cd22a6d6ad55318618487624b6cb8bb4acccf55a524a4f59c1e2cc', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 05:03:19', '2022-10-01 05:03:19', '2023-10-01 05:03:19'),
('fcb721fd8edb71e3c281cd4716b8654e95575390c2a1c515d14d316def2262b47256d7fdb11476af', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 11:49:26', '2022-10-01 11:49:26', '2023-10-01 11:49:26'),
('fe17c3b592cd7fcc23aa3731464a407f6d69b03f3587396a7e703a1601cf8e173f4bdd55d9d15470', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:41:14', '2022-09-30 10:41:14', '2023-09-30 10:41:14'),
('fea44cd1784c9f88e622e44bda1a52994fb0eae1fb47de457c54fa1396076f1d45750f15b7fa0687', 21, 1, 'SmartApp', '[]', 0, '2022-09-30 10:41:15', '2022-09-30 10:41:15', '2023-09-30 10:41:15'),
('feb979706b491cb169ac2270fe7a97470457b863e28e86f73ffa0f3b45c1f4718348b99f400ba579', 21, 1, 'SmartApp', '[]', 0, '2022-10-01 07:30:16', '2022-10-01 07:30:16', '2023-10-01 07:30:16'),
('ff0b3a8230ec098aa703bae364b556a25c9fb7c2697c0f577e9eb789f8346a6c72a4bbefb6a8487f', 85, 1, 'SmartApp', '[]', 0, '2022-10-14 09:55:27', '2022-10-14 09:55:27', '2023-10-14 09:55:27'),
('ff7d95dc94524dff75e5a9bda9779472052a867b4c21999f6426dc7ca25cfbcb0bb838a32b0e53a6', 28, 1, 'SmartApp', '[]', 0, '2022-10-10 11:22:14', '2022-10-10 11:22:14', '2023-10-10 11:22:14'),
('ff833ad27a640e5d15b2486c41628dcdb98c16ccacdbb04498b9d19c5c48e5c6293f325ed6133f86', 96, 1, 'SmartApp', '[]', 0, '2022-10-31 05:30:26', '2022-10-31 05:30:26', '2023-10-31 05:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'iw44juD0kKuhywpEAUikyDVl0ZWCdb3WsA0IznsJ', NULL, 'http://localhost', 1, 0, 0, '2022-09-27 10:18:34', '2022-09-27 10:18:34'),
(2, NULL, 'Laravel Password Grant Client', 'Vb6dIgG2e9AJ73cl2rtW053HfvECtmQDkx8jyFYc', 'users', 'http://localhost', 0, 1, 0, '2022-09-27 10:18:34', '2022-09-27 10:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-09-27 10:18:34', '2022-09-27 10:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ankitad.knp@gmail.com', 'uUzYUcYXEBiUqlYCQsppCnEnSyYTULjbxVCpeim1rrJVvW7W8SfIjI7sWu7q6avE', NULL),
('ankitad.knp@gmail.com', 'cYsFBliJB9HKInW1OX92ivXO1wUP0y79dRNFCDbHwcirTn1s9BJk7E4s09dlApsN', NULL),
('ankitad.knp@gmail.com', 'Ae891bY7DhuM8JimkkjgyH0vTvvE5ZYQpqkSdKmvQ9zVNiUajGpsc1Xu4A8yxZR5', NULL),
('ankitad.knp@gmail.com', 'VVoGv6z7XaJv2ww3ynZejumt0lMSwhqJNBcmXdZlMUc2wEs86jB5STGp920QHht9', NULL),
('ankitad.knp@gmail.com', 'vsGBfMHSkOVXYSSSNlW8OIyPOZYHK5V41JT1AHJlr9rWsTMEgZ0RkMrIttFUXOSM', NULL),
('a@gmail.com', '1q5ZiwPaWbqUzlZSkSsez1K8PatWTpMP8O9CSUbxDKF2aUOVYudlTP1RLQtL5MxG', NULL),
('ankitad.knp@gmail.com', 'MQENkPSpUi4QAtwzwT3fGZpU3VnmfDSiBhvyCAdIrXGqSRQWdbYUQAqsQWfk8KQT', NULL),
('ankitad.knp@gmail.com', 'j8ypDfiA7EUNI8nN0LRoFuRH0sKXYeXi1yz1CMQGaWmdjVayygAAQzYXA8Qow247', NULL),
('ankitad.knp@gmail.com', 'mUtUn0UPye7Ka34DxcCS14wLTEjfleMXtsLMeq79N5jye5Soz8cJ8lMFxcXmz2k7', NULL),
('ankitad.knp@gmail.com', 'JuyXbT', '2022-10-31 10:56:59'),
('ankitad.knp@gmail.com', 'dP7YGj', '2022-10-31 12:27:47'),
('ankitad.knp@gmail.com', 'A19Z27', '2022-10-31 12:31:59'),
('ankitad.knp@gmail.com', 'o0PQJR', '2022-10-31 12:39:41'),
('pradipr.knp@gmail.com', 'VMYnlydT4wQ5gFyk8ZgkX9mm33Z4fLQaSqhBYVIZNn5zg9p3MQSdXwg8G1QUOhps', '2022-11-01 05:34:00'),
('pradipr.knp@gmail.com', 'af8f2oPKMnCzspnvLZ00q5Vy28QuqqvXjQBPQ5RlZhV1ybnsaMd5ycpNZbdA3Ifc', '2022-11-01 06:31:28'),
('piyushc.knp@gmail.com', 'FE5fuC2x9UhTonE7q9x0IuMjHGeIQd8s02EgqI7tQgLoHiWYdtxL9BY0HqDnzw4Q', '2022-11-01 10:15:48'),
('piyushc.knp@gmail.com', 'ukkdUbuPMfj1WxLaPPfNqkL8mFMgL0opeDQu2z9UYXbjjc8WuWqCB4NsSavA1wLz', '2022-11-01 10:17:51'),
('piyushc.knp@gmail.com', 'XCc3Oh', '2022-11-01 10:26:36'),
('piyushc.knp@gmail.com', 'xdXzft', '2022-11-01 10:29:56'),
('piyushc.knp@gmail.com', 'YmotBY', '2022-11-01 10:31:42'),
('p11@gmail.com', 'LuNtQ0', '2022-11-01 10:44:39'),
('piyushc.knp@gmail.com', 'E7AQzs', '2022-11-01 10:46:07'),
('piyushc.knp@gmail.com', '6d4b5ClNkulb5T7UYauNfm7vBfTGJyWLwqNefV3W0BtuJMMZFxOaJMRcyyuEJrGr', '2022-11-01 10:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `public_feed`
--

CREATE TABLE `public_feed` (
  `public_feed_id` int NOT NULL,
  `public_feed_title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `public_feed_title_ab` varchar(100) DEFAULT NULL,
  `public_feed_title_he` varchar(100) DEFAULT NULL,
  `short_content` varchar(255) DEFAULT NULL,
  `short_content_ab` varchar(255) DEFAULT NULL,
  `short_content_he` varchar(255) DEFAULT NULL,
  `content` longtext NOT NULL,
  `content_ab` longtext,
  `content_he` longtext,
  `status` tinyint(1) NOT NULL COMMENT '1=active,2=inactive',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `public_feed`
--

INSERT INTO `public_feed` (`public_feed_id`, `public_feed_title`, `public_feed_title_ab`, `public_feed_title_he`, `short_content`, `short_content_ab`, `short_content_he`, `content`, `content_ab`, `content_he`, `status`, `created_at`, `updated_at`) VALUES
(34, 'Cafe hopping in Noida', 'مقهى التنقل في نويدا', 'בית קפה שופינג בנוידה', 'Cafe hopping in NoidaCafe hopping in NoidaCafe hopping in NoidaCafe hopping in Noida', 'مقهى التنقل في نويدامقهى التنقل في نويدامقهى التنقل في نويدامقهى التنقل في نويدا', 'בית קפה שופינג בנוידהבית קפה שופינג בנוידהבית קפה שופינג בנוידה', '<p><a href=\"https://timesofindia.indiatimes.com/travel/Noida/travel-guide/cs49520386.cms\">Noida</a>&nbsp;might be a paradise for home buyers but it still needs to go a long way for becoming a foodie&rsquo;s haven. Despite the paucity of choices, these handful cafes in Noida are really worth visiting. The sector-18 market of Noida which happens to be a commercial hub, has a few leading joints, which are identifiable favourites. Take&nbsp;<a href=\"https://timesofindia.indiatimes.com/travel/Mumbai/travel-guide/cs23958811.cms\">Mumbai</a>&nbsp;Matinee with its alluring typical Bollywood setting or the Paddy&rsquo;s Cafe that is frequented by office-goers looking for a quick time-out with their buddies. Notable in its contemporary charm, the Burbee&rsquo;s Cafe wins the heart of youth whereas Theos and Kaffiiaa offer respite from cheap Italian versions of pizzas and pastas&nbsp;</p>', '<p>قد تكون نويدا جنة لمشتري المنازل ولكنها لا تزال بحاجة إلى قطع شوط طويل لتصبح ملاذًا لعشاق الطعام. على الرغم من ندرة الخيارات ، فإن هذه المقاهي القليلة في نويدا تستحق الزيارة حقًا. سوق القطاع -18 في نويدا والذي يصادف أن يكون مركزًا تجاريًا ، يحتوي على عدد قليل من المفاصل الرائدة ، والتي يمكن تحديدها المفضلة. خذ مومباي ماتيني مع أجواء بوليوود النموذجية الجذابة أو مقهى بادي الذي يتردد عليه رواد المكتب الذين يبحثون عن قضاء وقت سريع مع رفاقهم. يجذب مقهى Burbee ، الذي يتميز بسحره المعاصر ، قلب الشباب بينما يقدم Theos و Kaffiiaa فترة راحة من الإصدارات الإيطالية الرخيصة من البيتزا والباستا.</p>\r\n\r\n<p><img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666088776download (1)1.jpg\" style=\"border-style:solid; border-width:5px; height:150px; margin:10px 50px; width:300px\" /><img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666088840download (1)12.jpg\" style=\"border-style:solid; border-width:5px; height:150px; margin-bottom:10px; margin-top:10px; width:300px\" /></p>', '<pre>\r\nנוידה עשויה להיות גן עדן לרוכשי בתים, אבל היא עדיין צריכה לעבור דרך ארוכה כדי להפוך לגן עדן של אוכלים. למרות מיעוט האפשרויות, בתי הקפה המעטים האלה בנוידה באמת שווים ביקור. לשוק הסקטור 18 של נוידה, שהוא במקרה מרכז מסחרי, יש כמה ג&#39;וינטים מובילים, שהם מועדפים שניתן לזהות. קחו את&nbsp;Mumbai&nbsp;Matinee עם התפאורה הבוליוודית המושכת שלו או את פאדי&#39;ס קפה שפוקדים אותו אנשי משרד שמחפשים פסק זמן מהיר עם חבריהם. בולט בקסמו העכשווי, בית הקפה Burbee&#39;s מנצח את לב הנעורים ואילו תיאוס וקאפיה מציעים הפוגה מגרסאות איטלקיות זולות של פיצות ופסטות.</pre>\r\n\r\n<p><img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666088776download (1)1.jpg\" style=\"border-style:solid; border-width:5px; height:150px; margin:10px 50px; width:300px\" /><img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666088840download (1)12.jpg\" style=\"border-style:solid; border-width:5px; height:150px; margin-bottom:10px; margin-top:10px; width:300px\" /></p>', 1, '2022-10-18 10:29:29', '2022-10-19 05:36:01'),
(36, 'Travel Around the World', 'السفر حول العالم', 'לטייל מסביב לעולם', 'Travel Around the World', 'السفر حول العالم', 'לטייל מסביב לעולם', '<p>Those in the U.S. will want an up-to-date driver&rsquo;s license because by Oct. 1, 2020, all U.S. residents traveling domestically must have identification compliant with the&nbsp;<a href=\"https://time.com/money/5094105/check-your-passports-expiration-date-now/\" target=\"_blank\">Real-ID Act</a>, which increased security requirements for state drivers licenses and ID cards. Residents in 24 states including Alaska, California, Idaho, Maine, Oregon and Washington have until Oct. 10, 2018 get a Real-ID compliant card, though states have the option to apply for exemptions through Oct. 1, 2020 when the last phase of the Real-ID Act is enforced, meaning residents in those states should regularly check the status of their IDs before flying. For travel outside of the U.S.,&nbsp;<a href=\"https://www.cbp.gov/travel/trusted-traveler-programs\" target=\"_blank\">passport cards</a>&nbsp;or&nbsp;<a href=\"https://www.cbp.gov/travel/trusted-traveler-programs\" target=\"_blank\">trusted traveler cards</a>&nbsp;can serve as documents at certain land and sea crossings. But you&rsquo;ll want to make sure you have a passport book if there&rsquo;s any chance you might leave or enter another country via plane, where passport cards won&rsquo;t work.Already have a passport? You&rsquo;ll want check if it&rsquo;s valid for at least six months after planned trips. That&rsquo;s because some countries like Thailand, Indonesia, Vietnam and Russia make this a requirement for entering their countries. Renewing a passport takes at least six to eight weeks through the mail, but those with proof of international travel (like a flight itinerary) can get an&nbsp;<a href=\"http://www.travelandleisure.com/travel-news/how-long-does-it-take-to-renew-a-passport\" target=\"_blank\">expedited passport renewal</a>&nbsp;for an additional $60 to the $110 fee and by visiting a passport center in person. International travel could also require a visa depending on the location and duration of your trip. Some countries have agreements in place that allow travelers to enter and leave visa free. For example, the&nbsp;<a href=\"https://ca.usembassy.gov/visas/\" target=\"_blank\">U.S. and Canada</a>&nbsp;don&rsquo;t require visas for travel (<a href=\"https://ca.usembassy.gov/visas/do-i-need-a-visa/\" target=\"_blank\">except in certain circumstances</a>), and&nbsp;<a href=\"https://ec.europa.eu/home-affairs/what-we-do/policies/borders-and-visas/visa-policy_en\" target=\"_blank\">Europe&rsquo;s 26 Schengen States</a>&nbsp;have a system where a visa issued by one of the 26 states typically allows travel throughout the others for up to 90 days.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img alt=\"\" src=\"http://15.207.152.121/smartapp/public/uploads/blog/1666092591download (1).jpg\" style=\"border-style:solid; border-width:5px; height:196px; width:257px\" /></p>', '<pre>\r\nسيحتاج المقيمون في الولايات المتحدة إلى رخصة قيادة محدثة لأنه بحلول 1 أكتوبر 2020 ، يجب أن يكون لدى جميع المقيمين في الولايات المتحدة الذين يسافرون محليًا بطاقات هوية متوافقة مع قانون الهوية الحقيقية ، مما زاد من متطلبات الأمان لرخص القيادة الحكومية وبطاقات الهوية.\r\n\r\nيحصل المقيمون في 24 ولاية بما في ذلك ألاسكا وكاليفورنيا وأيداهو ومين وأوريغون وواشنطن حتى 10 أكتوبر 2018 على بطاقة متوافقة مع الهوية الحقيقية ، على الرغم من أن الدول لديها خيار التقدم بطلب للحصول على إعفاءات حتى 1 أكتوبر 2020 عندما تكون المرحلة الأخيرة من قانون الهوية الحقيقية ، مما يعني أنه يجب على المقيمين في تلك الولايات التحقق بانتظام من حالة بطاقات الهوية الخاصة بهم قبل السفر بالطائرة.\r\n\r\nللسفر خارج الولايات المتحدة ، يمكن استخدام بطاقات جواز السفر أو بطاقات المسافر الموثوق بها كوثائق عند بعض المعابر البرية والبحرية. ولكن عليك التأكد من أن لديك دفتر جواز سفر إذا كانت هناك أي فرصة لمغادرة بلد آخر أو دخوله عبر الطائرة ، حيث لن تعمل بطاقات جواز السفر.\r\n\r\nهل لديك جواز سفر بالفعل؟ ستحتاج إلى التحقق مما إذا كانت صالحة لمدة ستة أشهر على الأقل بعد الرحلات المخطط لها. وذلك لأن بعض البلدان مثل تايلاند وإندونيسيا وفيتنام وروسيا تجعل هذا شرطًا لدخول بلادهم. يستغرق تجديد جواز السفر ما لا يقل عن ستة إلى ثمانية أسابيع عبر البريد ، ولكن أولئك الذين لديهم دليل على السفر الدولي (مثل خط سير الرحلة) يمكنهم الحصول على تجديد سريع لجواز السفر مقابل 60 دولارًا إضافيًا إلى رسوم 110 دولارًا وزيارة مركز الجوازات شخصيًا.\r\n\r\nقد يتطلب السفر الدولي أيضًا تأشيرة اعتمادًا على موقع ومدة رحلتك. بعض الدول لديها اتفاقيات سارية تسمح للمسافرين بالدخول والمغادرة بدون تأشيرة. على سبيل المثال ، لا تتطلب الولايات المتحدة وكندا تأشيرات للسفر (باستثناء ظروف معينة) ، ولدى 26 دولة من دول شنغن في أوروبا نظام تسمح فيه التأشيرة الصادرة عن إحدى الولايات الـ 26 بالسفر عبر الدول الأخرى لمدة تصل إلى 90 يومًا. .</pre>', '<pre>\r\nאלה בארה&quot;ב ירצו רישיון נהיגה עדכני מכיוון שעד 1 באוקטובר 2020, כל תושבי ארה&quot;ב הנוסעים מקומיים חייבים להיות בעלי זיהוי תואם לחוק ה-Real ID, שהגביר את דרישות האבטחה עבור רישיונות נהיגה ותעודות זהות של המדינה.\r\n\r\nתושבים ב-24 מדינות כולל אלסקה, קליפורניה, איידהו, מיין, אורגון וושינגטון יקבלו עד 10 באוקטובר 2018 כרטיס תואם Real-ID, אם כי למדינות יש אפשרות להגיש בקשה לפטור עד 1 באוקטובר 2020 כאשר השלב האחרון של חוק תעודת הזהות האמיתית נאכף, כלומר תושבים באותן מדינות צריכים לבדוק באופן קבוע את מצב תעודות הזהות שלהם לפני הטיסה.\r\n\r\nעבור נסיעות מחוץ לארה&quot;ב,&nbsp;כרטיסי דרכון&nbsp;או&nbsp;כרטיסי נוסע מהימנים&nbsp;יכולים לשמש כמסמכים במעברים יבשתיים וימיים מסוימים. אבל תרצה לוודא שיש לך פנקס דרכונים אם יש סיכוי שאתה עשוי לצאת או להיכנס למדינה אחרת באמצעות מטוס, שבה כרטיסי דרכונים לא יעבדו.\r\n\r\nיש כבר דרכון? תרצה לבדוק אם זה תקף לפחות שישה חודשים לאחר נסיעות מתוכננות. הסיבה לכך היא שמדינות מסוימות כמו תאילנד, אינדונזיה, וייטנאם ורוסיה מציבות זאת כדרישה לכניסה למדינות שלהן. חידוש דרכון נמשך לפחות שישה עד שמונה שבועות בדואר, אבל אלה עם הוכחה של נסיעה בינלאומית (כמו מסלול טיסה) יכולים לקבל&nbsp;חידוש דרכון מזורז&nbsp;בתוספת של $60 ל-$110 העמלה ועל ידי ביקור אישי במרכז דרכונים.\r\n\r\nנסיעות בינלאומיות עשויות לדרוש גם ויזה בהתאם למיקום ומשך הטיול שלך. לחלק מהמדינות יש הסכמים המאפשרים לנוסעים להיכנס ולצאת ללא ויזה. לדוגמה,&nbsp;ארה&quot;ב וקנדה&nbsp;אינן דורשות אשרות לנסיעות (למעט בנסיבות מסוימות), ול-26 מדינות שנגן של אירופה&nbsp;יש מערכת שבה ויזה שהונפקה על ידי אחת מ-26 המדינות מאפשרת בדרך כלל נסיעה במדינות האחרות למשך עד 90 יום .</pre>', 1, '2022-10-18 11:06:21', '2022-10-19 05:35:38'),
(41, 'The 10 Best Breakfast Restaurants in New Orleans', 'أفضل 10 مطاعم للإفطار في نيو أورلينز', '10 מסעדות ארוחת הבוקר הטובות ביותר בניו אורלינס', 'You may know New Orleans for its wild nightlife, but have you heard about The Big Easy\'s signature breakfast?', 'قد تعرف نيو أورلينز بحياتها الليلية الصاخبة ، لكن هل سمعت عن إفطار The Big Easy المميز؟', 'אתם אולי מכירים את ניו אורלינס בזכות חיי הלילה הפרועים שלה, אבל האם שמעתם על ארוחת הבוקר המיוחדת של The Big Easy?', '<p>You may know New Orleans for its wild nightlife, but have you heard about The Big Easy&#39;s signature breakfast? Whether you want to cure your hangover (or add to it) there are plenty of options available in New Orleans. From classic to historical to unique, there is a breakfast option for all. We have hole-in-the-walls and famous, widely-known breakfast venues. You want it, we got it!<br />\r\n<br />\r\nAt the Degas House bed and breakfast, we proudly give people an authentic New Orleans cultural experience. If you&#39;re looking for a vintage, beautiful place to stay, <a href=\"https://www.degashouse.com/accommodations.html\" target=\"_self\">we cannot recommend our rooms enough.&nbsp;</a>&nbsp;That being said, and wherever you say, we want to make sure you treat yourself from the moment you get up. Nothing is better than starting the day off with a delicious meal and a steaming cup of coffee. It&#39;s time for you to taste the best that New Orleans has to offer.<br />\r\n&nbsp;</p>', '<pre>\r\nقد تعرف نيو أورلينز بحياتها الليلية الصاخبة ، لكن هل سمعت عن إفطار The Big Easy المميز؟ سواء كنت ترغب في علاج مخلفاتك (أو الإضافة إليها) ، فهناك الكثير من الخيارات المتاحة في نيو أورلينز. من الكلاسيكي إلى التاريخي إلى الفريد ، هناك خيار إفطار للجميع. لدينا حفرة في الجدران وأماكن إفطار شهيرة ومعروفة على نطاق واسع. كنت ترغب في ذلك، وحصلنا على ذلك!\r\n\r\nفي مبيت وإفطار Degas House ، نقدم بكل فخر للناس تجربة ثقافية أصيلة في نيو أورلينز. إذا كنت تبحث عن مكان عتيق وجميل للإقامة ، فلا يمكننا التوصية بغرفنا بدرجة كافية. بعد قولي هذا ، وأينما قلت ، نريد أن نتأكد من أنك تعامل نفسك منذ اللحظة التي تستيقظ فيها. لا شيء أفضل من بدء اليوم بوجبة لذيذة وفنجان من القهوة على البخار. حان الوقت لتذوق أفضل ما تقدمه نيو أورلينز.</pre>', '<pre>\r\nאתם אולי מכירים את ניו אורלינס בזכות חיי הלילה הפרועים שלה, אבל האם שמעתם על ארוחת הבוקר המיוחדת של The Big Easy? בין אם אתה רוצה לרפא את ההנגאובר שלך (או להוסיף לו) יש הרבה אפשרויות זמינות בניו אורלינס. מקלאסי להיסטורי ועד ייחודי, ישנה אפשרות לארוחת בוקר לכולם. יש לנו חור בקירות ומקומות ארוחות בוקר מפורסמים ומוכרים. אתה רוצה את זה, הבנו את זה!\r\n\r\nב-Degas House B&amp;B, אנו בגאווה נותנים לאנשים חוויה תרבותית אותנטית בניו אורלינס. אם אתם מחפשים מקום וינטג&#39; ויפה לשהות בו, אנחנו לא יכולים להמליץ ​​מספיק על החדרים שלנו. עם זאת נאמר, ובכל מקום שתאמר, אנחנו רוצים לוודא שאתה מטפל בעצמך מהרגע שאתה קם. אין דבר טוב יותר מאשר להתחיל את היום עם ארוחה טעימה וכוס קפה מהביל. הגיע הזמן שתטעמו מהטוב ביותר שיש לניו אורלינס להציע.</pre>', 1, '2022-10-21 11:42:16', '2022-10-21 11:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `public_feed_comment`
--

CREATE TABLE `public_feed_comment` (
  `public_feed_comment_id` int NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `public_feed_id` int DEFAULT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `public_feed_comment`
--

INSERT INTO `public_feed_comment` (`public_feed_comment_id`, `user_id`, `public_feed_id`, `comment`, `created_at`, `updated_at`) VALUES
(6, 85, 12, 'Sddddfff', '2022-10-17 10:22:14', '2022-10-17 10:22:14'),
(8, 91, 20, 'Comment @17/10/2022', '2022-10-17 12:18:01', '2022-10-17 12:18:01'),
(9, 91, 31, 'Test @18/10/22', '2022-10-18 09:45:29', '2022-10-18 09:45:29'),
(11, 91, 34, 'Comment @18/10/22', '2022-10-18 11:15:55', '2022-10-18 11:15:55'),
(12, 75, 36, 'Hjn', '2022-10-18 13:39:45', '2022-10-18 13:39:45'),
(13, 75, 34, 'יפה', '2022-10-18 15:49:03', '2022-10-18 15:49:03'),
(14, 92, 34, 'Great Looks and Excellent Features are s are ava', '2022-10-19 05:17:24', '2022-10-19 05:17:24'),
(15, 96, 34, 'Hello', '2022-10-19 10:25:06', '2022-10-19 10:25:06'),
(16, 91, 36, 'Great Looks and Excellent Features are added to the product which is helping me with the same time as', '2022-10-19 13:31:19', '2022-10-19 13:31:19'),
(17, 131, 41, 'Comment @21/10/22', '2022-10-21 11:42:50', '2022-10-21 11:42:50'),
(18, 141, 34, 'Nice cafe with good stuff and staff with higher property to rent in the world to the same time as I am i eligible to apply', '2022-11-02 12:33:23', '2022-11-02 12:33:23'),
(19, 141, 36, 'Cafe with the same time international travel could for example 26schegen states have a system where a visa free', '2022-11-02 12:41:36', '2022-11-02 12:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `public_feed_comment_like`
--

CREATE TABLE `public_feed_comment_like` (
  `id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `public_feed_id` int NOT NULL,
  `public_feed_comment_id` int NOT NULL,
  `is_like` tinyint(1) NOT NULL COMMENT '1=like,0=unlike',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `public_feed_comment_like`
--

INSERT INTO `public_feed_comment_like` (`id`, `user_id`, `public_feed_id`, `public_feed_comment_id`, `is_like`, `created_at`, `updated_at`) VALUES
(11, 91, 20, 8, 0, '2022-10-17 12:19:24', '2022-10-17 12:19:26'),
(12, 91, 31, 9, 1, '2022-10-18 09:45:58', '2022-10-18 09:45:58'),
(13, 60, 34, 11, 1, '2022-11-01 05:44:34', '2022-11-01 05:44:34'),
(14, 141, 34, 11, 1, '2022-11-02 12:34:53', '2022-11-02 12:34:53'),
(15, 141, 34, 13, 1, '2022-11-02 12:34:56', '2022-11-02 12:34:56'),
(16, 141, 34, 14, 1, '2022-11-02 12:34:57', '2022-11-02 12:34:57'),
(17, 141, 36, 16, 1, '2022-11-02 12:42:08', '2022-11-02 12:42:08'),
(18, 141, 36, 19, 1, '2022-11-02 12:42:10', '2022-11-02 12:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `public_feed_images`
--

CREATE TABLE `public_feed_images` (
  `public_feed_image_id` int NOT NULL,
  `public_feed_id` int NOT NULL,
  `image` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `public_feed_images`
--

INSERT INTO `public_feed_images` (`public_feed_image_id`, `public_feed_id`, `image`, `created_at`, `updated_at`) VALUES
(2, 4, 'http://15.207.152.121/smartapp/public/uploads/public_feed/4/1665726227_503809.png', '2022-10-14 05:43:47', '2022-10-14 05:43:47'),
(3, 4, 'http://15.207.152.121/smartapp/public/uploads/public_feed/4/1665726227_595219.png', '2022-10-14 05:43:47', '2022-10-14 05:43:47'),
(4, 6, 'http://15.207.152.121/smartapp/public/uploads/public_feed/6/1665728067_871003.png', '2022-10-14 06:14:27', '2022-10-14 06:14:27'),
(5, 8, 'http://15.207.152.121/smartapp/public/uploads/public_feed/8/1665745640_361619.jpg', '2022-10-14 11:07:20', '2022-10-14 11:07:20'),
(6, 9, 'http://15.207.152.121/smartapp/public/uploads/public_feed/9/1665750090_788936.jpg', '2022-10-14 12:21:30', '2022-10-14 12:21:30'),
(12, 12, 'http://15.207.152.121/smartapp/public/uploads/public_feed/12/1666002093_38993.jpg', '2022-10-17 10:21:33', '2022-10-17 10:21:33'),
(70, 34, 'http://15.207.152.121/smartapp/public/uploads/public_feed/34/1666089019_963041.jpg', '2022-10-18 10:30:19', '2022-10-18 10:30:19'),
(71, 34, 'http://15.207.152.121/smartapp/public/uploads/public_feed/34/1666089029_122774.jpg', '2022-10-18 10:30:29', '2022-10-18 10:30:29'),
(81, 34, 'http://15.207.152.121/smartapp/public/uploads/public_feed/34/1666090464_524329.jpg', '2022-10-18 10:54:24', '2022-10-18 10:54:24'),
(82, 34, 'http://15.207.152.121/smartapp/public/uploads/public_feed/34/1666090524_239464.jpg', '2022-10-18 10:55:24', '2022-10-18 10:55:24'),
(87, 36, 'http://15.207.152.121/smartapp/public/uploads/public_feed/36/1666091518_889824.jpg', '2022-10-18 11:11:58', '2022-10-18 11:11:58'),
(88, 36, 'http://15.207.152.121/smartapp/public/uploads/public_feed/36/1666091596_782639.jpg', '2022-10-18 11:13:16', '2022-10-18 11:13:16'),
(96, 41, 'http://15.207.152.121/smartapp/public/uploads/public_feed/41/1666352536_988259.jpg', '2022-10-21 11:42:16', '2022-10-21 11:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `public_feed_like`
--

CREATE TABLE `public_feed_like` (
  `id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `public_feed_id` int NOT NULL,
  `is_like` tinyint(1) NOT NULL COMMENT '	1=like,0=unlike',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `public_feed_like`
--

INSERT INTO `public_feed_like` (`id`, `user_id`, `public_feed_id`, `is_like`, `created_at`, `updated_at`) VALUES
(8, 91, 11, 1, '2022-10-17 12:13:44', '2022-10-17 12:13:46'),
(9, 91, 20, 0, '2022-10-17 12:17:31', '2022-10-17 12:19:22'),
(10, 91, 31, 1, '2022-10-18 09:45:12', '2022-10-18 09:45:12'),
(12, 91, 34, 1, '2022-10-18 11:15:39', '2022-10-18 11:15:39'),
(14, 75, 34, 1, '2022-10-18 13:39:35', '2022-10-18 13:39:35'),
(15, 131, 41, 1, '2022-10-21 11:42:52', '2022-10-21 11:42:54'),
(16, 141, 34, 1, '2022-11-02 12:33:56', '2022-11-02 12:51:23'),
(17, 141, 36, 0, '2022-11-02 12:34:07', '2022-11-02 12:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `public_feed_report`
--

CREATE TABLE `public_feed_report` (
  `public_feed_report_id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `public_feed_id` int NOT NULL,
  `report` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `share_id` int NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `key` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `value` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '0=blog,1=public feed,2=coupan',
  `share_by` tinyint(1) DEFAULT NULL COMMENT '0=whatsapp , 1=email',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`share_id`, `user_id`, `key`, `value`, `type`, `share_by`, `created_at`, `updated_at`) VALUES
(3, 28, 'blog_id', '1', 0, 1, '2022-10-08 12:15:19', '2022-10-08 13:07:43'),
(4, 28, 'blog_id', '2', 0, 0, '2022-10-08 12:18:39', '2022-10-08 12:18:39'),
(6, 28, 'public_feed_id', '2', 1, 0, '2022-10-08 13:14:02', '2022-10-08 13:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `smart_cards`
--

CREATE TABLE `smart_cards` (
  `id` int NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `status` enum('Pending','Verified','Cancelled') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `smart_cards`
--

INSERT INTO `smart_cards` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 25, 'Cancelled', '2022-10-20 06:03:07', '2022-10-20 06:04:48'),
(3, 32, 'Pending', '2022-10-20 06:03:07', '2022-10-20 12:00:32'),
(4, 25, 'Pending', '2022-10-31 07:05:19', '2022-10-31 07:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` enum('Single','Married','Widowed','Separated','Divorced') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_child` int DEFAULT NULL,
  `occupation` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_level` enum('Primary','Secondary','Bachelor','Master','Doctorate') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_number` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_activity` enum('Construction','Education','FinancialInsurance','Accommodation','MedicalCare','Trade') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_sector` enum('Construction','Education','Chemical','Commerce','Health') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `establishment_year` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_logo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `business_hours` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` int NOT NULL COMMENT '1=merchant,0=user,3=SuperAdmin,4=SubAdmin',
  `street_address_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_number` int DEFAULT NULL,
  `house_number` int DEFAULT NULL,
  `city` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified_mobile_no` int NOT NULL DEFAULT '0',
  `verify_otp_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL COMMENT '1=active,2=inactive',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone_number`, `id_number`, `marital_status`, `no_of_child`, `occupation`, `education_level`, `business_name`, `registration_number`, `website`, `business_activity`, `business_sector`, `establishment_year`, `business_logo`, `business_hours`, `user_status`, `street_address_name`, `street_number`, `house_number`, `city`, `district`, `email_verified_at`, `remember_token`, `verify_otp`, `is_verified_mobile_no`, `verify_otp_time`, `status`, `created_at`, `updated_at`) VALUES
(21, 'Ankita', 'Patel', 'ankitad.knp@gmail.com', '$2y$10$iVEzYCQY0SL1CjU/kGtf3u00YqPv.H5woJuFkgGzLaa00og5a8p9y', '9890979676', '555', NULL, 2, 'servicesa', NULL, 'Test', '123', 'http://15.207.152.121/smartapp', NULL, NULL, '2018', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1664614326_103481.png', '7 AM to 9 PM', 0, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 0, '2022-09-30 09:40:05', 1, '2022-09-30 09:35:06', '2022-10-31 10:57:53'),
(23, '22', 'patel', 'ankita1231@gmail.com', '$2y$10$do382UIGZjqN5k/C3jmHV.TTr/urWxSc.zFzeZm/R8tG2Cx5bPUsm', '9090909090', '555', 'Single', 0, 'services', NULL, 'Test', '123', 'http://15.207.152.121/smartapp', 'Construction', 'Construction', '2018', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1667292560_763388.jpg', '7 AM to 9 PM', 1, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 1, '2022-09-30 13:52:55', 1, '2022-09-30 13:47:56', '2022-11-01 08:49:20'),
(24, 'admin', 'admin', 'admin@admin.com', '$2y$10$X54hT3PD4y7LDxYVvE2znOrg3sa/K8YHWVUmzsX3HtfGd/.b9fXaq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL, '2022-10-14 11:26:52'),
(25, 'Ankita1', 'patel', 'merchant@gmail.com', '$2y$10$8KfnEA22mbqsJm9CHzhzu.2Mq/iBRF13UlQyI/twFaLQuU/gB4PYG', '9890979676', '555', 'Married', 0, 'services', 'Primary', 'Test', '123', 'http://15.207.152.121/smartapp', 'FinancialInsurance', 'Chemical', '2018', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1666181886_979926.jpg', '7 AM to 9 PM', 1, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 0, '2022-10-01 08:49:10', 1, '2022-10-01 08:44:10', '2022-10-19 12:18:06'),
(28, 'Ankita1', 'patel', 'client@gmail.com', '$2y$10$6yJwOldVGXewXfcalRDMJete0kOOSuiOUnIM6SE8cH8jUy6Adski2', '9890979676', '555', NULL, 0, 'services', NULL, 'Test', '123', 'http://15.207.152.121/smartapp', NULL, NULL, '2018', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1664614109_820930.png', '7 AM to 9 PM', 0, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 0, '2022-10-01 08:52:35', 1, '2022-10-01 08:47:35', '2022-10-07 12:02:59'),
(30, 'Test', 'Test', 'Test1@gmail.com', '$2y$10$pNQjh7aVVSeSxbHDuX3Q9e1fdf8mhbOt4SM3fAk1Zwf0rbLgSXoY2', '12301230123', '12', NULL, 0, 'Dfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Fdfd', 3445, 87, 'Fhg', 'Ghg', NULL, NULL, '111111', 1, '2022-10-01 09:38:35', 1, '2022-10-01 09:33:35', '2022-10-01 09:40:35'),
(31, 'Test', 'Test', 'Test3@gmail.com', '$2y$10$.C2BBmVpieYOhUw7l6AxcufIhZHInsVTfxslea5mfVUA.AyT36rny', '0231546456', '12', NULL, 2, 'D', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Ss', 65, 6565, 'Fdfg', 'Gfgf', NULL, NULL, '111111', 0, '2022-10-01 09:49:19', 1, '2022-10-01 09:44:19', '2022-10-01 09:44:19'),
(32, 'Test', 'Test', 'Testqw@gmail.com', '$2y$10$jPtnjxyWGhPy4AZHFwtSOe9Sjnw8TS615d5hPAuak1xH5YSb1Gw9K', '1234567901', '12', NULL, 2, 'Sdfs', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Ddd', 565, 6565, 'Dgd', 'Fgff', NULL, NULL, '111111', 0, '2022-10-01 09:54:16', 1, '2022-10-01 09:49:16', '2022-10-01 09:49:16'),
(35, 'Test', 'Test', 'Test1237@gmail.com', '$2y$10$Sq2DZNLiOL7jUVXifqwgiOx8M9KxvyBrarbSC6SJsj9upI7t3Ae7u', '1230123012301', '32', NULL, 2, 'Des', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Test', 54, 2125, 'Dfd', 'Dgfgff', NULL, NULL, '111111', 0, '2022-10-01 10:24:44', 1, '2022-10-01 10:19:44', '2022-10-01 10:19:44'),
(36, 'Test', 'Test', 'Patel@gmail.com', '$2y$10$7v6SR2fxok2UFUU4Zp/UmOwtJbVthLKovV27T7t1nah8LyNqHwpUK', '0123456789987', '32', NULL, 1, 'Dec', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Eer', 54, 45, 'Gf', 'Fg', NULL, NULL, '111111', 0, '2022-10-01 10:30:44', 1, '2022-10-01 10:25:44', '2022-10-01 10:25:44'),
(37, 'Test', 'Sss', 'Testp@gmail.com', '$2y$10$NiOuQ23Nr6BxM.dS2y/ITuEJ/VptO6UEvgUFPVxsoybvN2VDaeB32', '123456789032', '123', NULL, 2, 'Dfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Teresa', 565, 12313, 'Dfd', 'Fdfdfd', NULL, NULL, '111111', 0, '2022-10-01 13:36:55', 1, '2022-10-01 13:31:55', '2022-10-01 13:31:55'),
(38, 'Rewn', 'Ndkndf', 'Post@gmail.com', '$2y$10$iSnHPb0lfaB4zHnEPTDh/OQe.FRZSmBpxomGLTheIqrjBWbscSkiO', '123456789021', '21', NULL, 2, 'Desd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Dfdfd', 636, 2312, 'Fddf', 'Dfdfd', NULL, NULL, '111111', 1, '2022-10-01 13:39:24', 1, '2022-10-01 13:34:24', '2022-10-01 13:34:36'),
(39, 'Dgdfg', 'Fgfgf', 'Typl@gmail.com', '$2y$10$dpphMmNcltzgjglw/jH3bu7baJPQeoFyk75xAENwDAGHO8v.MhjOe', '01234567895', '32', NULL, 3, 'Xcxc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Dfdfd', 215, 232, 'Derdg', 'Ssds', NULL, NULL, '111111', 1, '2022-10-01 13:45:44', 1, '2022-10-01 13:40:45', '2022-10-01 13:41:08'),
(40, 'Dfdfd', 'Ddfdf', 'Testmn@gmail.com', '$2y$10$eP2pzVz9O/R5zy5mcMbB/.C2MbGTDGeIHwrmWEYmwA1RzFEvsY1Im', '3625149870', '32', NULL, 3, 'Sdsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Ssfdf', 343, 3454, 'Dfdf', 'Jkjhh', NULL, NULL, '111111', 1, '2022-10-01 13:47:30', 1, '2022-10-01 13:42:30', '2022-10-03 04:41:32'),
(41, 'ankitaaa', 'patel', 'a@gmail.com', '$2y$10$bEKsZA7Mhs90TEDbP59rMO3EIQKqScKVH.mvL0AB6e1v9NVFirRcG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2022-10-03 11:39:50', '2022-10-13 10:47:53'),
(43, '22', 'patel', 'ankita1223@gmail.com', '$2y$10$OEXd2vJ1.WF12uy/l3pqEOW2MuyKXPh8ZUKZFzS7zt0EtcLCMgAIS', '9890979676', '555', NULL, 0, 'services', NULL, 'Test', '123', 'http://15.207.152.121/smartapp', NULL, NULL, '2018', NULL, '7 AM to 9 PM', 0, 'test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 0, '2022-10-07 06:33:20', 1, '2022-10-07 06:28:20', '2022-10-07 06:28:20'),
(46, 'Piyush', 'Chouvhan', 'piyushc.kn1p@gmail.com', '$2y$10$L5q1OObTih/OVQZ9hRBKp.6SwI0oicI8PVOF3pmFJ9xdqnhBuOKBC', '8275608644', '555', NULL, 0, 'services', NULL, 'Test', '123', NULL, NULL, NULL, '2018', NULL, '7 AM to 9 PM', 0, 'test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 0, '2022-10-07 09:38:45', 1, '2022-10-07 09:33:45', '2022-10-07 09:33:45'),
(47, 'Piyush', 'Chouvhan', 'piyush@gmail.com', '$2y$10$UT2XSZgNj6mHx9UQnIaH/e6HyNuSiRGNcUAbAgUXUwk7XIJRNJ3IO', '9890979676', '555', NULL, 0, 'services', NULL, 'Test', '123', 'http://15.207.152.121/smartapp', NULL, NULL, '2018', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1665136864_301231.jpg', '7 AM to 9 PM', 0, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 0, '2022-10-07 10:06:04', 1, '2022-10-07 10:01:04', '2022-10-07 10:48:06'),
(48, 'Piyush', 'Chouvhan', 'merchant@gmaill.com', '$2y$10$64V7.KwyC6Q.aZiXjWr34e1488tgY.b.b6z3M58mHZnloDuYbLyRm', '9890979676', '555', NULL, 0, 'services', NULL, 'Test', '123', 'http://15.207.152.121/smartapp', NULL, NULL, '2018', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1665140684_882686.jpg', '7 AM to 9 PM', 0, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 1, '2022-10-07 11:09:44', 1, '2022-10-07 11:04:44', '2022-10-07 11:15:12'),
(49, 'Piyush', 'Chouvhan', 'abc@gmail.com', '$2y$10$UHd79/SkQNXkcHUxBTq.N.pqAryDYDYslntGmx8VYhjVnr/8OjkhW', '9890979676', '650', NULL, 0, 'services', NULL, 'Test', '123', 'http://15.207.152.121/smartapp', NULL, NULL, '2018', NULL, '7 AM to 9 PM', 0, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 1, '2022-10-07 11:49:19', 1, '2022-10-07 11:44:19', '2022-10-07 12:19:30'),
(51, 'Test', 'Test', 'Test12@gmail.com', '$2y$10$PK4Bh3ReJRiUGVbBr2aWYOEf3aAfoMjYH1ZpJNlftjMc2FH6uXqni', '01234567890', '32', NULL, 4, 'Dev', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Dfdf', 8888, 65, 'Ggggg', 'Llgggees', NULL, NULL, '111111', 1, '2022-10-10 05:07:15', 1, '2022-10-10 05:02:15', '2022-10-10 12:53:27'),
(52, 'Test13', 'Test', 'Test13@gmail.com', '$2y$10$UY2t2Mfe/UceGPTopp1IJuuA0rnEVcYga/GR1dXC4DWYcgdoTIJHS', '0123456789', '012', NULL, 2, 'Dev', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Dter', 123, 23, 'Rtdfdd', 'Dgfgfg', NULL, NULL, '111111', 1, '2022-10-10 05:16:40', 1, '2022-10-10 05:11:40', '2022-10-10 05:11:55'),
(53, 'Test14', 'Test', 'Test14@gmail.com', '$2y$10$JZLr/0llRKDe0z65OWLVEecLX6aUuG8xVJWgPD2GxyVIKfnRNUWNC', '01234567890', '32', NULL, 2, 'Fdfd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Fgfgf', 45, 65, 'Gfg', 'Highf', NULL, NULL, '111111', 1, '2022-10-10 05:19:59', 1, '2022-10-10 05:14:59', '2022-10-10 05:15:08'),
(54, 'Test15', 'Test', 'piyushc.knp@gmail.com', '$2y$10$sWL30okhLpuYmJQx5eGClOaPAU5rgVfqAR1ZV8aouC87gE6JD7eIK', '01234567893', '32', NULL, 1, 'Sds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Des', 54, 2, 'Ssd', 'Thhtt', NULL, NULL, '111111', 1, '2022-10-10 05:23:51', 1, '2022-10-10 05:18:51', '2022-11-01 10:54:03'),
(55, 'Test16', 'Test', 'pradipr.knp@gmail.com', '$2y$10$mqoQmBsHdXz2.QXMtXSmruTX5ytBL2leA5xoP55FujRH9uN/S2wPS', '01234567890', '012', NULL, 2, 'Dwsds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'Eee', 566, 122, 'Sfdd', 'Yjyy', NULL, NULL, '111111', 1, '2022-10-10 05:28:34', 1, '2022-10-10 05:23:34', '2022-11-01 06:31:51'),
(56, 'Test17', 'Test', 'Test17@gmail.com', '$2y$10$f1sY7bL.uoZFoNDCKjW0gOLR4N3SEiB00k1/5MnpYVupx0QGgY5WW', '012345678902', '32', NULL, 1, 'Sds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Fd', 44, 54, 'Dfdf', 'Vccc', NULL, NULL, '111111', 1, '2022-10-10 05:34:30', 1, '2022-10-10 05:29:30', '2022-10-10 05:29:42'),
(57, 'Test18', 'Test', 'Test18@gmail.com', '$2y$10$CKUAfLqTHkLyJS66GuR.ueikCWL3Luv0ZdyMhHhJFdTq2VO8lLe1i', '01234567890', '012', NULL, 2, 'Sdsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Dfd', 34354, 45, 'Gdf', 'Bobc', NULL, NULL, '111111', 1, '2022-10-10 05:40:43', 1, '2022-10-10 05:35:43', '2022-10-10 05:35:55'),
(58, '22', 'patel', 'client1@gmail.com', '$2y$10$QQovTJzhrQMZKPkj0h8adOmO0H9oV06y/Gwtf1hgNmMajPBOxGnH6', '9090909090', '555', NULL, 0, 'services', NULL, 'Test', '123', 'http://15.207.152.121/smartapp', NULL, NULL, '2018', '1665400660_681929.jpg', '7 AM to 9 PM', 1, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 0, '2022-10-10 11:22:40', 1, '2022-10-10 11:17:40', '2022-10-10 11:17:40'),
(59, 'Ankita1', 'patel', 'merchant11@gmail.com', '$2y$10$o8htZwyKwl/20wCmze5nYOJMYIzff.QtqpQxsWlW2vA8jlZB6TrxG', '9890979676', '555', NULL, 0, 'services', NULL, 'Test', '123', 'http://15.207.152.121/smartapp', NULL, NULL, '2018', '1665401421_700402.jpg', '7 AM to 9 PM', 1, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 1, '2022-10-10 11:29:08', 1, '2022-10-10 11:24:08', '2022-10-10 11:30:21'),
(60, 'Ketul', 'Patel', 'Ketul@gmail.com', '$2y$10$8KfnEA22mbqsJm9CHzhzu.2Mq/iBRF13UlQyI/twFaLQuU/gB4PYG', '01234567890', '12', 'Single', 0, 'Dev', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Ahm', 45, 32, 'Ahmedabad', 'Ahm', NULL, NULL, '111111', 1, '2022-10-11 04:58:01', 1, '2022-10-11 04:53:01', '2022-10-18 06:12:09'),
(61, '22', 'patel', 'client11@gmail.com', '$2y$10$0fuKHWJgVhZXS/zoL7O1ReQZooIFo1oCcO/LPdnZAWZ9Oul8mIV5S', '9090909090', '555', NULL, 0, 'services', NULL, 'Test', '123', 'http://15.207.152.121/smartapp', NULL, NULL, '2018', '1665464800_907260.jpg', '7 AM to 9 PM', 1, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 0, '2022-10-11 05:11:40', 1, '2022-10-11 05:06:40', '2022-10-11 05:06:40'),
(62, 'test', 'test', 'test@gmail.com', '$2y$10$X5h8VJaEOMGklGjDpmqj7u39eCA.e344Jy6trizGhTs5YVSrWNsyy', '01234567890', '12', NULL, 0, 'Dev', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'test', 456, 555, 'Ffjj', 'Vniigg', NULL, NULL, '111111', 1, '2022-10-11 06:17:37', 1, '2022-10-11 06:12:37', '2022-10-11 06:12:53'),
(63, '22', 'patel', 'client1@gmail.com', '$2y$10$8qjlxOPccil1Fa8N2GmiPemo9KZn/1areTyhYsT2fgozNCa7YKsa.', '9090909090', '555', NULL, 0, 'services', NULL, 'Test', '123', 'http://15.207.152.121/smartapp', NULL, NULL, '2018', NULL, '7 AM to 9 PM', 0, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 0, '2022-10-11 06:30:24', 1, '2022-10-11 06:25:25', '2022-10-11 06:25:25'),
(64, 'Ketul', 'Patel', 'Test@yahoo.com', '$2y$10$bF8dx0X1x7YmYXOXScQiU.xDekdJHyJkhB/wTv9iPly1.dheWyZCy', '0865599858', '995', NULL, 2, 'Jjj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Ghh', 255, 63, 'A', 'Texxc', NULL, NULL, '111111', 1, '2022-10-11 06:40:46', 1, '2022-10-11 06:35:46', '2022-10-11 06:35:53'),
(65, 'Test01', 'Test', 'Test01@gmail.com', '$2y$10$Mu93m4wzJzBdtKGKe5OwDOldN95jPD5yCVXXawIYvYPFG4TGeueMq', '0123456789', '012', NULL, 0, 'Dev', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Sdfsd', 334, 345355, 'Sdsds', 'Sfddd', NULL, NULL, '111111', 1, '2022-10-11 06:43:57', 1, '2022-10-11 06:38:57', '2022-10-11 06:39:13'),
(66, 'patel', 'Test', 'Testpatel@gmail.com', '$2y$10$6MeWjNidc2.tefmgx8OY/uyUx.sEFocCLBb0RSSR6jeFWCkP4e0PC', '98745612301', '78', NULL, 0, 'dsds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'dsfdd', 555, 56, 'Ffvvv', 'Vvbbb', NULL, NULL, '111111', 1, '2022-10-11 06:55:04', 1, '2022-10-11 06:50:04', '2022-10-11 06:50:11'),
(67, 'Test', 'Test', 'Test09@gmail.com', '$2y$10$BxJj.wXUydgXmMuUtXmypO2qPpP6fFPl4bK3FRE0bVZxXtLkoVJb2', '07896541230', '36', 'Married', 2, 'Hhdjd', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Ffff', 8565, 885, 'Rtttt', 'Jhgff', NULL, NULL, '111111', 1, '2022-10-11 07:18:32', 1, '2022-10-11 07:13:32', '2022-10-11 07:13:38'),
(68, 'Test', 'Test', 'Test02@gmail.com', '$2y$10$ieas26Bhi3g2dUZl8tApieNLJS1bmIbxYqBhXNP.d.XkE3bsgKmRi', '32106549870', '14', 'Married', 1, 'Dev', 'Secondary', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Adsd', 3345, 465, 'Fds', 'Fgfgfgff', NULL, NULL, '111111', 1, '2022-10-11 07:21:07', 1, '2022-10-11 07:16:07', '2022-10-11 07:16:17'),
(74, '22', 'eee', 'client1e@gmail.com', '$2y$10$taewRI9niN5Q.fTM6QlS3OTeJinYsC23ph6qMQwx6wHMiGUpuMzkK', '9090909090', '555', 'Married', 0, 'services', 'Primary', 'Test', '123', 'http://15.207.152.121/smartapp', NULL, NULL, '2018', '1665474178_816963.png', '7 AM to 9 PM', 0, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 0, '2022-10-11 07:47:58', 1, '2022-10-11 07:42:58', '2022-10-11 07:42:58'),
(75, 'תושב', 'חכם', 'Hanansuissa1407@gmail.com', '$2y$10$jDE629KontIxHaUAqyVy8eiee.EMG5xJQYmsTLVeRQI9lbsVgCU/u', '05454777770', '043370550', 'Single', 0, 'אחלה', 'Master', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'נחל לכיש', 23, 3, 'אשדוד', 'מרכז דרום', NULL, NULL, '111111', 1, '2022-10-11 11:28:13', 1, '2022-10-11 11:23:13', '2022-10-11 11:25:45'),
(84, 'Pradip', 'Rathod', 'pradipr.knp1@gmail.com', '$2y$10$U4HU69zss5o6o/hpyNWIyeEh9MiPV46vk12yRysXD3kbJ2gs0ps/S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2022-10-14 05:10:33', '2022-10-14 05:56:25'),
(87, 'Piyush', 'Chouvhan', 'piyushgchouvhan@gmail.com', '$2y$10$.73XJOuXmffNPulMf08luupuhzks7CS5nbv4T/Q/YOQ35TzKPvFK2', '1234567890', '133', 'Single', 0, 'Service', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Aga', 764, 4949, 'Amravati', 'Amravati', NULL, NULL, '111111', 1, '2022-10-14 12:21:08', 1, '2022-10-14 12:16:08', '2022-10-17 11:27:56'),
(88, 'piyush', 'chouvahn', 'abc@gmail.com', '$2y$10$j.nSy3zSx.PwlVsmKOUnJOQegfLJPCiRxQ2rOCSA3GBQtF/kOSWhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, '2022-10-14 12:16:57', '2022-10-17 10:33:20'),
(89, 'Absb', 'Djdnd', 'abc1@gmail.com', '$2y$10$eI9UljTSPhrWb77hbKl7s.t1M9sOFlAZ53J2W/PxjQ7rhk1rc5dpi', '1234567890', '764', 'Single', 0, 'Service', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Susdh', 46446, 56565, 'Xhxhx', 'Xhxhx', NULL, NULL, '111111', 1, '2022-10-17 06:48:41', 1, '2022-10-17 06:43:41', '2022-10-17 06:43:48'),
(90, 'A', 'Abc', 'ab@gmail.com', '$2y$10$eOLH6RUSI2avHlX2ndkJqesf2VHXNnhyAJNH2XZD8U1MmxXK2Vso6', '1234567890', '123', 'Single', 0, 'Service', 'Master', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Aha', 46464, 4646, 'Shsh', 'Sysgs', NULL, NULL, '111111', 1, '2022-10-17 07:09:48', 1, '2022-10-17 07:04:48', '2022-11-01 11:54:28'),
(91, 'Piyush', 'Chouvhan', 'abc123@gmail.com', '$2y$10$TcOALQAX.f8sJGZajAJW8uaNKVYf7p2y7JTe0wDI0qrrk7DaPI5A6', '1234567890', '123', 'Single', 0, 'Service', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '12345', 12345, 12345, 'Amravati', 'Amravati', NULL, NULL, '111111', 1, '2022-10-17 11:40:29', 1, '2022-10-17 11:35:29', '2022-10-17 12:45:42'),
(92, 'Piyush', 'Chouvhan', 'p@gmail.com', '$2y$10$MdhCeYGAbFjJAeVKZj/M2OqTOtk1wG6FjziYyiR1msMWAZ2JH/V7i', '1234567890', '12', 'Single', 0, 'Service', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '22', 22, 22, 'Amravati', 'Amravati', NULL, NULL, '111111', 1, '2022-10-19 04:39:41', 1, '2022-10-19 04:34:41', '2022-10-19 04:37:51'),
(94, NULL, NULL, 'testy@gmail.com', '$2y$10$UfEKa5pv1dCfDckb4GFr7.bgX48tjjS7MIZgkUSChXhyBxLa1pGiy', '0123456789', NULL, 'Single', NULL, NULL, NULL, 'test', '12', 'web.com', 'Education', 'Education', '1988', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1667195716_467424.jpg', '12AM to 10PM', 1, 'Hii', 43, NULL, NULL, 'Gdfgff', NULL, NULL, '111111', 1, '2022-10-19 09:02:58', 1, '2022-10-19 08:57:58', '2022-11-02 12:07:45'),
(96, NULL, NULL, 'testy1@gmail.com', '$2y$10$qwPhpuIQt1oP2vZmlb6c2u6SXE8JSCaouMJXbC1BjFcYR5pQRG/fi', '0123456789', NULL, 'Married', NULL, NULL, NULL, 'Test merchant kl', '12', 'web.com', 'Construction', 'Education', '1952', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1666182994_570263.jpg', '12AM to 12PM', 1, 'Bfgfg', 65, NULL, NULL, 'Fgfgfgf', NULL, NULL, '111111', 1, '2022-10-19 10:15:41', 1, '2022-10-19 10:10:41', '2022-10-19 12:59:44'),
(101, 'xyz', 'xyz', 'xyz@gmail.com', '$2y$10$y1aO1cQzdIC01BlCsjKAau32uTe.Hf/19nSLFWj1eN6U.uz74GyrW', '1234567890', '123', 'Single', 0, 'Service', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '123', 123, 123, 'Amravati', 'Amravati', NULL, NULL, '111111', 0, '2022-10-19 13:39:38', 1, '2022-10-19 13:34:38', '2022-10-19 13:34:38'),
(102, 'xyz', 'xyz', 'xyz123@gmail.com', NULL, '1234567890', '123', 'Single', 0, 'Service', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '12', 123, 123, 'Amravati', 'Amravati', NULL, NULL, '111111', 0, '2022-10-19 13:42:32', 1, '2022-10-19 13:37:32', '2022-10-21 04:43:21'),
(103, 'Pq', 'Pqr', 'pqr@gmail.com', '$2y$10$5kIfU83wJWexDXYoEOD5eepiqBJqxlaP2vataACXlR6OUeE3ER5nu', '1234567890', '12', 'Single', 0, 'Service', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '123', 123, 123, 'Amt', 'Amt', NULL, NULL, '111111', 0, '2022-10-19 13:46:19', 1, '2022-10-19 13:41:19', '2022-10-19 13:41:19'),
(104, NULL, NULL, 'testy11@gmail.com', '$2y$10$6F4YrpINTJmFYUQL3XgZbelOE0J/bVHxg18TKh2Sq0my5lvz74R2W', '0123456789', NULL, 'Widowed', NULL, NULL, NULL, 'test', '12', 'web.com', 'FinancialInsurance', 'Chemical', '2012', 'undefined', '12AM to 12PM', 1, 'Ffff', 2222, NULL, NULL, 'sdsds', NULL, NULL, '111111', 0, '2022-10-20 04:26:47', 1, '2022-10-20 04:21:47', '2022-10-20 04:21:47'),
(105, 'ketul', 'test', 'ketul01@gmail.com', '$2y$10$iAQ1cBxx1H6.IFGwgX6OrOzfE3Sq61KzQmmUPmId/GCnbFYFakcbm', '01234567890', '12', 'Widowed', 2, 'Dev', 'Master', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Ffhh', 56, 89, 'Dffg', 'Hj', NULL, NULL, '111111', 1, '2022-10-20 04:50:00', 1, '2022-10-20 04:45:00', '2022-10-20 04:45:07'),
(112, NULL, 'patel', 'm19@gmail.com', '$2y$10$Oq.HMjGtWIrcjn6THtujxulYQNxce.aVqsGz2M6Cwlksk/AYUNjCW', '9090909090', '555', 'Married', 0, 'services', 'Primary', 'Test', '123', 'http://15.207.152.121/smartapp', 'FinancialInsurance', 'Chemical', '1945', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1666243880_267630.png', '7 AM to 9 PM', 1, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, '111111', 0, '2022-10-20 05:36:20', 1, '2022-10-20 05:31:20', '2022-10-20 05:31:20'),
(113, NULL, NULL, 'testy12@gmail.com', '$2y$10$CkFwu/BbSbkwqSulxW5Ef.9S/NapmPVGUQ1fo2MbjU12m9aj7BC.O', '0123456789', NULL, 'Widowed', NULL, NULL, NULL, 'Test Business', '12', 'web.com', 'FinancialInsurance', 'Chemical', '1845', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1666244241_588517.jpg', '12AM to 12PM', 1, 'Dhhh', 888, NULL, NULL, 'Ffff', NULL, NULL, '111111', 1, '2022-10-20 05:42:21', 1, '2022-10-20 05:37:21', '2022-10-20 05:39:23'),
(118, NULL, NULL, 'Testketul@gmail.com', '$2y$10$ss33XyEw0sov9mZfVIF2MeFxH2haZ7yjoUj5kWz/2xvko7GrRLEu.', '1234567890', NULL, 'Widowed', NULL, NULL, NULL, 'Testke', '1234', 'Web.com', 'FinancialInsurance', 'Chemical', '1986', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1666247000_535107.jpg', '12AM to 12PM', 1, 'Ahmedabad', 123, NULL, NULL, 'Ahmedabad', NULL, NULL, '111111', 1, '2022-10-20 06:28:20', 1, '2022-10-20 06:23:20', '2022-10-20 06:23:25'),
(125, 'P', 'P', 'P12@gmail.com', NULL, '1234567890', '123', 'Single', 0, 'Business', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '123', 123, 123, 'Amravati', 'Amravati', NULL, NULL, '111111', 1, '2022-10-21 06:11:54', 1, '2022-10-21 06:06:54', '2022-11-01 11:31:42'),
(127, 'P', 'pqr', 'P1@gmail.com', NULL, '1234567890', '123', 'Single', 1, 'Service', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '123', 123, 123, 'Amravati', 'Amravati', NULL, NULL, '111111', 1, '2022-10-21 06:40:33', 1, '2022-10-21 06:35:33', '2022-11-01 11:30:10'),
(128, 'Piyush', 'chouvhan', 'ab20@gmail.com', NULL, '1234567890', '12', 'Single', 0, 'Service', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '12', 1234, 123, 'Amravati', 'Amravati', NULL, NULL, '111111', 1, '2022-10-21 06:48:00', 1, '2022-10-21 06:43:00', '2022-11-01 11:28:12'),
(129, NULL, NULL, 'p11@gmail.com', '$2y$10$T1cCXccj8ZoRGCaTJH3L.Olc6EkVxEfk5N5FbknOfDG6eP9mYrwjW', '1234567890', NULL, 'Single', NULL, NULL, NULL, 'Abc', '1534', 'abc.com', 'Construction', 'Education', '1986', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1666344515_793224.png', '9AM to 8PM', 1, '122', 123, NULL, NULL, 'Amravati', NULL, NULL, '111111', 1, '2022-10-21 09:32:51', 1, '2022-10-21 09:27:51', '2022-11-01 11:39:40'),
(131, 'Piyush', 'Chouvhan', 'piyushg@gmail.com', NULL, '1234567890', '123', 'Single', 0, 'Service', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '123', 123, 123, 'Amravati', 'Amravati', NULL, NULL, '111111', 1, '2022-10-21 11:25:33', 1, '2022-10-21 11:20:33', '2022-10-21 11:45:00'),
(132, NULL, NULL, 'piyushc.knp@gmail.com', '$2y$10$sWL30okhLpuYmJQx5eGClOaPAU5rgVfqAR1ZV8aouC87gE6JD7eIK', '1234567890', NULL, 'Married', NULL, NULL, NULL, 'Abc', '123456', 'abc.com', 'Education', 'Chemical', '1985', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1667219886_427455.jpg', '9AM to 9PM', 1, '1985', 185, NULL, NULL, 'Amt', NULL, NULL, '111111', 1, '2022-10-31 12:43:06', 1, '2022-10-31 12:38:06', '2022-11-01 10:54:03'),
(137, NULL, NULL, 'test@knp.tech', '$2y$10$aweO9d6rGgZjBcHVYtpP5ONJ3y3Ua/7l2GldwlyWd3lPYlJfqh28u', '1234567890', NULL, 'Single', NULL, NULL, NULL, 'KNP Tech', '0111', 'http://15.207.152.121', 'Construction', 'Construction', '2022', 'http://15.207.152.121/smartapp/public/uploads/business_logo/1667293215_6389.png', '8', 1, 'Test', 1, NULL, NULL, 'Test', NULL, NULL, NULL, 0, NULL, 1, '2022-11-01 09:00:15', '2022-11-01 09:00:15'),
(139, 'Ankita1', 'patel', 'm19@gmail.com', '$2y$10$xpWaDyc19h8wH6yGCcUA8.VL66bQ0UboVTT7LA9FoPa.O20UJ8lDS', '9890979676', '555', 'Married', 0, 'services', 'Primary', 'Test', '123', 'http://15.207.152.121/smartapp', 'FinancialInsurance', 'Chemical', '2018', NULL, '7 AM to 9 PM', 0, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, NULL, 0, NULL, 1, '2022-11-01 11:47:27', '2022-11-01 11:57:25'),
(140, 'PC', 'RATHOD', 'pradipr@gmail.com', '$2y$10$yGIjapBxN73anfr5P3GieOo81EmJLtaVCwtOtMzrRUOPkNL7IZd7C', '9890979676', '555', 'Married', 0, 'services', 'Primary', 'Test', '123', 'http://15.207.152.121/smartapp', 'FinancialInsurance', 'Chemical', '2018', NULL, '7 AM to 9 PM', 0, 'Test', 2, 2, 'Ahmedabad', 'Ahmedabad', NULL, NULL, NULL, 0, NULL, 1, '2022-11-01 11:59:06', '2022-11-01 12:01:43'),
(141, 'Piyush', 'Chouvhan', 'piyushc.knp@gmail.com', '$2y$10$HQf9a0OHbJZlda9oXaF/RetwOUiglYifkgfKeMwl70T8AK.g5rddO', '1234567890', '123', 'Single', 0, 'Service', 'Bachelor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '123', 123, 123, 'Amravati', 'Amravati', NULL, NULL, '111111', 1, '2022-11-02 12:06:57', 1, '2022-11-02 12:01:57', '2022-11-02 12:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `use_coupon`
--

CREATE TABLE `use_coupon` (
  `use_coupon_id` int NOT NULL,
  `user_id` int NOT NULL,
  `coupon_id` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `use_coupon`
--

INSERT INTO `use_coupon` (`use_coupon_id`, `user_id`, `coupon_id`, `created_at`, `updated_at`) VALUES
(2, 25, 3, '2022-10-11 06:05:40', '2022-10-11 06:05:40'),
(3, 60, 12, '2022-10-17 06:54:44', '2022-10-17 06:54:44'),
(4, 60, 24, '2022-10-17 08:27:23', '2022-10-17 08:27:23'),
(5, 91, 24, '2022-10-17 11:48:35', '2022-10-17 11:48:35'),
(6, 91, 23, '2022-10-17 11:49:27', '2022-10-17 11:49:27'),
(7, 91, 9, '2022-10-17 12:49:26', '2022-10-17 12:49:26'),
(8, 91, 7, '2022-10-18 13:04:20', '2022-10-18 13:04:20'),
(9, 75, 6, '2022-10-18 13:41:34', '2022-10-18 13:41:34'),
(10, 119, 24, '2022-10-20 07:04:37', '2022-10-20 07:04:37'),
(11, 128, 26, '2022-10-21 06:48:36', '2022-10-21 06:48:36'),
(12, 60, 32, '2022-11-01 05:58:51', '2022-11-01 05:58:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`),
  ADD KEY `blog_ibfk_1` (`category_id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`blog_comment_id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `blog_comment_ibfk_2` (`user_id`);

--
-- Indexes for table `blog_comment_like`
--
ALTER TABLE `blog_comment_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comment_like_ibfk_1` (`blog_comment_id`),
  ADD KEY `blog_comment_like_ibfk_2` (`blog_id`),
  ADD KEY `blog_comment_like_ibfk_3` (`user_id`);

--
-- Indexes for table `blog_like`
--
ALTER TABLE `blog_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_id` (`blog_id`),
  ADD KEY `blog_like_ibfk_2` (`user_id`);

--
-- Indexes for table `blog_report`
--
ALTER TABLE `blog_report`
  ADD PRIMARY KEY (`blog_report_id`),
  ADD KEY `blog_report_ibfk_1` (`blog_id`),
  ADD KEY `blog_report_ibfk_2` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client_my_coupon`
--
ALTER TABLE `client_my_coupon`
  ADD PRIMARY KEY (`client_my_coupon_id`),
  ADD KEY `client_my_coupon_ibfk_1` (`coupon_id`),
  ADD KEY `client_my_coupon_ibfk_2` (`user_id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`),
  ADD KEY `coupon_ibfk_1` (`user_id`);

--
-- Indexes for table `coupon_qrcode`
--
ALTER TABLE `coupon_qrcode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_qrcode_ibfk_1` (`coupon_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `language_setting`
--
ALTER TABLE `language_setting`
  ADD PRIMARY KEY (`language_setting_id`),
  ADD KEY `language_setting_ibfk_1` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `notification_ibfk_1` (`user_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `public_feed`
--
ALTER TABLE `public_feed`
  ADD PRIMARY KEY (`public_feed_id`);

--
-- Indexes for table `public_feed_comment`
--
ALTER TABLE `public_feed_comment`
  ADD PRIMARY KEY (`public_feed_comment_id`);

--
-- Indexes for table `public_feed_comment_like`
--
ALTER TABLE `public_feed_comment_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_feed_images`
--
ALTER TABLE `public_feed_images`
  ADD PRIMARY KEY (`public_feed_image_id`);

--
-- Indexes for table `public_feed_like`
--
ALTER TABLE `public_feed_like`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_feed_report`
--
ALTER TABLE `public_feed_report`
  ADD PRIMARY KEY (`public_feed_report_id`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`share_id`);

--
-- Indexes for table `smart_cards`
--
ALTER TABLE `smart_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `use_coupon`
--
ALTER TABLE `use_coupon`
  ADD PRIMARY KEY (`use_coupon_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `blog_comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `blog_comment_like`
--
ALTER TABLE `blog_comment_like`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blog_like`
--
ALTER TABLE `blog_like`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `blog_report`
--
ALTER TABLE `blog_report`
  MODIFY `blog_report_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client_my_coupon`
--
ALTER TABLE `client_my_coupon`
  MODIFY `client_my_coupon_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `coupon_qrcode`
--
ALTER TABLE `coupon_qrcode`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `language_setting`
--
ALTER TABLE `language_setting`
  MODIFY `language_setting_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `public_feed`
--
ALTER TABLE `public_feed`
  MODIFY `public_feed_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `public_feed_comment`
--
ALTER TABLE `public_feed_comment`
  MODIFY `public_feed_comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `public_feed_comment_like`
--
ALTER TABLE `public_feed_comment_like`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `public_feed_images`
--
ALTER TABLE `public_feed_images`
  MODIFY `public_feed_image_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `public_feed_like`
--
ALTER TABLE `public_feed_like`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `public_feed_report`
--
ALTER TABLE `public_feed_report`
  MODIFY `public_feed_report_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `share_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `smart_cards`
--
ALTER TABLE `smart_cards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `use_coupon`
--
ALTER TABLE `use_coupon`
  MODIFY `use_coupon_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `language_setting`
--
ALTER TABLE `language_setting`
  ADD CONSTRAINT `language_setting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
