<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Workout Tracker | Power Level</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --gym-red: #dc2626;
            --gym-red-glow: rgba(220, 38, 38, 0.6);
        }

        body {
            background: #000;
            color: #e0e0e0;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Full Screen Background */
        #galaxy-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            pointer-events: none; /* Allows clicks to pass through to buttons */
        }

        h1, h2, h3, h4 {
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 1.2px;
        }

        h1 {
            font-size: 4rem;
            color: white;
            text-shadow: 0 0 20px var(--gym-red-glow);
            text-transform: uppercase;
        }

        .gym-navbar {
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 2px solid var(--gym-red);
            box-shadow: 0 5px 20px rgba(220, 38, 38, 0.2);
        }

        .brand-text {
            font-size: 2rem;
            font-weight: 900;
            letter-spacing: 4px;
            text-transform: uppercase;
            background: linear-gradient(90deg, #ff0000, #dc2626, #7f1d1d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 12px var(--gym-red-glow);
        }

        .dumbbell-icon {
            font-size: 1.8rem;
            color: var(--gym-red);
            animation: pump 1.5s infinite ease-in-out;
        }

        @keyframes pump {
            0%, 100% { transform: scale(1) rotate(0deg); }
            50% { transform: scale(1.1) rotate(-15deg); }
        }

        .card {
            background: rgba(10, 10, 10, 0.75);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(220, 38, 38, 0.2);
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.8);
            overflow: hidden;
        }

        .section-title {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 1.5rem;
            color: #fff;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 70px;
            height: 4px;
            background: var(--gym-red);
            border-radius: 2px;
            box-shadow: 0 0 10px var(--gym-red);
        }

        .form-control, .form-select {
            background: rgba(20, 20, 20, 0.9);
            border: 1px solid #444;
            color: #fff;
        }

        .form-control:focus, .form-select:focus {
            background: #111;
            border-color: var(--gym-red);
            box-shadow: 0 0 0 0.25rem rgba(220, 38, 38, 0.25);
            color: #fff;
        }

        .btn-primary {
            background: var(--gym-red);
            border-color: var(--gym-red);
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #ff1f1f;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 38, 38, 0.4);
        }

        .table {
            --bs-table-bg: transparent;
            color: #e0e0e0;
            border-color: rgba(255, 255, 255, 0.1);
        }

        .text-red-glow {
            color: var(--gym-red);
            text-shadow: 0 0 15px var(--gym-red);
        }

        footer {
            padding: 3rem 0;
            margin-top: 5rem;
            border-top: 1px solid rgba(220, 38, 38, 0.2);
            background: rgba(0,0,0,0.6);
        }
    </style>
</head>
<body>

<canvas id="galaxy-bg"></canvas>

<nav class="navbar navbar-expand-lg sticky-top gym-navbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <i class="fas fa-dumbbell me-3 dumbbell-icon"></i>
            <span class="brand-text">GYM TRACKER</span>
        </a>
    </div>
</nav>

