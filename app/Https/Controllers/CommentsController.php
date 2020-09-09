<?php

namespace App\Https\Controllers;

use App\Https\Requests\CreateCommentsRequest;
use App\Https\Requests\UpdateCommentsRequest;
use App\Repositories\CommentsRepository;
use App\Https\Controllers\AppBaseController;
use Illuminate\Https\Request;
use Flash;
use Response;

class CommentsController extends AppBaseController
{
    /** @var  CommentsRepository */
    private $commentsRepository;

    public function __construct(CommentsRepository $commentsRepo)
    {
        $this->commentsRepository = $commentsRepo;
    }

    /**
     * Display a listing of the Comments.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $comments = $this->commentsRepository->all();

        return view('comments.index')
            ->with('comments', $comments);
    }

    /**
     * Show the form for creating a new Comments.
     *
     * @return Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created Comments in storage.
     *
     * @param CreateCommentsRequest $request
     *
     * @return Response
     */
    public function store(CreateCommentsRequest $request)
    {
        $input = $request->all();

        $comments = $this->commentsRepository->create($input);

        Flash::success('Commentaire publie avec succes.');

        // return redirect(route('comments.index'));

        return redirect()->back();
    }

    /**
     * Display the specified Comments.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comments = $this->commentsRepository->find($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        return view('comments.show')->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified Comments.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comments = $this->commentsRepository->find($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        return view('comments.edit')->with('comments', $comments);
    }

    /**
     * Update the specified Comments in storage.
     *
     * @param int $id
     * @param UpdateCommentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCommentsRequest $request)
    {
        $comments = $this->commentsRepository->find($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        $comments = $this->commentsRepository->update($request->all(), $id);

        Flash::success('Comments updated successfully.');

        return redirect(route('comments.index'));
    }

    /**
     * Remove the specified Comments from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comments = $this->commentsRepository->find($id);

        if (empty($comments)) {
            Flash::error('Comments not found');

            return redirect(route('comments.index'));
        }

        $this->commentsRepository->delete($id);

        Flash::success('Comments deleted successfully.');

        return redirect(route('comments.index'));
    }
}
