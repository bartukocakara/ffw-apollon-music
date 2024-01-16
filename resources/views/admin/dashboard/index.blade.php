@extends('admin.layouts.master')
@section('content')
<main class="docs-container pt-5">
    <div class="container-fluid px-xxl-5 px-lg-4 pt-4 pt-lg-5 pb-2 pb-lg-4">
      <!-- Page title -->
      <div class="d-sm-flex align-items-end justify-content-between ps-lg-2 ps-xxl-0 mt-2 mt-lg-0 pt-4 mb-n3">
        <div class="me-4">
          <h1 class="pb-1">Tables</h1>
          <p class="text-muted fs-lg mb-2">Examples for opt-in styling of tables.</p>
        </div>
        <a href="https://getbootstrap.com/docs/5.3/content/tables/" class="btn btn-link px-0" target="_blank" rel="noopener">
          Bootstrap docs
          <i class="bx bx-link-external fs-lg ms-2"></i>
        </a>
      </div>


      <!-- Basic example -->
      <section id="tables-basic" class="border-bottom py-5 ps-lg-2 ps-xxl-0">
        <h2 class="h4">Basic example</h2>
        <div class="d-table">
          <ul class="nav nav-tabs-alt" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" href="#preview1" data-bs-toggle="tab" role="tab" aria-controls="preview1" aria-selected="true">
                <i class="bx bx-show-alt fs-base opacity-70 me-2"></i>
                Preview
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#html1" data-bs-toggle="tab" role="tab" aria-controls="html1" aria-selected="false">
                <i class="bx bx-code-alt fs-base opacity-70 me-2"></i>
                HTML
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content pt-1">
          <div class="tab-pane fade show active" id="preview1" role="tabpanel">
            <div class="table-responsive">
              <table class="table mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>CEO, Founder</td>
                    <td>+3 555 68 70</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Anna</td>
                    <td>Cabana</td>
                    <td>Designer</td>
                    <td>+3 434 65 93</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Kale</td>
                    <td>Thornton</td>
                    <td>Developer</td>
                    <td>+3 285 42 88</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Jane</td>
                    <td>Birkins</td>
                    <td>Support</td>
                    <td>+3 774 28 50</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="html1" role="tabpanel">
            <pre class="line-numbers"><code class="lang-html">&lt;!-- Basic table --&gt;
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table&quot;&gt;
  &lt;thead&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;First Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Last Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Position&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Phone&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
      &lt;td&gt;John&lt;/td&gt;
      &lt;td&gt;Doe&lt;/td&gt;
      &lt;td&gt;CEO, Founder&lt;/td&gt;
      &lt;td&gt;+3 555 68 70&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
      &lt;td&gt;Anna&lt;/td&gt;
      &lt;td&gt;Cabana&lt;/td&gt;
      &lt;td&gt;Designer&lt;/td&gt;
      &lt;td&gt;+3 434 65 93&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
      &lt;td&gt;Kale&lt;/td&gt;
      &lt;td&gt;Thornton&lt;/td&gt;
      &lt;td&gt;Developer&lt;/td&gt;
      &lt;td&gt;+3 285 42 88&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;4&lt;/th&gt;
      &lt;td&gt;Jane&lt;/td&gt;
      &lt;td&gt;Birkins&lt;/td&gt;
      &lt;td&gt;Support&lt;/td&gt;
      &lt;td&gt;+3 774 28 50&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;</code></pre>
          </div>
        </div>
      </section>


      <!-- Dark table -->
      <section id="tables-dark" class="border-bottom py-5 ps-lg-2 ps-xxl-0">
        <h2 class="h4">Dark table</h2>
        <div class="d-table">
          <ul class="nav nav-tabs-alt" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" href="#preview2" data-bs-toggle="tab" role="tab" aria-controls="preview2" aria-selected="true">
                <i class="bx bx-show-alt fs-base opacity-70 me-2"></i>
                Preview
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#html2" data-bs-toggle="tab" role="tab" aria-controls="html2" aria-selected="false">
                <i class="bx bx-code-alt fs-base opacity-70 me-2"></i>
                HTML
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content pt-1">
          <div class="tab-pane fade show active" id="preview2" role="tabpanel">
            <div class="table-responsive">
              <table class="table table-dark mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>CEO, Founder</td>
                    <td>+3 555 68 70</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Anna</td>
                    <td>Cabana</td>
                    <td>Designer</td>
                    <td>+3 434 65 93</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Kale</td>
                    <td>Thornton</td>
                    <td>Developer</td>
                    <td>+3 285 42 88</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Jane</td>
                    <td>Birkins</td>
                    <td>Support</td>
                    <td>+3 774 28 50</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="html2" role="tabpanel">
            <pre class="line-numbers"><code class="lang-html">&lt;!-- Dark table --&gt;
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-dark&quot;&gt;
  &lt;thead&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;First Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Last Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Position&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Phone&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
      &lt;td&gt;John&lt;/td&gt;
      &lt;td&gt;Doe&lt;/td&gt;
      &lt;td&gt;CEO, Founder&lt;/td&gt;
      &lt;td&gt;+3 555 68 70&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
      &lt;td&gt;Anna&lt;/td&gt;
      &lt;td&gt;Cabana&lt;/td&gt;
      &lt;td&gt;Designer&lt;/td&gt;
      &lt;td&gt;+3 434 65 93&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
      &lt;td&gt;Kale&lt;/td&gt;
      &lt;td&gt;Thornton&lt;/td&gt;
      &lt;td&gt;Developer&lt;/td&gt;
      &lt;td&gt;+3 285 42 88&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;4&lt;/th&gt;
      &lt;td&gt;Jane&lt;/td&gt;
      &lt;td&gt;Birkins&lt;/td&gt;
      &lt;td&gt;Support&lt;/td&gt;
      &lt;td&gt;+3 774 28 50&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;</code></pre>
          </div>
        </div>
      </section>


      <!-- Striped rows -->
      <section id="tables-striped-rows" class="border-bottom py-5 ps-lg-2 ps-xxl-0">
        <h2 class="h4">Striped rows</h2>
        <div class="d-table">
          <ul class="nav nav-tabs-alt" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" href="#preview3" data-bs-toggle="tab" role="tab" aria-controls="preview3" aria-selected="true">
                <i class="bx bx-show-alt fs-base opacity-70 me-2"></i>
                Preview
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#html3" data-bs-toggle="tab" role="tab" aria-controls="html3" aria-selected="false">
                <i class="bx bx-code-alt fs-base opacity-70 me-2"></i>
                HTML
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content pt-1">
          <div class="tab-pane fade show active" id="preview3" role="tabpanel">
            <div class="table-responsive mb-3">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>CEO, Founder</td>
                    <td>+3 555 68 70</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Anna</td>
                    <td>Cabana</td>
                    <td>Designer</td>
                    <td>+3 434 65 93</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Kale</td>
                    <td>Thornton</td>
                    <td>Developer</td>
                    <td>+3 285 42 88</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="table-responsive">
              <table class="table table-dark table-striped mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>CEO, Founder</td>
                    <td>+3 555 68 70</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Anna</td>
                    <td>Cabana</td>
                    <td>Designer</td>
                    <td>+3 434 65 93</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Kale</td>
                    <td>Thornton</td>
                    <td>Developer</td>
                    <td>+3 285 42 88</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="html3" role="tabpanel">
            <pre class="line-numbers"><code class="lang-html">&lt;!-- Light table with striped rows --&gt;
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-striped&quot;&gt;
  &lt;thead;&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;First Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Last Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Position&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Phone&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
      &lt;td&gt;John&lt;/td&gt;
      &lt;td&gt;Doe&lt;/td&gt;
      &lt;td&gt;CEO, Founder&lt;/td&gt;
      &lt;td&gt;+3 555 68 70&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
      &lt;td&gt;Anna&lt;/td&gt;
      &lt;td&gt;Cabana&lt;/td&gt;
      &lt;td&gt;Designer&lt;/td&gt;
      &lt;td&gt;+3 434 65 93&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
      &lt;td&gt;Kale&lt;/td&gt;
      &lt;td&gt;Thornton&lt;/td&gt;
      &lt;td&gt;Developer&lt;/td&gt;
      &lt;td&gt;+3 285 42 88&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;

