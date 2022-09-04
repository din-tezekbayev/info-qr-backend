<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Cabinet;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Organization;
use App\Models\Sale;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\Speciality;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run()
    {
        // creating Organization
        $socials = "[{name:'facebook', link:'https://fb.com'},{name:'instagram', link:'https://instagram.com'},{name:'whatsapp', link:'https://wa.me'}]";
        $aboutUs = '<p><span style="font-family:comic sans ms,cursive"><span style="font-size:18px"><strong>О нас</strong></span><br><strong>Клиника «Поправка» </strong>была основана в 2001 году и стала одной из первых частных многопрофильных клиник в Казахстане.<br><br>Сейчас <em>«Поправка»</em> — разветвленная сеть многопрофильных специализированных медицинских центров, расположенных по всему городу Алматы и за его пределами, известная за высокие показатели работы, огромные технические возможности и неизменный профессионализм врачей.</span></p><p><br><span style="font-family:comic sans ms,cursive"><span style="font-size:18px"><strong>Индивидуальный подход</strong></span><br>Каждый пациент для нас уникален. У нас вы найдете понимание и помощь, конфиденциальность и деликатность. Наши врачи будут вести вас от начала заболевания и до полного выздоровления.</span><br>&nbsp;</p><p><span style="font-family:comic sans ms,cursive"><span style="font-size:18px"><strong>Диагностика и лечение</strong></span><br>Правильная диагностика, грамотное лечение — главный аргумент при выборе клиники «Поправка» нашими клиентами.<br><br>Мы гордимся тем, что наше оборудование постоянно обновляется и позволяет еще точнее провести диагностику. Все диагностическое и лабораторное оборудование закуплено в Германии, США, Швейцарии, России, Корее, Японии, Турции, Малайзии, Китае, имеет лицензию производителей и сертификаты соответствия.<br><br>Последующее лечение обеспечивается врачами с многолетним опытом.</span></p>';

        $organization = Organization::create([
            'name' => 'AlmaMed',
            'about_us' => $aboutUs,
            'socials' => json_encode($socials),
        ]);
        // end of creating Organization

        // creating Branch
        $work_hours = '[{"name":"monday","hours":"08:30 - 21:00"},{"name":"tuesday","hours":"08:30 - 21:00"},{"name":"wednesday","hours":"08:30 - 21:00"},{"name":"thursday","hours":"08:30 - 21:00"},{"name":"friday","hours":"06:30 - 21:00"},{"name":"saturday","hours":"08:30 - 21:00"},{"name":"sunday","hours":"08:30 - 21:00"}]';
        $phones = '["+77472470616","+77001112233"]';
        $branch = Branch::create([
            'organization_id' => $organization->id,
            'name' => 'Мед центр "AlmaMed"',
            'address' => 'г.Алматы, пр. Конаева 54',
            'work_hours' => json_encode($work_hours),
            'phones' => json_encode($phones),
        ]);
        // end of creating Branch

        // creating Cabinet
        $cabinet1 = Cabinet::create([
            'branch_id' => $branch->id,
            'title' => '№ 124',
        ]);
        $cabinet2 = Cabinet::create([
            'branch_id' => $branch->id,
            'title' => '№ 224',
        ]);
        $cabinet3 = Cabinet::create([
            'branch_id' => $branch->id,
            'title' => '№ 324',
        ]);
        // end of creating Cabinet

        // creating Departments
        $department1 = Department::create([
            'branch_id' => $branch->id,
            'title' => 'Кардиалогия',
        ]);
        $department2 = Department::create([
            'branch_id' => $branch->id,
            'title' => 'Лаборатория',
        ]);
        $department3 = Department::create([
            'branch_id' => $branch->id,
            'title' => 'Офтальмология',
        ]);
        // end of creating Cabinet

        // creating Specialities
        $speciality1 = Speciality::create([
            'organization_id' => $organization->id,
            'title' => 'Кардиолог',
        ]);
        $speciality2 = Speciality::create([
            'organization_id' => $organization->id,
            'title' => 'Лаборант',
        ]);
        $speciality3 = Speciality::create([
            'organization_id' => $organization->id,
            'title' => 'Офтальмолог',
        ]);
        // end of creating Specialities

        // creating Doctors
        $aboutDoctor = '<p><strong>С чем обращаются пациенты</strong></p><ul><li>боль в области сердца;</li><li>учащенный или замедленный пульс;</li><li>отечность ног;</li><li>появление одышки;</li><li>повышение артериального давления, нарушение ритма сердца.</li></ul><p>&nbsp;</p><p><strong>Образование:</strong></p><ul><li>1993 г., лечебный факультет, АГМИ;</li><li>1995 г., клиническая ординатура при КазНИИ кардиологии по специальности &laquo;Кардиология&raquo;;</li><li>1999 г., аспирантура по специальности &laquo;Кардиология&raquo; при КазНИИ кардиологии. Защита кандидатской диссертации;</li><li>2001 г., кардиолог в 1 к.о (инфарктное отделение) НИИ кардиологии;</li><li>2002 г., зав отделением ревматологии, аллергологии и иммунологии НИИ кардиологии;</li><li>2003 г., научный сотрудник отдела АГ и болезней миокарда НИИ кардиологии;</li><li>2005 г., ведущий научный сотрудник группы ревматологии НИИ кардиологии;</li><li>2009 г., докторантура НИИ кардиологии им А.Л. Мясникова по специальности &laquo;Кардиология&raquo;. Защита докторской диссертации.</li></ul>';

        $doctor1 = Doctor::create([
            'branch_id' => $branch->id,
            'name' => 'Рачковский Игорь Юрьевич',
            'img' => 'storage/doctors/doctor1.webp',
            'work_hours' => json_encode($work_hours),
            'description' => $aboutDoctor,
            'experience' => 31,
            'speciality_id' => $speciality1->id,
            'department_id' => $department1->id,
            'cabinet_id' => $cabinet1->id,
        ]);
        $doctor2 = Doctor::create([
            'branch_id' => $branch->id,
            'name' => 'Горчханов Микаил Темерханович',
            'img' => 'storage/doctors/doctor2.webp',
            'work_hours' => json_encode($work_hours),
            'description' => $aboutDoctor,
            'experience' => 5,
            'speciality_id' => $speciality2->id,
            'department_id' => $department2->id,
            'cabinet_id' => $cabinet2->id,
        ]);
        $doctor3 = Doctor::create([
            'branch_id' => $branch->id,
            'name' => 'Абдираимова Гульшахар Уисбековна',
            'img' => 'storage/doctors/doctor3.jpeg',
            'work_hours' => json_encode($work_hours),
            'description' => $aboutDoctor,
            'experience' => 29,
            'speciality_id' => $speciality3->id,
            'department_id' => $department3->id,
            'cabinet_id' => $cabinet3->id,
        ]);
        // end of creating Doctors

        // creating Sales
        $aboutSales = '<p>В честь <strong>20-ти летия медицинского центра &laquo;Поправка&raquo;</strong> приглашаем Вас на День открытых дверей, который будет проводиться 23 апреля 2022 года с 09:00 до 14:00 часов, по адресу: г. Алматы, мкр. Алмагуль, ул. Сеченова, 28<br /><br />В рамках акции Вы можете получить следующие виды услуг:</p><ol><li>Консультации ведущих специалистов клиники</li><li>Диагностические исследования</li><li>Весь спектр лабораторных исследований</li></ol><p><strong>Ждем Вас!</strong></p>';

        $sale1 = Sale::create([
            'branch_id' => $branch->id,
            'title' => 'День открытых дверей',
            'description' => $aboutSales,
            'img' => 'storage/sales/openDoors.jpg',
            'date' => Carbon::tomorrow(),
        ]);
        $sale2 = Sale::create([
            'branch_id' => $branch->id,
            'title' => 'Массаж лица',
            'description' => $aboutSales,
            'img' => 'storage/sales/faceMassage.jpg',
            'date' => Carbon::today(),
        ]);
        $sale3 = Sale::create([
            'branch_id' => $branch->id,
            'title' => 'Бесплатная консультация',
            'description' => $aboutSales,
            'img' => 'storage/sales/consultation.jpg',
            'date' => Carbon::yesterday(),
        ]);
        // end of creating Sales


        // creating ServiceTypes
        $serviceType1 = ServiceType::create([
            'branch_id' => $branch->id,
            'title' => 'Пакеты ГОБМП и ОСМС',
        ]);
        $serviceType2 = ServiceType::create([
            'branch_id' => $branch->id,
            'title' => 'Лаборатория',
        ]);
        $serviceType3 = ServiceType::create([
            'branch_id' => $branch->id,
            'title' => 'Check Up программы',
        ]);
        $serviceType4 = ServiceType::create([
            'branch_id' => $branch->id,
            'title' => 'Офтальмологический центр',
        ]);
        // end of creating ServiceTypes

        // creating Service
        // BEST WYSIWYG editor https://onlinehtmleditor.dev/
        $aboutService = '<p><strong>Состав программы:</strong></p><ul><li>Прием врача-офтальмолога</li><li>УЗИ глаза</li><li>Оптическая когерентная томография</li><li>Кератометрия</li><li>Тонометрия</li><li>Рефрактометрия</li><li>Биомикроскопия</li><li>Офтальмоскопия</li><li>Визометрия</li><li>Промывание слезныхпутей</li></ul><p><br /><strong>Описание услуг:</strong></p><ul><li>Осмотр и консультация врача</li><li>Проверка зрения, тонометрия</li><li>Исследования поперечного среза глаза</li><li>Измерение преломляющей̆ способности</li><li>Измерение давление в глазном яблоке</li><li>Определение рефракции системы глаза</li><li>Исследование структурных элементов</li><li>Исследование глазного дна</li><li>Определение остроты зрения</li><li>Промывание слезныхпутей</li></ul>';

        $service1 = Service::create([
            'branch_id' => $branch->id,
            'service_type_id' => $serviceType1->id,
            'title' => 'Пакеты ГОБМП и ОСМС услуга',
            'price' => '115900',
            'description' => $aboutService,
        ]);
        $service2 = Service::create([
            'branch_id' => $branch->id,
            'service_type_id' => $serviceType2->id,
            'title' => 'Анализ крови',
            'price' => '11897',
            'description' => $aboutService,
        ]);
        $service5 = Service::create([
            'branch_id' => $branch->id,
            'service_type_id' => $serviceType2->id,
            'title' => 'Анализ гормонов',
            'price' => '32990',
            'description' => $aboutService,
        ]);
        $service3 = Service::create([
            'branch_id' => $branch->id,
            'service_type_id' => $serviceType3->id,
            'title' => ' CHECK-UP «Офтальмологический» ',
            'price' => '12350',
            'description' => $aboutService,
        ]);
        $service4 = Service::create([
            'branch_id' => $branch->id,
            'service_type_id' => $serviceType1->id,
            'title' => 'Лечение глазных яблок',
            'price' => '85700',
            'description' => $aboutService,
        ]);
        // end of creating Service
    }
}