<div class="container py-5">

    <div class="card mb-5">
        <div class="card-body p-4 p-md-5">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="section-title">Athlete Profile</h2>
                    <div class="row g-4 mt-2">
                        <div class="col-6 col-md-4">
                            <div class="p-3 bg-black rounded border border-danger">
                                <small class="text-muted d-block">Name</small>
                                <h4 class="text-white mb-0">Falih</h4>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="p-3 bg-black rounded border border-danger">
                                <small class="text-muted d-block">Age</small>
                                <h4 class="text-white mb-0">32</h4>
                            </div>
                        </div>
                        <div class="col-6 col-md-4">
                            <div class="p-3 bg-black rounded border border-danger">
                                <small class="text-muted d-block">Weight</small>
                                <h4 class="text-white mb-0">72 kg</h4>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="p-3 bg-black rounded border border-danger">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold text-uppercase">Power Level</span>
                                    <span class="text-red-glow">6,720</span>
                                </div>
                                <div class="progress mt-2" style="height: 10px;">
                                    <div class="progress-bar bg-danger shadow-danger" style="width: 72%;"></div>
                                </div>
                                <small class="text-muted">Next Rank: 7,000</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 33px !important;" class="col-md-4 text-center mt-md-0">
                    <div class="p-4 rounded bg-black border border-danger">
                        <h5 class="text-red-glow mb-2">Current Phase</h5>
                        <h3 class="fw-bold text-uppercase">Cutting</h3>
                        <p class="small text-muted mb-0">Target: Lean & Defined</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-center mb-5">Track. Progress. <span class="text-red-glow">Dominate.</span></h1>

    <div class="alert alert-dark border border-danger text-center fw-bold mb-5">
        🔥 Current Streak: 8 Workouts in a Row
    </div>
    <div class="card mb-5">
        <div class="card-body p-4 p-md-5">
            <h2 class="section-title">Calorie Command Center</h2>

            <div class="row g-4">

                <div class="col-md-3">
                    <label class="form-label fw-bold">Gender</label>
                    <select id="gender" class="form-select">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold">Age</label>
                    <input type="number" id="age" class="form-control" placeholder="Years">
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold">Weight (kg)</label>
                    <input type="number" id="weight" class="form-control" placeholder="kg">
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold">Height (cm)</label>
                    <input type="number" id="height" class="form-control" placeholder="cm">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-bold">Activity Level</label>
                    <select id="activity" class="form-select">
                        <option value="1.2">Sedentary (little/no exercise)</option>
                        <option value="1.375">Lightly Active (1-3 days)</option>
                        <option value="1.55">Moderately Active (3-5 days)</option>
                        <option value="1.725">Very Active (6-7 days)</option>
                        <option value="1.9">Athlete Level</option>
                    </select>
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button id="calculateCalories" class="btn btn-primary w-100">
                        Calculate
                    </button>
                </div>

            </div>

            <div class="row mt-5 g-4" id="calorieResults" style="display:none;">
                <div class="col-md-3">
                    <div class="p-3 bg-black rounded border border-danger text-center">
                        <small class="text-muted">BMR</small>
                        <h4 class="text-white" id="bmrResult">0</h4>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-black rounded border border-danger text-center">
                        <small class="text-muted">Maintenance</small>
                        <h4 class="text-white" id="maintenanceResult">0</h4>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-black rounded border border-danger text-center">
                        <small class="text-muted">Cutting</small>
                        <h4 class="text-red-glow" id="cutResult">0</h4>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-black rounded border border-danger text-center">
                        <small class="text-muted">Bulking</small>
                        <h4 class="text-white" id="bulkResult">0</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-5">
        <div class="card-body p-4 p-md-5">
            <h2 class="section-title">Today's Session — {{ $today->format('l, M j') }}</h2>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show bg-success text-white" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($workoutType)
                <h4 class="mb-4 text-uppercase fw-bold text-red-glow">
                    <i class="fas fa-fire me-2"></i> {{ ucfirst($workoutType) }} Day
                </h4>

                <form action="/workouts" method="POST" class="row g-3">
                    @csrf
                    <input type="hidden" name="date" value="{{ $today->format('Y-m-d') }}">
                    <div class="col-md-5">
                        <label class="form-label fw-bold">Exercise</label>
                        <select name="exercise_id" class="form-select">
                            @foreach($dailyExercises as $exercise)
                                <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Weight (kg)</label>
                        <input type="number" name="weight" step="0.5" class="form-control" required placeholder="0.0">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label fw-bold">Reps</label>
                        <input type="number" name="reps" class="form-control" required placeholder="0">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">
                            Log Set
                        </button>
                    </div>
                </form>
            @else
                <div class="text-center py-5">
                    <h4 class="text-muted">REST DAY</h4>
                    <p class="lead">Recovery is where the growth happens.</p>
                </div>
            @endif
        </div>
    </div>

    <div class="card mb-5">
        <div class="card-body p-4 p-md-5">
            <h2 class="section-title">Power Analytics</h2>
            <div class="mb-4">
                <select id="exerciseSelect" class="form-select w-100 w-md-50">
                    <option value="">-- Select Exercise to View Progress --</option>
                    @foreach($allExercises as $ex)
                        <option value="{{ $ex->id }}">{{ $ex->name }}</option>
                    @endforeach
                </select>
            </div>
            <div style="height: 350px;">
                <canvas id="progressChart"></canvas>
            </div>
        </div>
    </div>

    <div class="card mb-5">
        <div class="card-body p-4 p-md-5">
            <h2 class="section-title">Battle History</h2>
            @forelse($workouts as $date => $dayWorkouts)
                <h4 class="mt-5 mb-3 text-white-50">{{ \Carbon\Carbon::parse($date)->format('l, M j, Y') }}</h4>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-danger-subtle">
                        <tr>
                            <th>Exercise</th>
                            <th>Weight (kg)</th>
                            <th>Reps</th>
                            <th class="text-center">1RM</th>
                            <th class="text-center">Volume</th>
                            <th class="text-end">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dayWorkouts as $workout)
                            <tr>
                                <td class="fw-bold">{{ $workout->exercise->name }}</td>
                                <td>{{ $workout->weight }}</td>
                                <td>{{ $workout->reps }}</td>
                                <td class="text-center">
                                    <span class="badge bg-dark border border-danger text-white">
                                        {{ $workout->one_rm }} kg
                                    </span>
                                </td>
                                <td class="text-center text-muted">{{ $workout->weight * $workout->reps }} kg</td>
                                <td class="text-end">
                                    <form action="/workouts/{{ $workout->id }}" method="POST" class="delete-form">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @empty
                <div class="text-center py-5 text-muted">No logs found. Start today.</div>
            @endforelse
        </div>
    </div>

    <footer>
        <div class="container text-center">
            <p>Made by <span class="text-red-glow fw-bold">Nigesh</span></p>
            <p class="small text-muted italic">Built for the grind. No shortcuts.</p>
        </div>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.getElementById('calculateCalories').addEventListener('click', function() {

        const gender = document.getElementById('gender').value;
        const age = parseFloat(document.getElementById('age').value);
        const weight = parseFloat(document.getElementById('weight').value);
        const height = parseFloat(document.getElementById('height').value);
        const activity = parseFloat(document.getElementById('activity').value);

        if (!age || !weight || !height) {
            Swal.fire({
                icon: 'error',
                title: 'Missing Data',
                text: 'Please fill all fields.'
            });
            return;
        }

        // Mifflin-St Jeor Equation
        let bmr;
        if (gender === 'male') {
            bmr = (10 * weight) + (6.25 * height) - (5 * age) + 5;
        } else {
            bmr = (10 * weight) + (6.25 * height) - (5 * age) - 161;
        }

        const maintenance = bmr * activity;
        const cutting = maintenance - 500;
        const bulking = maintenance + 300;

        document.getElementById('bmrResult').innerText = Math.round(bmr) + " kcal";
        document.getElementById('maintenanceResult').innerText = Math.round(maintenance) + " kcal";
        document.getElementById('cutResult').innerText = Math.round(cutting) + " kcal";
        document.getElementById('bulkResult').innerText = Math.round(bulking) + " kcal";

        document.getElementById('calorieResults').style.display = "flex";
    });