&lt;!-- Dark table with striped rows --&gt;
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-dark table-striped&quot;&gt;
  &lt;thead&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;First Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Last Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Position&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Phone&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
      &lt;td&gt;John&lt;/td&gt;
      &lt;td&gt;Doe&lt;/td&gt;
      &lt;td&gt;CEO, Founder&lt;/td&gt;
      &lt;td&gt;+3 555 68 70&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
      &lt;td&gt;Anna&lt;/td&gt;
      &lt;td&gt;Cabana&lt;/td&gt;
      &lt;td&gt;Designer&lt;/td&gt;
      &lt;td&gt;+3 434 65 93&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
      &lt;td&gt;Kale&lt;/td&gt;
      &lt;td&gt;Thornton&lt;/td&gt;
      &lt;td&gt;Developer&lt;/td&gt;
      &lt;td&gt;+3 285 42 88&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;</code></pre>
          </div>
        </div>
      </section>


      <!-- Striped columns -->
      <section id="tables-striped-columns" class="border-bottom py-5 ps-lg-2 ps-xxl-0">
        <h2 class="h4">Striped columns</h2>
        <div class="d-table">
          <ul class="nav nav-tabs-alt" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" href="#preview7" data-bs-toggle="tab" role="tab" aria-controls="preview7" aria-selected="true">
                <i class="bx bx-show-alt fs-base opacity-70 me-2"></i>
                Preview
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#html7" data-bs-toggle="tab" role="tab" aria-controls="html7" aria-selected="false">
                <i class="bx bx-code-alt fs-base opacity-70 me-2"></i>
                HTML
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content pt-1">
          <div class="tab-pane fade show active" id="preview7" role="tabpanel">
            <div class="table-responsive mb-3">
              <table class="table table-striped-columns">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>CEO, Founder</td>
                    <td>+3 555 68 70</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Anna</td>
                    <td>Cabana</td>
                    <td>Designer</td>
                    <td>+3 434 65 93</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Kale</td>
                    <td>Thornton</td>
                    <td>Developer</td>
                    <td>+3 285 42 88</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="table-responsive">
              <table class="table table-dark table-striped-columns mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>CEO, Founder</td>
                    <td>+3 555 68 70</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Anna</td>
                    <td>Cabana</td>
                    <td>Designer</td>
                    <td>+3 434 65 93</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Kale</td>
                    <td>Thornton</td>
                    <td>Developer</td>
                    <td>+3 285 42 88</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="html7" role="tabpanel">
            <pre class="line-numbers"><code class="lang-html">&lt;!-- Light table with striped columns --&gt;
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-striped-columns&quot;&gt;
  &lt;thead;&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;First Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Last Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Position&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Phone&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
      &lt;td&gt;John&lt;/td&gt;
      &lt;td&gt;Doe&lt;/td&gt;
      &lt;td&gt;CEO, Founder&lt;/td&gt;
      &lt;td&gt;+3 555 68 70&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
      &lt;td&gt;Anna&lt;/td&gt;
      &lt;td&gt;Cabana&lt;/td&gt;
      &lt;td&gt;Designer&lt;/td&gt;
      &lt;td&gt;+3 434 65 93&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
      &lt;td&gt;Kale&lt;/td&gt;
      &lt;td&gt;Thornton&lt;/td&gt;
      &lt;td&gt;Developer&lt;/td&gt;
      &lt;td&gt;+3 285 42 88&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;

