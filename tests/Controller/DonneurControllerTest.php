<?php

namespace App\Test\Controller;

use App\Entity\Donneur;
use App\Repository\DonneurRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DonneurControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private DonneurRepository $repository;
    private string $path = '/donneur/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = static::getContainer()->get('doctrine')->getRepository(Donneur::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Donneur index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'donneur[nom]' => 'Testing',
            'donneur[prenom]' => 'Testing',
            'donneur[email]' => 'Testing',
            'donneur[password]' => 'Testing',
            'donneur[tel]' => 'Testing',
            'donneur[region]' => 'Testing',
            'donneur[cin]' => 'Testing',
            'donneur[groupesanguin]' => 'Testing',
            'donneur[participant]' => 'Testing',
        ]);

        self::assertResponseRedirects('/donneur/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Donneur();
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPassword('My Title');
        $fixture->setTel('My Title');
        $fixture->setRegion('My Title');
        $fixture->setCin('My Title');
        $fixture->setGroupesanguin('My Title');
        $fixture->setParticipant('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Donneur');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Donneur();
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPassword('My Title');
        $fixture->setTel('My Title');
        $fixture->setRegion('My Title');
        $fixture->setCin('My Title');
        $fixture->setGroupesanguin('My Title');
        $fixture->setParticipant('My Title');

        $this->repository->save($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'donneur[nom]' => 'Something New',
            'donneur[prenom]' => 'Something New',
            'donneur[email]' => 'Something New',
            'donneur[password]' => 'Something New',
            'donneur[tel]' => 'Something New',
            'donneur[region]' => 'Something New',
            'donneur[cin]' => 'Something New',
            'donneur[groupesanguin]' => 'Something New',
            'donneur[participant]' => 'Something New',
        ]);

        self::assertResponseRedirects('/donneur/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getNom());
        self::assertSame('Something New', $fixture[0]->getPrenom());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getPassword());
        self::assertSame('Something New', $fixture[0]->getTel());
        self::assertSame('Something New', $fixture[0]->getRegion());
        self::assertSame('Something New', $fixture[0]->getCin());
        self::assertSame('Something New', $fixture[0]->getGroupesanguin());
        self::assertSame('Something New', $fixture[0]->getParticipant());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Donneur();
        $fixture->setNom('My Title');
        $fixture->setPrenom('My Title');
        $fixture->setEmail('My Title');
        $fixture->setPassword('My Title');
        $fixture->setTel('My Title');
        $fixture->setRegion('My Title');
        $fixture->setCin('My Title');
        $fixture->setGroupesanguin('My Title');
        $fixture->setParticipant('My Title');

        $this->repository->save($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/donneur/');
    }
}
