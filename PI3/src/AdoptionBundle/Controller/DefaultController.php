<?php

namespace AdoptionBundle\Controller;

use AdoptionBundle\Entity\testAdoption;
use BaseBundle\Entity\Animal;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\ColumnChart;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $pieChart=new PieChart();
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $adoption=$em->nbrAdoption();
        $adopte=$em->nbrAdopte();
        $nbrAdoption=sizeof($adoption);
        $nbrAdopte=sizeof($adopte);
        $total=$nbrAdopte+$nbrAdoption;
        $data=array();
        $stat=['adoption','adoption'];
        array_push($data,$stat);
            $stat = array();
            array_push($stat, 'Adoption', ($nbrAdoption * 100) / $total);
            $nb1=($nbrAdoption * 100 )/ $total;
            $stat=['adoption',$nb1];
            array_push($data, $stat);

        array_push($stat, 'Adopté', ($nbrAdopte * 100) / $total);
        $nbr2=($nbrAdopte * 100) / $total;
        $stat=['adopte',$nbr2];
        array_push($data, $stat);

        $pieChart->getData()->setArrayToDataTable($data);
        $pieChart->getOptions()->setTitle('Pourcentages des animeaux adoptés');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#0f74a8');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        $pieChart->getOptions()->setIs3D(true);
        $MY_COLORS = array('#ffc58f','purple');
        $pieChart->getOptions()->setColors($MY_COLORS);
        return $this->render('AdoptionBundle:Default:index.html.twig', array('piechart' =>
            $pieChart));
    }




    public function PieChartMensuel()
    {
        $piechart=new PieChart();
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $semaine=$em->Cemois();
        $nbrAdoption=0;
        $nbrAdopte=0;
        foreach ($semaine as $s)
        {
            $animal=$this->getDoctrine()->getRepository(Animal::class)->findByIdAnimal($s);
            if($animal[0]->getConfirmation()==1){$nbrAdoption++;}
            if($animal[0]->getConfirmation()==2){$nbrAdopte++;}

        }
        $total=sizeof($semaine);
        $data=array();
        $stat=['adoption','adoption'];
        array_push($data,$stat);
        $stat = array();
        array_push($stat, 'Adoption', ($nbrAdoption * 100) / $total);
        $nb1=($nbrAdoption * 100 )/ $total;
        $stat=['adoption',$nb1];
        array_push($data, $stat);

        array_push($stat, 'Adopté', ($nbrAdopte * 100) / $total);
        $nbr2=($nbrAdopte * 100) / $total;
        $stat=['adopte',$nbr2];
        array_push($data, $stat);

        $piechart->getData()->setArrayToDataTable($data);
        $piechart->getOptions()->setTitle('Pourcentages des animeaux adoptés');
        $piechart->getOptions()->setHeight(500);
        $piechart->getOptions()->setWidth(900);
        $piechart->getOptions()->getTitleTextStyle()->setBold(true);
        $piechart->getOptions()->getTitleTextStyle()->setColor('#0f74a8');
        $piechart->getOptions()->getTitleTextStyle()->setItalic(true);
        $piechart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $piechart->getOptions()->getTitleTextStyle()->setFontSize(20);
        $piechart->getOptions()->setIs3D(true);
        $MY_COLORS = array('#ffc58f','purple');
        $piechart->getOptions()->setColors($MY_COLORS);
        return $piechart;    }

    public function PieChartAnnuel()
    {
        $piechart=new PieChart();
        $em=$this->getDoctrine()->getRepository(testAdoption::class);
        $annee=$em->Annee();
        $nbrAdoption=0;
        $nbrAdopte=0;
        foreach ($annee as $s)
        {
            $animal=$this->getDoctrine()->getRepository(Animal::class)->findByIdAnimal($s);
            if($animal[0]->getConfirmation()==1){$nbrAdoption++;}
            if($animal[0]->getConfirmation()==2){$nbrAdopte++;}

        }
        $total=sizeof($annee);
        $data=array();
        $stat=['adoption','adoption'];
        array_push($data,$stat);
        $stat = array();
        array_push($stat, 'Adoption', ($nbrAdoption * 100) / $total);
        $nb1=($nbrAdoption * 100 )/ $total;
        $stat=['adoption',$nb1];
        array_push($data, $stat);

        array_push($stat, 'Adopté', ($nbrAdopte * 100) / $total);
        $nbr2=($nbrAdopte * 100) / $total;
        $stat=['adopte',$nbr2];
        array_push($data, $stat);

        $piechart->getData()->setArrayToDataTable($data);
        $piechart->getOptions()->setTitle('Les pourcentages des animeaux adoptés');
        $piechart->getOptions()->setHeight(500);
        $piechart->getOptions()->setWidth(900);
        $piechart->getOptions()->getTitleTextStyle()->setBold(true);
        $piechart->getOptions()->getTitleTextStyle()->setColor('#0f74a8');
        $piechart->getOptions()->getTitleTextStyle()->setItalic(true);
        $piechart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $piechart->getOptions()->getTitleTextStyle()->setFontSize(20);
        $piechart->getOptions()->setIs3D(true);
        $MY_COLORS = array('#ffc58f','purple');
        $piechart->getOptions()->setColors($MY_COLORS);
        return $piechart;    }



}