&lt;!-- Dark table with striped columns --&gt;
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-dark table-striped-columns&quot;&gt;
  &lt;thead&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;First Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Last Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Position&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Phone&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
      &lt;td&gt;John&lt;/td&gt;
      &lt;td&gt;Doe&lt;/td&gt;
      &lt;td&gt;CEO, Founder&lt;/td&gt;
      &lt;td&gt;+3 555 68 70&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
      &lt;td&gt;Anna&lt;/td&gt;
      &lt;td&gt;Cabana&lt;/td&gt;
      &lt;td&gt;Designer&lt;/td&gt;
      &lt;td&gt;+3 434 65 93&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
      &lt;td&gt;Kale&lt;/td&gt;
      &lt;td&gt;Thornton&lt;/td&gt;
      &lt;td&gt;Developer&lt;/td&gt;
      &lt;td&gt;+3 285 42 88&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;</code></pre>
          </div>
        </div>
      </section>


      <!-- Bordered table -->
      <section id="tables-bordered" class="border-bottom py-5 ps-lg-2 ps-xxl-0">
        <h2 class="h4">Bordered table</h2>
        <div class="d-table">
          <ul class="nav nav-tabs-alt" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" href="#preview4" data-bs-toggle="tab" role="tab" aria-controls="preview4" aria-selected="true">
                <i class="bx bx-show-alt fs-base opacity-70 me-2"></i>
                Preview
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#html4" data-bs-toggle="tab" role="tab" aria-controls="html4" aria-selected="false">
                <i class="bx bx-code-alt fs-base opacity-70 me-2"></i>
                HTML
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content pt-1">
          <div class="tab-pane fade show active" id="preview4" role="tabpanel">
            <div class="table-responsive mb-3">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>CEO, Founder</td>
                    <td>+3 555 68 70</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Anna</td>
                    <td>Cabana</td>
                    <td>Designer</td>
                    <td>+3 434 65 93</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Kale</td>
                    <td>Thornton</td>
                    <td>Developer</td>
                    <td>+3 285 42 88</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="table-responsive">
              <table class="table table-dark table-bordered mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>CEO, Founder</td>
                    <td>+3 555 68 70</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Anna</td>
                    <td>Cabana</td>
                    <td>Designer</td>
                    <td>+3 434 65 93</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Kale</td>
                    <td>Thornton</td>
                    <td>Developer</td>
                    <td>+3 285 42 88</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="html4" role="tabpanel">
            <pre class="line-numbers"><code class="lang-html">&lt;!-- Light bordered table --&gt;
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-bordered&quot;&gt;
  &lt;thead;&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;First Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Last Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Position&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Phone&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
      &lt;td&gt;John&lt;/td&gt;
      &lt;td&gt;Doe&lt;/td&gt;
      &lt;td&gt;CEO, Founder&lt;/td&gt;
      &lt;td&gt;+3 555 68 70&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
      &lt;td&gt;Anna&lt;/td&gt;
      &lt;td&gt;Cabana&lt;/td&gt;
      &lt;td&gt;Designer&lt;/td&gt;
      &lt;td&gt;+3 434 65 93&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
      &lt;td&gt;Kale&lt;/td&gt;
      &lt;td&gt;Thornton&lt;/td&gt;
      &lt;td&gt;Developer&lt;/td&gt;
      &lt;td&gt;+3 285 42 88&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;

