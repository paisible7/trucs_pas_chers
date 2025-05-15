<?php
class EtudiantModel
{
    public function all()
    {
        return [
            [
                'id' => 1,
                'nom' => 'Hugues',
                'promotion' => 'DESIGN',
                'tel' => '0971150000'
            ],
            [
                'id' => 2,
                'nom' => 'Rodrigue',
                'promotion' => 'Design',
                'tel' => '0998881241'
            ],
            [
                'id' => 3,
                'nom' => 'Jenny',
                'promotion' => 'AS',
                'tel' => '0815058078'
            ],
            [
                'id' => 4,
                'nom' => 'Pierette',
                'promotion' => 'AS',
                'tel' => '0970875797'
            ],
            [
                'id' => 5,
                'nom' => 'Paisible',
                'promotion' => 'GL',
                'tel' => '0970875797'
            ]
        ];
    }

    public function find($etudiant_id)
    {
        $etudiant = null;
        foreach ($this->all() as $etudiant) {
            if ($etudiant['id'] == $etudiant_id) {
                return $etudiant;
            }
        }
        return null;
    }
}
