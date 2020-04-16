<?php

namespace App\Console\Commands\Activities;

use App\Activities\Type;
use App\Console\Commands\CreateUpdateSQLite;
use App\Activities\Level;


class CreateUpdateLevels extends CreateUpdateSQLite
{
    protected $signature = 'create-update:levels';

    protected $description = 'Command description';

    protected function getSQLiteClass(): string
    {
        return Level::class;
    }

    protected function getObjectsDict(): array
    {
        return [
            [
                'name' => 'Básico',
                'description' => '<p>Este nivel va enfocado a toda aquella gente que ha superado un curso de Iniciación Nivel 0, o que se han puesto ocasionalmente los patines, pero no saben girar o frenar de forma más o menos estable y segura.</p>',
                'type_id' => Type::GetFistByName("Escuelas técnicas")->id,
            ],
            [
                'name' => 'Medio',
                'description' => '<p>Si has superado el Nivel Básico de nuestras escuelas y controlas el patinaje básico, el giro paralelo, y el freno de taco y en mayor o menor medida el freno en T, esta es tu mejor opción.</p>',
                'type_id' => Type::GetFistByName("Escuelas técnicas")->id,
            ],
            [
                'name' => 'Avanzado',
                'description' => '<p>Enfocado para los patinadores que han superado el Nivel Medio o que tienen un buen nivel de patinaje, frenan con soltura con ambas piernas, giran con comodidad y el patinaje de espaldas es algo que no les supone ningún problema.</p>',
                'type_id' => Type::GetFistByName("Escuelas técnicas")->id,
            ],
            [
                'name' => 'Experto',
                'description' => '<p>¡Nivel apto sólo para los más atrevidos!<br>Si patinas con gran soltura, disfrutas con el patinaje de espaldas, y controlas todas las técnicas de patinaje avanzado como los cambios de sentido, saltos... Este es sin duda tu nivel.</p>',
                'type_id' => Type::GetFistByName("Escuelas técnicas")->id,
            ],
            [
                'name' => 'Freestyle 1',
                'description' => '<p>Si has superado el nivel de escuela Avanzado o estás en avanzado pero quieres nuevos desafios, en Freestyle 1 encontrarás nuevos retos. Todas aquellas técnicas, o combinaciones de estas que puedan suponer un reto, las encontrarás en este nivel.</p>',
                'type_id' => Type::GetFistByName("Escuelas de disciplinas")->id,
            ],
            [
                'name' => 'Freestyle 2',
                'description' => '<p>¿Has superado Experto o estás en ese nivel pero tienes ganas de más?<br>Prueba Freestyle 2 donde se te exprimirá al máximo, llevando las técnicas que ya conoces a nuevos límites, haciendote un todoterreno en el pátinaje, para que puedas salir a la calle y veas las calles como tu parque de juegos.</p>',
                'type_id' => Type::GetFistByName("Escuelas de disciplinas")->id,
            ],
            [
                'name' => 'Slalom',
                'description' => '<p>Quizás una de las disciplinas de patinaje más técnicas y con un gran aporte para tu patinaje, dándote un gran control de los patines y de tu cuerpo, al tiempo que mejorarás tu equilibrio, y pondrás a trabajar la cabeza, pues requiere de una gran concentración y perseverancia.<br><i>*Para alumnos desde nivel Medio.</i></p>',
                'type_id' => Type::GetFistByName("Escuelas de disciplinas")->id,
            ],
            [
                'name' => 'Hockey',
                'description' => '<p>Si tienes un control aceptable del patinaje (giras, frenas y patinas de espaldas) pero el cuerpo te pide probar cosas nuevas, el hockey es lo que esbas buscando. Un deporte de equipo que pondrá a prueba tus reflejos, tu visión de juego y te hará disfrutar como un niño.<br><b><i>(Recomendable tener un stick de hockey)</i></b></p>',
                'type_id' => Type::GetFistByName("Escuelas de disciplinas")->id,
            ],
            [
                'name' => 'RollerBasket',
                'description' => '<p>¿No has oído hablar de esta disciplina?<br>En España es una disciplina casi desconocida, pero realmente divertida, que pondrá a prueba tu habilidad y tu mente.<br><br><i>*Se organizarán pachangas para que podáis poner a prueba los conocimientos adquiridos.</i></p>',
                'type_id' => Type::GetFistByName("Escuelas de disciplinas")->id,
            ],
            [
                'name' => 'Niños Básico',
                'description' => '<p>La mejor forma de de iniciar a tu hijo/a en el patinaje. Un curso escolar completo de aprendizaje, trabajo en equipo y diversión, todo ello intercalando ejercicios con juegos.</p>',
                'type_id' => Type::GetFistByName("Escuelas para niños/as")->id,
            ],
            [
                'name' => 'Niños Medio',
                'description' => '<p>Si tu hijo/a ya ha superado el nivel básico o bien ya tiene algunos conocimientos sobre patinaje, aquí perfeccionará lo que ya sabe y aprenderá nuevas técnicas de forma divertida.</p>',
                'type_id' => Type::GetFistByName("Escuelas para niños/as")->id,
            ],
            [
                'name' => 'Niños Multidisciplinar',
                'description' => '<p>Orientado a niños que ya tienen un buen control sobre los patines o han superado el nivel Medio, aprenderán y disfrutarán del hockey, slalom, velocidad, urbano, saltos, RollerVolley, RollerBaseball  que le harán mejorar su patinaje.</p>',
                'type_id' => Type::GetFistByName("Escuelas para niños/as")->id,
            ],
            [
                'name' => 'Velocidad Entrenamientos',
                'description' => '<p>Orientado a niños que ya tienen un buen control sobre los patines o han superado el nivel Medio, aprenderán y disfrutarán del hockey, slalom, velocidad, urbano, saltos, RollerVolley, RollerBaseball  que le harán mejorar su patinaje.</p>',
                'type_id' => Type::GetFistByName("Escuela de velocidad")->id,
            ],
        ];
    }
}
