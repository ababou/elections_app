<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Commune;
use App\Models\School;
use App\Models\Office;
use App\Models\Party;
use App\Models\Result;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        
        // Users (Agents)
        $users = [
            ['name' => 'Agent 1', 'email' => 'user1@gmail.com', 'password' => bcrypt('123456789'), 'is_admin' => false,],
            ['name' => 'Agent 2', 'email' => 'user2@gmail.com', 'password' => bcrypt('123456789'), 'is_admin' => false,],
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt('123456789'), 'is_admin' => true,],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        // Communes
        $communes = [
            ['name' => 'جماعة اليوسفية'],
           
            ['name' => 'جماعة الرباط حسان'],
             ['name' => 'جماعة السويسي'],
            ['name' => 'جماعة التواركة'],
        ];


        foreach ($communes as $commune) {
            Commune::create($commune);
        }

        // Schools
       
        $schools = [
    ['name' => 'مدرسة ابن سينا', 'commune_id' => 1],
    ['name' => 'مدرسة سادس نونبر', 'commune_id' => 1],
    ['name' => 'مدرسة محمد بن الحسن الوزاني', 'commune_id' => 1],
    ['name' => 'مدرسة عبد الله الجراري', 'commune_id' => 1],
    ['name' => 'مدرسة دار السلام الحسنية', 'commune_id' => 1],
    ['name' => 'مجموعة مدارس وادي عكراش', 'commune_id' => 1],
    ['name' => 'مدرسة أحمد القاسمي', 'commune_id' => 1],
    ['name' => 'مدرسة التقدم', 'commune_id' => 1],
    ['name' => 'مدرسة المسيرة', 'commune_id' => 1],
    ['name' => 'مدرسة إدريس الأول', 'commune_id' => 1],
    ['name' => 'مدرسة أحمد الراشدي', 'commune_id' => 1],
    ['name' => 'مدرسة الحسن اليوسي', 'commune_id' => 1],
    ['name' => 'مدرسة الفارابي', 'commune_id' => 1],
    ['name' => 'مدرسة محمد بن سليمان الجزولي', 'commune_id' => 1],
    ['name' => 'مدرسة إدريس البحراوي', 'commune_id' => 1],
    ['name' => 'مدرسة الانبعاث مختلطة', 'commune_id' => 1],
    ['name' => 'مدرسة الإمام مالك', 'commune_id' => 1],
    ['name' => 'مدرسة 11 يناير', 'commune_id' => 1],
    ['name' => 'مدرسة المرابطين', 'commune_id' => 1],
    ['name' => 'مدرسة عمر بن عبد العزيز', 'commune_id' => 1],

    ['name' => 'مدرسة عبد الرحمان بن عوف', 'commune_id' => 1],
    ['name' => 'مدرسة الإمام الغزالي', 'commune_id' => 1],
    ['name' => 'مدرسة لسان الدين بن الخطيب', 'commune_id' => 1],
    ['name' => 'مدرسة بلال بن رباح', 'commune_id' => 1],
    ['name' => 'مدرسة الإمام الشافعي', 'commune_id' => 1],
    ['name' => 'مدرسة عبد الهادي بوطالب', 'commune_id' => 1],
    ['name' => 'إعدادية محمد الزرقطوني', 'commune_id' => 1],
    ['name' => 'إعدادية طلحة بن عبيد الله', 'commune_id' => 1],
    ['name' => 'إعدادية الخوارزمي', 'commune_id' => 1],
    ['name' => 'إعدادية العربي البناي', 'commune_id' => 1],
    ['name' => 'إعدادية الأميرة عائشة', 'commune_id' => 1],
    ['name' => 'إعدادية عمرو عالم', 'commune_id' => 1],
    ['name' => 'إعدادية أم البنين', 'commune_id' => 1],
    ['name' => 'إعدادية ابن زيدون', 'commune_id' => 1],
    ['name' => 'ثانوية دارالسلام', 'commune_id' => 1],
    ['name' => 'ثانوية علال الفاسي', 'commune_id' => 1],
    ['name' => 'ثانوية ابراهيم الروداني', 'commune_id' => 1],
    ['name' => 'ثانوية أبي بكر الصديق', 'commune_id' => 1],
    ['name' => 'ثانوية ابن سيناء', 'commune_id' => 1],
    ['name' => 'ثانوية ابن بطوطة', 'commune_id' => 1],
    ['name' => 'ثانوية مولاي عبد الله', 'commune_id' => 1],
    ['name' => 'مركز التكوين المصلحة الاجتماعية', 'commune_id' => 1],
    ['name' => 'المركز الرياضي', 'commune_id' => 1],
    ['name' => 'شمس المعرفة', 'commune_id' => 1],
    ['name' => 'طارق بن زياد', 'commune_id' => 1],
    ['name' => 'محمد بن أحمد اشماعو', 'commune_id' => 1],
    ['name' => 'الأمل التربوي', 'commune_id' => 1],
    ['name' => 'معهد اليوسفية غ-م', 'commune_id' => 1],
    ['name' => 'فاطمة الفهرية - ملحقة', 'commune_id' => 1],
    ['name' => 'روض الحسنى', 'commune_id' => 1],
    ['name' => 'الكوكب الصغير', 'commune_id' => 1],
    ['name' => 'فاطمة الفهرية', 'commune_id' => 1],
    ['name' => 'الجيل الصاعد غ-م', 'commune_id' => 1],
    ['name' => 'الآفاق', 'commune_id' => 1],
    ['name' => 'مؤسسة الأشبال الخصوصية غ-م-ت', 'commune_id' => 1],
    ['name' => 'غصن الزيتون', 'commune_id' => 1],
    ['name' => 'القدس', 'commune_id' => 1],
    ['name' => 'مؤسسة إبراهيم الخليل العلمية الخصوصية', 'commune_id' => 1],
    ['name' => 'مدرسة الحياة', 'commune_id' => 1],
    ['name' => 'مجموعة مدارس الحي العسكري OLM', 'commune_id' => 1],
    ['name' => 'مدارس النهضة الحديثة', 'commune_id' => 1],
    ['name' => 'مدارس الأقصى', 'commune_id' => 1],
    ['name' => 'التوحيد النموذجية', 'commune_id' => 1],
    ['name' => 'بيسان', 'commune_id' => 1],
    ['name' => 'الساحل', 'commune_id' => 1],
    ['name' => 'مجموعة مدارس بول فاليري الملحقة', 'commune_id' => 1],



    ['name' => 'مدرسة الازهر', 'commune_id' => 2],
    ['name' => 'مدرسة عبد المومن', 'commune_id' => 2],
    ['name' => 'مدرسة التوحيد', 'commune_id' => 2],
    ['name' => 'مدرسة سيدي العكاري بنات', 'commune_id' => 2],
    ['name' => 'مدرسة مولاي رشيد', 'commune_id' => 2],
    ['name' => 'مدرسة الاوداية', 'commune_id' => 2],
    ['name' => 'مدرسة حسان بن ثابت', 'commune_id' => 2],
    ['name' => 'مدرسة أبي العلاء المعري ذكور', 'commune_id' => 2],
    ['name' => 'مدرسة زينب النفزاوية مختلطة', 'commune_id' => 2],
    ['name' => 'مدرسة إدريس البحراوي العكاري', 'commune_id' => 2],
    ['name' => 'مدرسة النصر إناث', 'commune_id' => 2],
    ['name' => 'مدرسة باب تامسنة', 'commune_id' => 2],
    ['name' => 'مدرسة علال بن عبد الله', 'commune_id' => 2],
    ['name' => 'مدرسة القاضي عياض', 'commune_id' => 2],
    ['name' => 'مدرسة الحدائق', 'commune_id' => 2],
    ['name' => 'مدرسة الحاج قدور كريم', 'commune_id' => 2],
    ['name' => 'مدرسة ساحة الشهداء ذكور', 'commune_id' => 2],
    ['name' => 'مدرسة أحمد الشرقاوي', 'commune_id' => 2],
    ['name' => 'مجموعة مدارس محمد الخامس', 'commune_id' => 2],
    ['name' => 'مدرسة المسيرة الخضراء العكاري', 'commune_id' => 2],
    ['name' => 'إعدادية يعقوب المنصور', 'commune_id' => 2],
    ['name' => 'إعدادية التوحيد', 'commune_id' => 2],
    ['name' => 'إعدادية محمد بن عبد السلام السايح', 'commune_id' => 2],
    ['name' => 'إعدادية ابن خلدون', 'commune_id' => 2],
    ['name' => 'إعدادية التادلي', 'commune_id' => 2],
    ['name' => 'إعدادية للا كنزة', 'commune_id' => 2],
    ['name' => 'إعدادية المغرب الكبير', 'commune_id' => 2],
    ['name' => 'إعدادية المحيط', 'commune_id' => 2],
    ['name' => 'إعدادية للا عائشة', 'commune_id' => 2],
    ['name' => 'إعدادية محمد 6', 'commune_id' => 2],
    ['name' => 'الثانوية التأهيلية مولاي يوسف', 'commune_id' => 2],
    ['name' => 'ثانوية الحسن الثاني', 'commune_id' => 2],
    ['name' => 'ثانوية للا عائشة', 'commune_id' => 2],
    ['name' => 'ثانوية المالقي', 'commune_id' => 2],
    ['name' => 'المدرسة العسكرية للغات', 'commune_id' => 2],
    ['name' => 'الحــي', 'commune_id' => 2],
    ['name' => 'مؤسسة حسان', 'commune_id' => 2],
    ['name' => 'الأمنية الثقافية غ-م', 'commune_id' => 2],
    ['name' => 'مدرسة الياسمين', 'commune_id' => 2],
    ['name' => 'المعطوية', 'commune_id' => 2],
    ['name' => 'إدريس الأزهر', 'commune_id' => 2],
    ['name' => 'سانت ماركوريت', 'commune_id' => 2],
    ['name' => 'معهد الجليل', 'commune_id' => 2],
    ['name' => 'المنصور', 'commune_id' => 2],
    ['name' => 'أكرم', 'commune_id' => 2],
    ['name' => 'المعهد الثقافي لأبي رقراق', 'commune_id' => 2],
    ['name' => 'سان كبرييل', 'commune_id' => 2],
    ['name' => 'يوسف بن تاشفين غ-م', 'commune_id' => 2],
    ['name' => 'معهد الرباط', 'commune_id' => 2],
    ['name' => 'روض الفهد الوردي', 'commune_id' => 2],
    ['name' => 'مؤسسة فضاء التعلم الأمين', 'commune_id' => 2],
    ['name' => 'الثانوية العلمية صومعة حسان', 'commune_id' => 2],
    ['name' => 'الخوارزمي', 'commune_id' => 2],
    ['name' => 'هنري مواسون', 'commune_id' => 2],
    ['name' => 'الإعدادية العلمية معين', 'commune_id' => 2],
    ['name' => 'معهد لويس لوكران', 'commune_id' => 2],
    ['name' => 'معهد الحياة الطيبة الخصوصي', 'commune_id' => 2],
    ['name' => 'ليونارد دو فانسي', 'commune_id' => 2],
    
    ['name' => 'مدرسة عبد الرحمان بن عوف', 'commune_id' => 3],
    ['name' => 'مدرسة دار السلام الحسنية', 'commune_id' => 3],
    ['name' => 'مدرسة علال كراكشو', 'commune_id' => 3],
    ['name' => 'مدرسة الولجة', 'commune_id' => 3],
    ['name' => 'ثانوية ابن سينا', 'commune_id' => 3],
    ['name' => 'معهد بليز باسكال', 'commune_id' => 3],
    ['name' => 'ابراهيم الخليل', 'commune_id' => 3],
    ['name' => 'المنبع', 'commune_id' => 3],
    ['name' => 'المنزه الآمن', 'commune_id' => 3],
    ['name' => 'تبقال', 'commune_id' => 3],
    ['name' => 'مجموعة مدارس هاي تيك الزهراء', 'commune_id' => 3],
    ['name' => 'السنافر', 'commune_id' => 3],
    ['name' => 'بئر قاسم السبيل', 'commune_id' => 3],
    ['name' => 'قوس قزح الكبير', 'commune_id' => 3],
    ['name' => 'مؤسسة بنمبارك', 'commune_id' => 3],
    ['name' => 'مجموعة مدارس أطلس', 'commune_id' => 3],
    ['name' => 'مؤسسة لوهو السويسي', 'commune_id' => 3],
    ['name' => 'المركب التربوي مدارس السلام', 'commune_id' => 3],
    ['name' => 'م.م المواطنة', 'commune_id' => 3],
    ['name' => 'الملائكة', 'commune_id' => 3],
    ['name' => 'مدرسة البحيرة', 'commune_id' => 3],
    ['name' => 'جبران خليل جبران', 'commune_id' => 3],
    ['name' => 'جبران خليل جبران ملحقة', 'commune_id' => 3],
    ['name' => 'مؤسـسـة الوفـاق', 'commune_id' => 3],
    ['name' => 'الإعدادية الصغيرة ت-ف', 'commune_id' => 3],
    ['name' => 'المنبت', 'commune_id' => 3],
    ['name' => 'هنري لوكران', 'commune_id' => 3],
    ['name' => 'المنبت بوطالب', 'commune_id' => 3],
    ['name' => 'الثانوية العلمية السويسي', 'commune_id' => 3],
    ['name' => 'المدارس العلمية ماريوط', 'commune_id' => 3],
    ['name' => 'PREPA CONDORCET', 'commune_id' => 3],
    ['name' => ' مدرسة المشور السعيد', 'commune_id' => 4],

   


];


        foreach ($schools as $school) {
            School::create($school);
        }

        // Offices
        $offices = [
            ['name' => 'Office 1', 'school_id' => 1, 'user_id' => 1],
            ['name' => 'Office 2', 'school_id' => 1, 'user_id' => 2],
            ['name' => 'Office 3', 'school_id' => 2, 'user_id' => 3],
        ];

        foreach ($offices as $office) {
            Office::create($office);
        }

        // Parties
       $parties = [
            ['name' => 'الحزب الاشتراكي الموحد', 'candidate' => 'محمد فتح الله', 'symbol' => null],
            ['name' => 'الحزب الديمقراطي الوطني', 'candidate' => 'عبد الكبير عقيل', 'symbol' => null],
            ['name' => 'الحزب المغربي الحر', 'candidate' => 'محمد الزتيري', 'symbol' => null],
            ['name' => 'تحالف أحزاب فيدرالية اليسار الديمقراطي', 'candidate' => 'محمد الامين خاجي', 'symbol' => null],
            ['name' => 'تحالف فيدرالية اليسار', 'candidate' => 'عمر محمود بنجلون', 'symbol' => null],
            ['name' => 'حزب الاتحاد الاشتراكي للقوات الشعبية', 'candidate' => 'الحسن لشكر', 'symbol' => null],
            ['name' => 'حزب الاتحاد الدستوري', 'candidate' => 'الحبيب الدقاق', 'symbol' => null],
            ['name' => 'حزب الاتحاد المغربي للديمقراطية', 'candidate' => 'جمال المنظري', 'symbol' => null],
            ['name' => 'حزب الاستقلال', 'candidate' => 'البشير صاخي', 'symbol' => null],
            ['name' => 'حزب الأصالة والمعاصرة', 'candidate' => 'اديب ابن ابراهيم', 'symbol' => null],
            ['name' => 'حزب الإصلاح والتنمية', 'candidate' => 'مريم المنوار', 'symbol' => null],
            ['name' => 'حزب البيئة والتنمية المستدامة', 'candidate' => 'عزيزة العماري', 'symbol' => null],
            ['name' => 'حزب التجمع الوطني للأحرار', 'candidate' => 'علاء الدين البحراوي', 'symbol' => null],
            ['name' => 'حزب التجمع الوطني للأحرار', 'candidate' => 'محمد هشام بن صاري', 'symbol' => null],
            ['name' => 'حزب التقدم والاشتراكية', 'candidate' => 'عزالدين شرايبي', 'symbol' => null],
            ['name' => 'حزب الحركة الديمقراطية الاجتماعية', 'candidate' => 'المصطفى احسني', 'symbol' => null],
            ['name' => 'حزب الحركة الشعبية', 'candidate' => 'عبد الرحمان بولعود', 'symbol' => null],
            ['name' => 'حزب الخضر المغربي', 'candidate' => 'عدنان الطويل', 'symbol' => null],
            ['name' => 'حزب الديمقراطيين الجدد', 'candidate' => 'اسماعيل بلبطاح', 'symbol' => null],
            ['name' => 'حزب العدالة والتنمية', 'candidate' => 'محمد الطاهري', 'symbol' => null],
            ['name' => 'حزب العمل', 'candidate' => 'انس نويصر', 'symbol' => null],
            ['name' => 'حزب المجتمع الديمقراطي', 'candidate' => 'عبد القادر هاشم', 'symbol' => null],
            ['name' => 'حزب النهضة والفضيلة', 'candidate' => 'ادريس هدان', 'symbol' => null],
            ['name' => 'حزب الوحدة والديمقراطية', 'candidate' => 'عز الدين بقالي', 'symbol' => null],
            ['name' => 'حزب الوسط الاجتماعي', 'candidate' => 'علي الضو', 'symbol' => null],
            ['name' => 'حزب جبهة القوى الديمقراطية', 'candidate' => 'زينب الشامي', 'symbol' => null],
        ];

        foreach ($parties as $party) {
            Party::updateOrCreate(
                ['name' => $party['name']], 
                ['candidate' => $party['candidate'], 'symbol' => $party['symbol']]
            );
        }

        // Results (initial 0 votes)
        $allOffices = Office::all();
        $allParties = Party::all();

        foreach ($allOffices as $office) {
            foreach ($allParties as $party) {
                Result::updateOrCreate(
                    ['office_id' => $office->id, 'party_id' => $party->id],
                    ['votes' => 0]
                );
            }
        }



 

    }
}
