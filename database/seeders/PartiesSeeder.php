<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Party;

class PartySeeder extends Seeder
{
    public function run(): void
    {
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
    }
}