&lt;!-- Dark bordered table --&gt;
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-dark table-bordered&quot;&gt;
  &lt;thead&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;First Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Last Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Position&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Phone&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
      &lt;td&gt;John&lt;/td&gt;
      &lt;td&gt;Doe&lt;/td&gt;
      &lt;td&gt;CEO, Founder&lt;/td&gt;
      &lt;td&gt;+3 555 68 70&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
      &lt;td&gt;Anna&lt;/td&gt;
      &lt;td&gt;Cabana&lt;/td&gt;
      &lt;td&gt;Designer&lt;/td&gt;
      &lt;td&gt;+3 434 65 93&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
      &lt;td&gt;Kale&lt;/td&gt;
      &lt;td&gt;Thornton&lt;/td&gt;
      &lt;td&gt;Developer&lt;/td&gt;
      &lt;td&gt;+3 285 42 88&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;</code></pre>
          </div>
        </div>
      </section>


      <!-- Hoverable rows -->
      <section id="tables-hoverable" class="border-bottom py-5 ps-lg-2 ps-xxl-0">
        <h2 class="h4">Hoverable rows</h2>
        <div class="d-table">
          <ul class="nav nav-tabs-alt" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" href="#preview5" data-bs-toggle="tab" role="tab" aria-controls="preview5" aria-selected="true">
                <i class="bx bx-show-alt fs-base opacity-70 me-2"></i>
                Preview
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#html5" data-bs-toggle="tab" role="tab" aria-controls="html5" aria-selected="false">
                <i class="bx bx-code-alt fs-base opacity-70 me-2"></i>
                HTML
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content pt-1">
          <div class="tab-pane fade show active" id="preview5" role="tabpanel">
            <div class="table-responsive mb-3">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>CEO, Founder</td>
                    <td>+3 555 68 70</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Anna</td>
                    <td>Cabana</td>
                    <td>Designer</td>
                    <td>+3 434 65 93</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Kale</td>
                    <td>Thornton</td>
                    <td>Developer</td>
                    <td>+3 285 42 88</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="table-responsive">
              <table class="table table-dark table-hover mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>CEO, Founder</td>
                    <td>+3 555 68 70</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Anna</td>
                    <td>Cabana</td>
                    <td>Designer</td>
                    <td>+3 434 65 93</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Kale</td>
                    <td>Thornton</td>
                    <td>Developer</td>
                    <td>+3 285 42 88</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="html5" role="tabpanel">
            <pre class="line-numbers"><code class="lang-html">&lt;!-- Light table with hoverable rows --&gt;
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-hover&quot;&gt;
  &lt;thead;&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;First Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Last Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Position&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Phone&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
      &lt;td&gt;John&lt;/td&gt;
      &lt;td&gt;Doe&lt;/td&gt;
      &lt;td&gt;CEO, Founder&lt;/td&gt;
      &lt;td&gt;+3 555 68 70&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
      &lt;td&gt;Anna&lt;/td&gt;
      &lt;td&gt;Cabana&lt;/td&gt;
      &lt;td&gt;Designer&lt;/td&gt;
      &lt;td&gt;+3 434 65 93&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
      &lt;td&gt;Kale&lt;/td&gt;
      &lt;td&gt;Thornton&lt;/td&gt;
      &lt;td&gt;Developer&lt;/td&gt;
      &lt;td&gt;+3 285 42 88&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;

