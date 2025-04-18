<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            'The Global IT Challenge for Youth with Disabilities (GITC) hosted by RI Korea has been held every year since 2011 with the goal of reducing the information gap of persons with disabilities.  In 2012, GITC was held as a side event of the UN-ESCAP international conference, and 321 people from 28 countries attended. In which city was the 2012 Global IT Challenge for Youth with Disabilities (GITC) held?' 
            => [
                'answer' => 'Incheon, South Korea',
                'choices1' => 'Bangkok, Thailand',
                'choices2' => 'Hanoi, Vietnam',
                'choices3' => 'Jakarta, Indonesia',
            ],
            'The Constitution of the World Health Organization entered into force.'
            => [
                'answer' => '7 April 1948',
                'choices1' => '22 July 1946',
                'choices2' => '1 September 1948',
                'choices3' => '1 January 1950',
            ],
            'Co-led by WHO, CEPI and Gavi, created a  [ XXXXX ] initiative to ensure equitable access to the COVID-19  vaccine in all countries around the world.   What are the words to enter the above [ XXXXX ] ?' 
            => [
                'answer' => 'COVAX',
                'choices1' => 'Access to COVID‑19 Tools Accelerator',
                'choices2' => 'Pandemic Vaccine Equity Initiative',
                'choices3' => 'Global Vaccine Distribution Partnership',
            ],
            'Mammals have hair on their bodies. Hairs are made in the skin and grow out of the skin. The root part of  the hair, from which the hair is made, is called a hair follicle. There are tiny mites in hair follicles.   What is the name of this creature?'
            => [
                'answer' => 'Demodex',
                'choices1' => 'Sarcoptes scabiei',
                'choices2' => 'Dermatophagoides pteronyssinus',
                'choices3' => 'Ixodes scapularis',
            ],
            'La La Land is a 2016 American musical romantic comedy-drama film starring Ryan Gosling and Emma  Stone as a jazz pianist and an aspiring actress who meet and fall in love.   Where is the background city of this movie?'
            => [
                'answer' => 'Los Angeles, California',
                'choices1' => 'New York City, New York',
                'choices2' => 'Chicago, Illinois',
                'choices3' => 'San Francisco, California',
            ],
            ' Ed Sheeran is a very famous singer-songwriter, guitarist and record producer. His single from x, "Thinking Out Loud", earned him two Grammy Awards at the 2016 ceremony: Song of the Year and BestPop Solo Performance. Not only he takes in part in the music area, but also he played as a cameo role inthe American drama. In this drama, he played a soldier singing around a campfire. What is the name of drama?'
            => [
                'answer' => 'Game of Thrones',
                'choices1' => 'The Walking Dead',
                'choices2' => 'Grey’s Anatomy',
                'choices3' => 'Homeland',
            ],
            ' These natural phenomena are a fast-spinning storm, characterized by low center pressure and strong winds, accompanied by spiral rain clouds and strong rain. They usually occur at high water temperatures above 27 °C and cause great damage while moving. These natural phenomena have different names in different regions where it occurs. Among them, what is the name of that occurs in the Atlantic Ocean or the northeastern Pacific Ocean and goes to the America continent?'
            => [
                'answer' => 'Hurricane',
                'choices1' => 'Typhoon',
                'choices2' => 'Cyclone',
                'choices3' => 'Tornado',
            ],
            'This material is transparent and has no taste and smell, but it is the main component of the acid rain, causing greenhouse effect, causing burns, eroding the terrain and rusting the metal quickly. It also causes electrical shorts and is also detected in malignant tumors of cancer patients. Its unfamiliar chemical name is “dihydrogen monoxide”. What is the name of this substance commonly called? '
            => [
                'answer' => 'Water',
                'choices1' => 'Hydrogen peroxide',
                'choices2' => 'Sulfuric acid',
                'choices3' => 'Carbon dioxide',
            ],
            'The Tower of Hanoi is a puzzle of three rods and a number of disks of different sizes. It is often used as an example algorithm in programming lessons because of its ability to be solved using recursive calls. What is the minimum number of movements for moving 64 disks?  '
            => [
                'answer' => '18,446,744,073,709,551,615',
                'choices1' => '18,446,744,073,709,551,616',
                'choices2' => '9,223,372,036,854,775,807',
                'choices3' => '36,893,488,147,419,102,231',
            ],
            'Musical Cats are musicals based on jellicle cats. During the opening ceremony for the selection of cats to be born as a new life with the Jellicle Choice, various cats gather to introduce themselves and perform songs and dances. What is the name of a cat who received the Jellicle Choice and new life in this musical?  '
            => [
                'answer' => 'Grizabella',
                'choices1' => 'Rum Tum Tugger',
                'choices2' => 'Skimbleshanks',
                'choices3' => 'Mr. Mistoffelees',
            ],
            'Light has both particle-like and wave-like properties. The wave-like properties are called electromagnetic waves. Since the electromagnetic waves are waves, the length of the wavelength can be obtained by knowing the speed and frequency. The latest Wi-Fi technology communicates using electromagnetic waves in the frequency band of 5 GHz. If the speed of light is 300,000 km/s, how long is the wavelength of the electromagnetic waves used by the latest Wi-Fi technology (in cm)?'
            => [
                'answer' => '6 cm',
                'choices1' => '0.6 cm',
                'choices2' => '60 cm',
                'choices3' => '0.06 cm',
            ],
            ' This computing industry standard allows most of the world’s common characters to be read anywhere in the world without problems. A code of a character is displayed in the same manner as U+AC00. What is the name of this method, which was first released in October 1991?'
            => [
                'answer' => 'Unicode',
                'choices1' => 'ASCII',
                'choices2' => 'ISO 8859‑1',
                'choices3' => 'UTF‑8',
            ],
            'Los Angeles International Airport (LAX) offers several services for persons with disabilities. One of them is a service that connects blind and low-vision individuals to their surroundings at the airport. – “WAYFINDING IN THE TERMINALS FOR PERSONS WITH VISION LOSS”. To use this service, you need to download the [XXXX] App from “App store” or “Play store” to your smartphone. What are the words to enter the above [ XXXX ] ?'
            => [
                'answer' => 'Aira',
                'choices1' => 'NaviLens',
                'choices2' => 'BlindSquare',
                'choices3' => 'Seeing AI',
            ],
            '"Microsoft" founder Bill Gates, "Apple" founder Steve Jobs, "Facebook" founder Mark Zuckerberg, "Google" founder Larry Page are famous people like legends in the  IT industry. They all created new technologies with creative ideas. They had creative ideas, but only one person graduated from university (college) to get a bachelor\'s degree, and all others dropped out of university (college). Who has a bachelor\'s degree? Please choose from the examples below.'
            => [
                'answer' => 'Larry Page',
                'choices1' => 'Mark Zuckerberg',
                'choices2' => 'Steve Jobs',
                'choices3' => 'Bill Gates',
            ],
            'United Nations (UN) has adopted the ‘Declaration of the Rights of Persons with Disabilities”. This declaration guarantees that disabled persons are entitled to respect for their dignity and that they have civil and political rights as well as rights to economic and social security. And discriminating against disabled people on grounds or situations that apply to them or their families is prohibited. In the year the “Declaration of the Rights of Persons with Disabilities” was declared, what name was given by the United Nations (UN) for that year?'
            => [
                'answer' => 'International Women’s Year',
                'choices1' => 'International Year of Disabled Persons',
                'choices2' => 'International Human Rights Year',
                'choices3' => 'International Year of Peace',
            ],
        ];

        foreach ($questions as $question => $data)
        {
            Question::firstOrCreate([
                'name' => $question,
                'answer'=> $data['answer'],
                'choices1'=> $data['choices1'],
                'choices2'=> $data['choices2'],
                'choices3'=> $data['choices3'],
            ]);
        }
    }
}
