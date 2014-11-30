<?php namespace QuizApp\Mapper;

class HardCoded implements QuizInterface
{
    public static $MAP = array();

    /**
     * @return \QuizApp\Entity\Quiz[]
     */
    public function findAll()
    {
        return array(
            $this->find(0),
            $this->find(1),
        );
    }

    /**
     * @param int $id
     * @return \QuizApp\Entity\Quiz
     */
    public function find($id)
    {
        if (isset(self::$MAP[$id])) {
            return self::$MAP[$id];
        }
        $result = new \QuizApp\Entity\Quiz(
            'Quiz ' . $id, array(
                new \QuizApp\Entity\Question(
                    'What is the name of the clock tower at Westminster Palace?',
                    array(
                        'Big Ben',
                        'Big Bell',
                        'The Elizabeth Tower',
                        'The Clock Tower'
                    ),
                    2
                ),
                new \QuizApp\Entity\Question(
                    'Which two stations have the shortest distance between platforms?',
                    array(
                        'Heathrow and Cockfosters',
                        'Leicester Square and Covent Garden',
                        'Victoria and Sloane Square',
                        'Oxford street and Notting Hill'
                    ),
                    3
                ),
            )
        );
        $result->setId($id);
        self::$MAP[$id] = $result;
        return $result;
    }
}
