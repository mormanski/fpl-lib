<?php

namespace Mormanski\FplLib\Tests;

use Mormanski\FplLib\FplLib;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;

class FplLibTest extends TestCase
{
    public function testBootstrapStatic()
    {
        $mockData = ['events' => [], 'teams' => []];
        $mockResponse = new MockResponse(json_encode($mockData), [
            'http_code' => 200,
            'response_headers' => ['content-type' => 'application/json'],
        ]);

        $mockClient = new MockHttpClient($mockResponse, FplLib::BASE_URL);
        $fpl = new FplLib($mockClient);

        $result = $fpl->bootstrapStatic();

        $this->assertSame($mockData, $result);
        $this->assertSame('GET', $mockResponse->getRequestMethod());
        $this->assertSame(FplLib::BASE_URL . 'api/bootstrap-static/', $mockResponse->getRequestUrl());
    }

    public function testEntryWithScalar()
    {
        $mockData = ['id' => 1234567, 'name' => 'Test Team'];
        $mockResponse = new MockResponse(json_encode($mockData), [
            'http_code' => 200,
            'response_headers' => ['content-type' => 'application/json'],
        ]);

        $mockClient = new MockHttpClient($mockResponse, FplLib::BASE_URL);
        $fpl = new FplLib($mockClient);

        $result = $fpl->entry(1234567);

        $this->assertSame($mockData, $result);
        $this->assertSame(FplLib::BASE_URL . 'api/entry/1234567/', $mockResponse->getRequestUrl());
    }

    public function testEntryHistory()
    {
        $mockData = ['current' => [], 'past' => []];
        $mockResponse = new MockResponse(json_encode($mockData), [
            'http_code' => 200,
            'response_headers' => ['content-type' => 'application/json'],
        ]);

        $mockClient = new MockHttpClient($mockResponse, FplLib::BASE_URL);
        $fpl = new FplLib($mockClient);

        $result = $fpl->entryHistory(1234567);

        $this->assertSame($mockData, $result);
        $this->assertSame(FplLib::BASE_URL . 'api/entry/1234567/history/', $mockResponse->getRequestUrl());
    }

    public function testEntryPicksWithArguments()
    {
        $mockData = ['picks' => []];
        $mockResponse = new MockResponse(json_encode($mockData), [
            'http_code' => 200,
            'response_headers' => ['content-type' => 'application/json'],
        ]);

        $mockClient = new MockHttpClient($mockResponse, FplLib::BASE_URL);
        $fpl = new FplLib($mockClient);

        $result = $fpl->entryPicks(1234567, 2);

        $this->assertSame($mockData, $result);
        $this->assertSame(FplLib::BASE_URL . 'api/entry/1234567/event/2/picks/', $mockResponse->getRequestUrl());
    }

    public function testElementSummary()
    {
        $mockData = ['fixtures' => [], 'history' => []];
        $mockResponse = new MockResponse(json_encode($mockData), [
            'http_code' => 200,
            'response_headers' => ['content-type' => 'application/json'],
        ]);

        $mockClient = new MockHttpClient($mockResponse, FplLib::BASE_URL);
        $fpl = new FplLib($mockClient);

        $result = $fpl->elementSummary(123);

        $this->assertSame($mockData, $result);
        $this->assertSame(FplLib::BASE_URL . 'api/element-summary/123/', $mockResponse->getRequestUrl());
    }

    public function testLeaguesClassicStandings()
    {
        $mockData = ['league' => [], 'standings' => []];
        $mockResponse = new MockResponse(json_encode($mockData), [
            'http_code' => 200,
            'response_headers' => ['content-type' => 'application/json'],
        ]);

        $mockClient = new MockHttpClient($mockResponse, FplLib::BASE_URL);
        $fpl = new FplLib($mockClient);

        $result = $fpl->leaguesClassicStandings(123123);

        $this->assertSame($mockData, $result);
        $this->assertSame(FplLib::BASE_URL . 'api/leagues-classic/123123/standings/', $mockResponse->getRequestUrl());
    }

    public function testDefaultConstructor()
    {
        $fpl = new FplLib();
        $this->assertInstanceOf(\Symfony\Contracts\HttpClient\HttpClientInterface::class, $fpl->getClient());
    }
}