&lt;!-- Dark table with hoverable rows --&gt;
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-dark table-hover&quot;&gt;
  &lt;thead&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;First Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Last Name&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Position&lt;/th&gt;
      &lt;th scope=&quot;col&quot;&gt;Phone&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
      &lt;td&gt;John&lt;/td&gt;
      &lt;td&gt;Doe&lt;/td&gt;
      &lt;td&gt;CEO, Founder&lt;/td&gt;
      &lt;td&gt;+3 555 68 70&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
      &lt;td&gt;Anna&lt;/td&gt;
      &lt;td&gt;Cabana&lt;/td&gt;
      &lt;td&gt;Designer&lt;/td&gt;
      &lt;td&gt;+3 434 65 93&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
      &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
      &lt;td&gt;Kale&lt;/td&gt;
      &lt;td&gt;Thornton&lt;/td&gt;
      &lt;td&gt;Developer&lt;/td&gt;
      &lt;td&gt;+3 285 42 88&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;</code></pre>
          </div>
        </div>
      </section>


      <!-- Color borders -->
      <section id="tables-color-borders" class="py-5 ps-lg-2 ps-xxl-0">
        <h2 class="h4">Color borders</h2>
        <div class="d-table">
          <ul class="nav nav-tabs-alt" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" href="#preview6" data-bs-toggle="tab" role="tab" aria-controls="preview6" aria-selected="true">
                <i class="bx bx-show-alt fs-base opacity-70 me-2"></i>
                Preview
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#html6" data-bs-toggle="tab" role="tab" aria-controls="html6" aria-selected="false">
                <i class="bx bx-code-alt fs-base opacity-70 me-2"></i>
                HTML
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content pt-1">
          <div class="tab-pane fade show active" id="preview6" role="tabpanel">
            <div class="table-responsive mb-3">
              <table class="table table-bordered border-success">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>CEO, Founder</td>
                    <td>+3 555 68 70</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Anna</td>
                    <td>Cabana</td>
                    <td>Designer</td>
                    <td>+3 434 65 93</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered border-danger mb-0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>John</td>
                    <td>Doe</td>
                    <td>CEO, Founder</td>
                    <td>+3 555 68 70</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Anna</td>
                    <td>Cabana</td>
                    <td>Designer</td>
                    <td>+3 434 65 93</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="tab-pane fade" id="html6" role="tabpanel">
            <pre class="line-numbers"><code class="lang-html">&lt;!-- Color borders on tables --&gt;
&lt;table class=&quot;table table-bordered border-success&quot;&gt;
...
&lt;/table&gt;
&lt;table class=&quot;table table-bordered border-danger&quot;&gt;
...
&lt;/table&gt;</code></pre>
          </div>
        </div>
      </section>
    </div>
  </main>
@endsection('content')
