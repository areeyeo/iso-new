<!DOCTYPE html>
<html lang="en">
<style>
.input-group button {
    padding: 5px 10px;
    background-color: transparent;
    color: #007bff;
    border: 1px solid #007bff;
    border-radius: 0px 4px 4px 0px;
    cursor: pointer;
}

.input-group button:hover {
    background-color: #007bff;
    color: #fff;
}

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documented Information Version</title>

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">
        <!-- Page header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Documented Information 
                            <button type="button" class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(1)">Requirement</button>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a>Documented Information</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h2 class="card-title">Document Control</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end align-items-baseline">
                            <span>Version Document: 0.0.1</span>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Document Type</h6>
                                    <input class="form-control gray-text" type="text" name="doc-type-select" id="doc-type-select" disabled></input>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Document Abbreviation</h6>
                                    <input class="form-control gray-text" type="text" name="document_abbreviation" id="document_abbreviation" disabled></input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Document Name TH</h6>
                                    <input class="form-control gray-text" type="text" name="nameth" id="nameth" disabled></input>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Document Name ENG</h6>
                                    <input class="form-control gray-text" type="text" name="nameen" id="nameen" disabled></input>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Secret Level</h6>
                                    <input class="form-control gray-text" type="text" name="doc-secret-level" id="doc-secret-level" disabled></input>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Document owner</h6>
                                    <input class="form-control gray-text" type="text" name="nameen" id="nameen"></input>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>File</h6>
                                    <div class="input-group">
                                        <input class="form-control gray-text" type="text" name="file" id="file" disabled></input>
                                        <button type="button" id="button-addon2"><i class="fas fa-search"></i>&nbsp;View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Release date</h6>
                                    <input class="form-control gray-text" type="datetime-local" name="releasedate" id="releasedate"></input>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Review date</h6>
                                    <input class="form-control gray-text" type="date" name="reviewdate" id="reviewdate"></input>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Note</h6>
                                    <textarea class="form-control gray-text" rows="3" placeholder="Text..." name="note" id="note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-5">
                        <button type="submit" class="btn btn-success" name="submit" value="Submit">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left: 30px;">Cancel</button>
                    </div>
                </div>
            </div>
    </div>
    </section>\

</body>

</html>