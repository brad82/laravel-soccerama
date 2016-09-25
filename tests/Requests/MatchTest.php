<?php

use Carbon\Carbon;
use Rebing\Soccerama\Facades\Soccerama;

/**
 * @group match
 */
class MatchTest extends TestCase {

    /**
     * @test
     */
    public function it_retrieves_matches_by_date_range_using_carbon_input()
    {

        $fromDate = Carbon::createFromDate(2016, 9, 1);
        $toDate = Carbon::createFromDate(2016, 9, 10);

        $response = Soccerama::matchesByDate($fromDate, $toDate);

        $this->assertNotEmpty($response);
    }

    /**
     * @test
     */
    public function it_retrieves_matches_by_date_range_using_string_input()
    {
        $fromDate = '2016-09-01';
        $toDate = '2016-09-10';

        $response = Soccerama::matchesByDate($fromDate, $toDate);

        $this->assertNotEmpty($response);
    }

    /**
     * @test
     */
    public function it_retrieves_a_match_by_id()
    {
        $id = 689930;
        $response = Soccerama::matchById($id);

        $this->assertEquals($id, $response->id);
    }

    /**
     * @test
     */
    public function it_retrieves_along_with_a_competition_string_include()
    {
        $id = 689930;
        $include = 'competition';
        $response = Soccerama::setInclude($include)->matchById($id);

        $this->assertEquals($id, $response->id);
        $this->assertNotEmpty($response->competition);
    }

}