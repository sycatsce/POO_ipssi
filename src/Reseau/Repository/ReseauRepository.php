<?php

declare(strict_types=1);

namespace Reseau\Repository;

use Reseau\Collection\MeetupCollection;
use Reseau\Collection\UserCollection;
use Reseau\Collection\CommunityCollection;
use Reseau\Entity\User;
use Reseau\Entity\Attendee;
use Reseau\Entity\Organizer;
use Reseau\Entity\Meetup;
use Reseau\Entity\Community;
use Reseau\Exception\MeetupsNotFoundException;
use PDO;

final class ReseauRepository
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function createMeetup() : void
    {
        $statement = $this->pdo->prepare('INSERT INTO `meetup`(`date_begin`, `date_end`, `title`, `description`) VALUES ("2017-12-20", "2017-12-22", "Meetup Test", "Description Test")');
        $statement->execute();
    }
    
    public function getAllMeetups() : MeetupCollection
    {
        $statement = $this->pdo->query("SELECT `description`,`title`,`date_begin`,`date_end`,`community_name`,meetup.id FROM meetup, communities WHERE communities.id = meetup.community_id ORDER BY `date_begin`");
        $meetups = [];
        while ($meetup = $statement->fetch()) {
            $meetups[] = new Meetup($meetup['title'],$meetup['description'],$meetup['date_begin'],$meetup['date_end'], $meetup['community_name'], intval($meetup['id']));
        }
        return new MeetupCollection(...$meetups);
    }

    public function getAllUsers() : UserCollection
    {
        $statement = $this->pdo->query("SELECT `name`,`id` FROM users");
        $users = [];
        while ($user = $statement->fetch()) {
            $users[] = new User($user['name'], intval($user['id']));
        }
        return new UserCollection(...$users);
    }

    public function getAllCommunities() : CommunityCollection
    {
        $statement = $this->pdo->query("SELECT community_name, communities.id, count(*) FROM communities, meetup WHERE communities.id = meetup.community_id GROUP BY community_name");
        $communities = [];
        while ($community = $statement->fetch()) {
            $communities[] = new Community( $community['community_name'], intval($community['count(*)']), intval($community['id']));
        }
        return new CommunityCollection(...$communities);
    }

    public function getCommunity(int $id): String
    {
        $statement = $this->pdo->query("SELECT community_name FROM communities WHERE id=".$id);
        $res = $statement->fetch();
        return $res['community_name'];
    }

    public function getMeetup(int $id) : Meetup
    {
        $statement = $this->pdo->query("SELECT title, description, date_begin, date_end, community_id FROM meetup where id =".$id );
        $res = $statement->fetch();
        return new Meetup($res['title'], $res['description'], $res['date_begin'], $res['date_end'], $res['community_id'], $id);
    }

    public function getUser(int $id) : User
    {
        $statement = $this->pdo->query("SELECT name, id FROM users WHERE id=".$id);
        $res = $statement->fetch();
        return new User($res['name'], intval($res['id']));
    }

    public function getMeetupAttendees(int $id) : UserCollection
    {
        $statement = $this->pdo->query("SELECT users.name as attendee, meetup.title, users.id FROM users, meetup, attendee WHERE meetup.id = ".$id." AND meetup.id = attendee.id_meetup AND attendee.id_user = users.id");
        $attendees = [];
        while ($attendee = $statement->fetch()) {
            $attendees[] = new Attendee($attendee['attendee'], intval($attendee['id']));
        }
        return new UserCollection(...$attendees);
    }

    public function getMeetupOrganizers(int $id) : UserCollection
    {
        $statement = $this->pdo->query("SELECT users.name as organizer, meetup.title, users.id FROM users, organizer, meetup WHERE meetup.id =".$id." AND meetup.id = organizer.id_meetup AND organizer.id_user = users.id ");
        $organizers = [];
        while ($organizer = $statement->fetch()) {
            $organizers[] = new Organizer($organizer['organizer'], intval($organizer['id']));
        }
        return new UserCollection(...$organizers);
    }

    public function deleteMeetup(int $id)
    {
        $statement = $this->pdo->query("DELETE FROM meetup WHERE id");
        $statement->execute();
    }

    public function getUserMeetupOrganizer(int $id)
    {
        $statement = $this->pdo->query("SELECT meetup.title as title FROM meetup, users, organizer WHERE users.id = ".$id." AND users.id = organizer.id_user and organizer.id_meetup = meetup.id");
        $res = [];
        while ($meetup = $statement->fetch()){
            $res[] = $meetup['title'];
        }
        return $res;
    }

    public function getUserMeetupAttendee(int $id)
    {
        $statement = $this->pdo->query("SELECT meetup.title as title FROM meetup, users, attendee WHERE users.id = ".$id." AND users.id = attendee.id_user and  attendee.id_meetup = meetup.id");
        $res = [];
        while ($meetup = $statement->fetch()){
            $res[] = $meetup['title'];
        }
        return $res;
    }

    public function addMeetup(String $debut, String $fin, String $title, String $description, String $commu)
    {   
        $statement = "INSERT INTO meetup(`date_begin`, `date_end`, `title`, `description`, `community_id`) VALUES (:debut, :fin, :title, :description, :commu)";
        $mes = $this->pdo->prepare($statement, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $res = $mes->execute(array(
            ":debut" => $debut,
            ":fin" => $fin,
            ":title" => $title,
            ":description" => $description,
            ":commu" => $commu
        ));
    }
}
