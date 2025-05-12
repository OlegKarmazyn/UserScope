<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlgorithmController extends AbstractController
{
    #[Route('/algorithm', name: 'algorithm_view')]
    public function view(): Response
    {
        $input = [1 => [1, 2], 2 => [3, 4]];
        $combinations = $this->generateCombinations($input);
        return $this->render('algorithm/results.html.twig', ['combinations' => $combinations]);
    }

    private function generateCombinations(array $priorityGroups): array
    {
        ksort($priorityGroups); // sort by priority
        $results = [[]];

        foreach ($priorityGroups as $group) {
            $temp = [];
            foreach ($results as $result) {
                $perms = $this->invert($group);
                foreach ($perms as $perm) {
                    $temp[] = array_merge($result, $perm);
                }
            }
            $results = $temp;
        }

        return $results;
    }

    private function invert(array $items): array
    {
        if (count($items) <= 1) {
            return [$items];
        }

        $result = [];
        foreach ($items as $index => $item) {
            $others = $items;
            unset($others[$index]);
            $perms = $this->invert(array_values($others));
            foreach ($perms as $perm) {
                $result[] = array_merge([$item], $perm);
            }
        }
        return $result;
    }
}