</script>

<script type="module">
    import * as THREE from 'https://unpkg.com/three@0.160.0/build/three.module.js';

    const canvas = document.querySelector('#galaxy-bg');
    const renderer = new THREE.WebGLRenderer({ canvas, alpha: true, antialias: true });
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 100);
    camera.position.set(0, 3, 5);
    camera.lookAt(0, 0, 0);

    const parameters = {
        count: 9000,
        radius: 20,
        branches: 3,
        spin: 2,
        randomness: 0.35,
        insideColor: '#ffa575', // Gym Red
        outsideColor: '#311599'
    };

    const geometry = new THREE.BufferGeometry();
    const positions = new Float32Array(parameters.count * 3);
    const colors = new Float32Array(parameters.count * 3);
    const scales = new Float32Array(parameters.count);

    const colorInside = new THREE.Color(parameters.insideColor);
    const colorOutside = new THREE.Color(parameters.outsideColor);

    for (let i = 0; i < parameters.count; i++) {
        const i3 = i * 3;
        const radius = Math.random() * parameters.radius;
        const branchAngle = (i % parameters.branches) / parameters.branches * Math.PI * 2;
        const spinAngle = radius * parameters.spin;

        const randomX = Math.pow(Math.random(), 3) * (Math.random() < 0.5 ? 1 : -1) * parameters.randomness * radius;
        const randomY = Math.pow(Math.random(), 3) * (Math.random() < 0.5 ? 1 : -1) * parameters.randomness * radius;
        const randomZ = Math.pow(Math.random(), 3) * (Math.random() < 0.5 ? 1 : -1) * parameters.randomness * radius;

        positions[i3] = Math.cos(branchAngle + spinAngle) * radius + randomX;
        positions[i3 + 1] = randomY;
        positions[i3 + 2] = Math.sin(branchAngle + spinAngle) * radius + randomZ;

        const mixedColor = colorInside.clone();
        mixedColor.lerp(colorOutside, radius / parameters.radius);

        colors[i3] = mixedColor.r;
        colors[i3 + 1] = mixedColor.g;
        colors[i3 + 2] = mixedColor.b;
        scales[i] = Math.random();
    }

    geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
    geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));
    geometry.setAttribute('aScale', new THREE.BufferAttribute(scales, 1));

    const material = new THREE.ShaderMaterial({
        depthWrite: false,
        blending: THREE.AdditiveBlending,
        vertexColors: true,
        uniforms: {
            uTime: { value: 0 },
            uSize: { value: 25 * renderer.getPixelRatio() }
        },
        vertexShader: `
            uniform float uTime;
            uniform float uSize;
            attribute float aScale;
            varying vec3 vColor;
            void main() {
                vec4 modelPosition = modelMatrix * vec4(position, 1.0);
                float angle = atan(modelPosition.x, modelPosition.z);
                float distanceToCenter = length(modelPosition.xz);
                float angleOffset = (1.0 / distanceToCenter) * uTime * 0.2;
                angle += angleOffset;
                modelPosition.x = cos(angle) * distanceToCenter;
                modelPosition.z = sin(angle) * distanceToCenter;

                vec4 viewPosition = viewMatrix * modelPosition;
                vec4 projectedPosition = projectionMatrix * viewPosition;
                gl_Position = projectedPosition;
                gl_PointSize = uSize * aScale;
                gl_PointSize *= (1.0 / - viewPosition.z);
                vColor = color;
            }
        `,
        fragmentShader: `
            varying vec3 vColor;
            void main() {
                float strength = distance(gl_PointCoord, vec2(0.5));
                strength = 1.0 - strength;
                strength = pow(strength, 10.0);
                vec3 finalColor = mix(vec3(0.0), vColor, strength);
                gl_FragColor = vec4(finalColor, 1.0);
            }
        `
    });

    const points = new THREE.Points(geometry, material);
    scene.add(points);

    const clock = new THREE.Clock();
    const animate = () => {
        const elapsedTime = clock.getElapsedTime();
        material.uniforms.uTime.value = elapsedTime;
        points.rotation.y = elapsedTime * 0.03;
        renderer.render(scene, camera);
        requestAnimationFrame(animate);
    };

    const resize = () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    };

    window.addEventListener('resize', resize);
    resize();
    animate();
</script>

<script>
    const chartData = @json($chartData);
    let myChart = null;
    const ctx = document.getElementById('progressChart').getContext('2d');

    document.getElementById('exerciseSelect').addEventListener('change', function() {
        const id = this.value;
        if (!id || !chartData[id]) return;

        if (myChart) myChart.destroy();
        myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartData[id].labels,
                datasets: [{
                    label: 'Weight Progress (kg)',
                    data: chartData[id].weights,
                    borderColor: '#dc2626',
                    backgroundColor: 'rgba(220, 38, 38, 0.2)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointBackgroundColor: '#dc2626'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { labels: { color: '#fff', font: { family: 'Bebas Neue', size: 16 } } } },
                scales: {
                    y: { grid: { color: 'rgba(255,255,255,0.1)' }, ticks: { color: '#aaa' } },
                    x: { grid: { display: false }, ticks: { color: '#aaa' } }
                }
            }
        });
    });

    // Delete Confirmation
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Delete this set?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                confirmButtonText: 'Yes, delete it'
            }).then((result) => { if (result.isConfirmed) this.submit(); });
        });
    });
</script>
</body>
</html>
