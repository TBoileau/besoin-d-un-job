Feature: Match
  Scenario: As a recruiter I want to look for job seekers that match with my job offer so that I can show interest
    Given I want to look for job seekers that match with my job offer
    When I select an offer
    Then I can see the list of job seekers with the best compatibility with my job offer
