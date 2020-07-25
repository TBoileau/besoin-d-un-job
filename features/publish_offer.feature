Feature: Publish offer
  Scenario: As a recruiter I want to publish a new job offer so that I can look for my futur employee
    Given I want to publish an offer
    When I write the offer
    Then the offer is published and job seeker can send their application for a new job
